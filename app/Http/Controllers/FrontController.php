<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use App\Models\About;
use App\Models\Video;
use App\Models\Article;
use App\Models\Partner;
use App\Models\Program;
use App\Models\Category;
use App\Models\Regulation;
use App\Models\FaqCategory;
use App\Models\LandingPage;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use App\Models\VideoCategory;
use App\Models\ProgramLayanan;
use App\Models\RegulationCategory;

class FrontController extends Controller
{
    public function index()
    {
        $landingPage = LandingPage::firstOrFail();
        $partners = Partner::orderBy('order')->get();
        $testimonials = Testimonial::where('is_featured', true)
            ->orderBy('order')
            ->take(3)
            ->get();
        $upcomingPrograms = Program::
            // where('start_date', '>', now())
            //     ->orderBy('start_date')
            take(3)
            ->get();

        return view('front.home', compact(
            'landingPage',
            'partners',
            'testimonials',
            'upcomingPrograms'
        ));
    }


    public function index_program()
    {
        $featuredPrograms = ProgramLayanan::where('status', 'aktif')
            ->orderBy('created_at', 'desc')
            ->take(3)
            ->get();

        $programs = ProgramLayanan::where('status', 'aktif')
            ->orderBy('created_at', 'asc')
            ->paginate(6);

        return view('front.program', compact('featuredPrograms', 'programs'));
    }

    public function show_program(ProgramLayanan $programLayanan)
    {

        if (str_starts_with($programLayanan->slug, 'layanan-sertifikasi')) {
            $programLayanan = ProgramLayanan::where('slug', $programLayanan->slug)->firstOrFail();
            $subsertifikasi = ProgramLayanan::where('status', 'nonaktif')->get();
            $landingPage = LandingPage::firstOrFail();

            return view('front.program-sertifikasi', compact('programLayanan', 'subsertifikasi', 'landingPage'));
        } else {
            $programLayanan = ProgramLayanan::with(['batches' => function ($query) {
                $query->where('status', 'aktif')
                    ->where('tanggal_selesai_pendaftaran', '>=', now())
                    ->orderBy('tanggal_mulai_pendaftaran');
            }])
                ->where('slug', $programLayanan->slug)
                ->firstOrFail();

            $activeBatch = $programLayanan->getActiveBatch();
            $upcomingBatches = $programLayanan->getUpcomingBatches();

            return view('front.program-detail', compact('programLayanan', 'activeBatch', 'upcomingBatches'));
        }
    }


    public function index_video(Request $request)
    {
        $categories = VideoCategory::where('is_active', true)
            ->orderBy('order')
            ->get();

        $activeCategory = $request->category ?? $categories->first()->slug;

        // Ambil semua video dari semua kategori yang aktif
        $videos = Video::with('category')
            ->whereHas('category', function ($query) {
                $query->where('is_active', true);
            })
            ->where('is_active', true)
            ->orderBy('order')
            ->get();

        return view('front.video', compact('videos', 'categories', 'activeCategory'));
    }

    public function show_video(Video $video)
    {
        return view('videos.show', compact('video'));
    }


    public function article(Request $request)
    {
        // First get the featured article
        $featuredArticles = Article::with('category')
            ->published()
            ->featured()
            ->latest('published_at')
            ->take(1)
            ->get();

        // Get the featured article ID
        $featuredArticleId = $featuredArticles->first()?->id;

        // Build the main query
        $query = Article::with(['category', 'author'])
            ->published()
            ->latest('published_at');

        // Exclude the featured article from the main listing
        if ($featuredArticleId) {
            $query->where('id', '!=', $featuredArticleId);
        }

        // Filter by category if provided
        if ($request->filled('category')) {
            $query->whereHas('category', function ($q) use ($request) {
                $q->where('slug', $request->category);
            });
        }

        // Search functionality
        if ($request->filled('search')) {
            $searchTerm = '%' . $request->search . '%';
            $query->where(function ($q) use ($searchTerm) {
                $q->where('title', 'like', $searchTerm)
                    ->orWhere('content', 'like', $searchTerm)
                    ->orWhere('excerpt', 'like', $searchTerm);
            });
        }

        // Get paginated results
        $articles = $query->paginate(9)->withQueryString();

        // Get categories for the filter buttons
        $categories = Category::withCount('articles')
            ->having('articles_count', '>', 0)
            ->orderBy('name')
            ->get();

        return view('front.article', compact('articles', 'categories', 'featuredArticles'));
    }

    /**
     * Display the specified article.
     */
    public function showArticle(Article $article)
    {
        abort_if($article->status !== 'published', 404);

        $article->load(['category', 'author']);

        $relatedArticles = Article::with('category')
            ->published()
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

        return view('front.article-detail', compact('article', 'relatedArticles', 'recentArticles'));
    }

    public function index_regulasi(Request $request)
    {
        $query = Regulation::with('category')->where('is_active', true);

        if ($request->category) {
            $query->whereHas('category', function ($q) use ($request) {
                $q->where('code', $request->category);
            });
        }

        if ($request->search) {
            $query->where(function ($q) use ($request) {
                $q->where('title', 'like', "%{$request->search}%")
                    ->orWhere('description', 'like', "%{$request->search}%")
                    ->orWhere('number', 'like', "%{$request->search}%");
            });
        }

        $regulations = $query->latest()->paginate(10);
        $categories = RegulationCategory::whereHas('regulations', function ($query) {
            $query->whereNotNull('id');
        })->get();

        return view('front.regulasi', compact('regulations', 'categories'));
    }

    public function show_regulasi(Regulation $regulation)
    {
        return view('regulations.show', compact('regulation'));
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
            ->with(['sections' => function ($query) {
                $query->where('is_active', true)
                    ->orderBy('order');
            }, 'teams' => function ($query) {
                $query->where('is_active', true)
                    ->orderBy('order');
            }, 'programs' => function ($query) {
                $query->where('is_active', true)
                    ->orderBy('order');
            }])
            ->firstOrFail();

        return view('abouts.show', compact('about'));
    }



    public function kontak(Request $request)
    {
        $categories = FaqCategory::where('is_active', true)->orderBy('order')->get();

        $query = Faq::with('category')->where('is_active', true);

        if ($request->category) {
            $query->whereHas('category', function ($q) use ($request) {
                $q->where('slug', $request->category);
            });
        }

        if ($request->search) {
            $query->where(function ($q) use ($request) {
                $q->where('question', 'like', "%{$request->search}%")
                    ->orWhere('answer', 'like', "%{$request->search}%");
            });
        }

        $faqs = $query->orderBy('order')->get();

        // return view('faqs.index', compact('faqs', 'categories'));
        $landingPage = LandingPage::firstOrFail();

        return view('front.kontak', compact('landingPage', 'faqs', 'categories'));
    }
}
