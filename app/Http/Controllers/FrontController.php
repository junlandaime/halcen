<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use App\Models\About;
use App\Models\Video;
use App\Models\Article;
use App\Models\Partner;
use App\Models\Service;
use App\Models\Category;
use App\Models\HeroSlide;
use App\Models\Regulation;
use App\Models\FaqCategory;
use App\Models\LandingPage;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use App\Models\VideoCategory;
use App\Models\ProgramLayanan;
use App\Models\RegulationCategory;
use App\Models\ProgramBatch;

class FrontController extends Controller
{
    public function index()
    {
        $landingPage = LandingPage::current();

        $heroSlides = HeroSlide::active()->get();
        $services = Service::active()->get();
        $partners = Partner::orderBy('order')->get();

        $testimonials = Testimonial::where('is_featured', true)
            ->orderBy('order')
            ->take(3)
            ->get();

        $latestArticles = Article::where('status', 'published')
            ->latest()
            ->take(2)
            ->get();

        $categories = [
            1 => 'Kuliah Halal',
            2 => 'Juleha Kurban',
            3 => 'Juleha Unggas',
            4 => 'P3H',
            5 => 'Sertifikasi',
        ];

        $upcomingBatches = ProgramBatch::where('status', 'aktif')
            ->where('tanggal_mulai_program', '>', now())
            ->with('programLayanan')
            ->get()
            ->groupBy('program_layanan_id');

        return view('front.home', compact(
            'landingPage',
            'heroSlides',
            'services',
            'partners',
            'testimonials',
            'latestArticles',
            'categories',
            'upcomingBatches'
        ));
    }

    public function index_program()
    {
        $featuredPrograms = ProgramLayanan::where('status', 'aktif')
            ->latest()
            ->take(3)
            ->get();

        $programs = ProgramLayanan::where('status', 'aktif')
            ->oldest()
            ->paginate(6);

        return view('front.program', compact('featuredPrograms', 'programs'));
    }

    public function show_program(ProgramLayanan $programLayanan)
    {
        $landingPage = LandingPage::current();

        if (str_starts_with($programLayanan->slug, 'layanan-sertifikasi')) {

            $subsertifikasi = ProgramLayanan::where('status', 'nonaktif')->get();

            return view('front.program-sertifikasi', compact(
                'programLayanan',
                'subsertifikasi',
                'landingPage'
            ));
        }

        $programLayanan->load(['batches' => function ($query) {
            $query->where('status', 'aktif')
                ->where('tanggal_selesai_pendaftaran', '>=', now())
                ->orderBy('tanggal_mulai_pendaftaran');
        }]);

        $activeBatch = $programLayanan->getActiveBatch();
        $upcomingBatches = $programLayanan->getUpcomingBatches();

        return view('front.program-detail', compact(
            'programLayanan',
            'activeBatch',
            'upcomingBatches',
            'landingPage'
        ));
    }

    public function index_video(Request $request)
    {
        $categories = VideoCategory::where('is_active', true)
            ->orderBy('order')
            ->get();

        $activeCategory = $request->category ?? $categories->first()?->slug;

        $videos = Video::with('category')
            ->whereHas('category', fn($q) => $q->where('is_active', true))
            ->where('is_active', true)
            ->orderBy('order')
            ->get();

        return view('front.video', compact('videos', 'categories', 'activeCategory'));
    }

    public function article(Request $request)
    {
        $featuredArticles = Article::published()
            ->featured()
            ->latest('published_at')
            ->take(1)
            ->get();

        $featuredId = $featuredArticles->first()?->id;

        $query = Article::published()->latest('published_at');

        if ($featuredId) {
            $query->where('id', '!=', $featuredId);
        }

        if ($request->filled('category')) {
            $query->whereHas(
                'category',
                fn($q) =>
                $q->where('slug', $request->category)
            );
        }

        if ($request->filled('search')) {
            $query->where(
                fn($q) =>
                $q->where('title', 'like', "%{$request->search}%")
                    ->orWhere('content', 'like', "%{$request->search}%")
                    ->orWhere('excerpt', 'like', "%{$request->search}%")
            );
        }

        $articles = $query->paginate(9)->withQueryString();

        $categories = Category::withCount('articles')
            ->having('articles_count', '>', 0)
            ->orderBy('name')
            ->get();

        return view('front.article', compact(
            'articles',
            'categories',
            'featuredArticles'
        ));
    }

    /**
     * ✅ FIX: DETAIL ARTICLE (WAS MISSING)
     */
    public function showArticle(Article $article)
    {
        abort_if($article->status !== 'published', 404);

        $article->load(['category', 'author']);

        $relatedArticles = Article::published()
            ->where('category_id', $article->category_id)
            ->where('id', '!=', $article->id)
            ->latest('published_at')
            ->take(3)
            ->get();

        $recentArticles = Article::published()
            ->where('id', '!=', $article->id)
            ->latest('published_at')
            ->take(5)
            ->get();

        return view('front.article-detail', compact(
            'article',
            'relatedArticles',
            'recentArticles'
        ));
    }

    public function index_regulasi(Request $request)
    {
        $query = Regulation::where('is_active', true)->with('category');

        if ($request->category) {
            $query->whereHas(
                'category',
                fn($q) =>
                $q->where('code', $request->category)
            );
        }

        if ($request->search) {
            $query->where(
                fn($q) =>
                $q->where('title', 'like', "%{$request->search}%")
                    ->orWhere('description', 'like', "%{$request->search}%")
                    ->orWhere('number', 'like', "%{$request->search}%")
            );
        }

        $regulations = $query->latest()->paginate(10);

        $categories = RegulationCategory::whereHas('regulations')->get();

        return view('front.regulasi', compact('regulations', 'categories'));
    }

    public function index_about()
    {
        $abouts = About::where('is_active', true)
            ->orderBy('order')
            ->get();

        return view('abouts.index', compact('abouts'));
    }

    public function show_about(About $about)
    {
        $about = About::where('slug', $about->slug)
            ->where('is_active', true)
            ->with([
                'sections' => fn($q) => $q->where('is_active', true)->orderBy('order'),
                'teams' => fn($q) => $q->where('is_active', true)->orderBy('order'),
                'programs' => fn($q) => $q->where('is_active', true)->orderBy('order'),
            ])
            ->firstOrFail();

        return view('abouts.show', compact('about'));
    }

    public function kontak(Request $request)
    {
        $landingPage = LandingPage::current();

        $categories = FaqCategory::where('is_active', true)
            ->orderBy('order')
            ->get();

        $query = Faq::where('is_active', true)->with('category');

        if ($request->category) {
            $query->whereHas(
                'category',
                fn($q) =>
                $q->where('slug', $request->category)
            );
        }

        if ($request->search) {
            $query->where(
                fn($q) =>
                $q->where('question', 'like', "%{$request->search}%")
                    ->orWhere('answer', 'like', "%{$request->search}%")
            );
        }

        $faqs = $query->orderBy('order')->get();

        return view('front.kontak', compact(
            'landingPage',
            'faqs',
            'categories'
        ));
    }
}
