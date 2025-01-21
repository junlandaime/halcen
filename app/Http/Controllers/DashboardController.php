<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use App\Models\User;
use App\Models\Video;
use App\Models\Article;
use App\Models\Partner;
use App\Models\Category;
use App\Models\Regulation;
use App\Models\Testimonial;
use App\Models\ProgramBatch;
use Illuminate\Http\Request;
use App\Models\ProgramLayanan;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        // Cek role user yang sedang login
        // if (auth()->user()->hasRole('superAdmin')) {
        // Stats untuk superAdmin
        $stats = [
            'total_certifications' => ProgramLayanan::count(),
            'total_clients' => Partner::count(),
            'total_articles' => Article::count(),
            'total_regulations' => Regulation::count(),
            'total_faqs' => Faq::count(),
            'total_users' => User::count(),
            'total_videos' => Video::count(),
            'total_testimonials' => Testimonial::count(),
            'new_applications' => ProgramBatch::whereDate('created_at', Carbon::today())->count(),
            'pending_review' => ProgramBatch::where('status', 'pending')->count()
        ];

        // Data chart untuk superAdmin
        $certificationData = $this->getCertificationChartData();
        $clientTrendData = $this->getClientTrendData();
        $recentActivities = $this->getRecentActivities();

        return view('admin.dashboard', compact(
            'stats',
            'certificationData',
            'clientTrendData',
            'recentActivities'
        ));
        // } else {
        //     return view('dashboard');
        // }
    }

    private function getCertificationChartData()
    {
        $months = collect(range(5, 0))->map(function ($i) {
            $date = Carbon::now()->subMonths($i);
            return [
                'month' => $date->format('M'),
                'count' => ProgramLayanan::whereMonth('created_at', $date->month)
                    ->whereYear('created_at', $date->year)
                    ->count()
            ];
        });

        return [
            'labels' => $months->pluck('month'),
            'data' => $months->pluck('count')
        ];
    }

    private function getClientTrendData()
    {
        $months = collect(range(5, 0))->map(function ($i) {
            $date = Carbon::now()->subMonths($i);
            return [
                'month' => $date->format('M'),
                'count' => ProgramBatch::whereMonth('created_at', $date->month)
                    ->whereYear('created_at', $date->year)
                    ->count()
            ];
        });

        return [
            'labels' => $months->pluck('month'),
            'data' => $months->pluck('count')
        ];
    }

    private function getRecentActivities()
    {
        // Combine and sort recent activities from different models
        $activities = collect();

        // Add program batch activities
        $batchActivities = ProgramBatch::with('programLayanan')
            ->latest()
            ->take(5)
            ->get()
            ->map(function ($batch) {
                return [
                    'type' => 'batch',
                    'title' => $batch->programLayanan->nama_program,
                    'description' => "Batch ke " . $batch->batch_ke . " " . $batch->nama_batch . " baru ditambahkan",
                    'time' => $batch->created_at,
                    'image' => $batch->gambar_banner->image ?? '/default-avatar.png'
                ];
            });

        $activities = $activities->concat($batchActivities);

        // Add article activities
        $articleActivities = Article::latest()
            ->take(5)
            ->get()
            ->map(function ($article) {
                return [
                    'type' => 'article',
                    'title' => $article->title,
                    'description' => "Artikel baru dipublikasikan",
                    'time' => $article->created_at,
                    'image' => $article->featured_image ?? '/default-avatar.png'
                ];
            });

        $activities = $activities->concat($articleActivities)
            ->sortByDesc('time')
            ->take(5);

        return $activities;
    }

    public function dashboard()
    {
        $user = Auth::user();
        $postsQuery = Article::query();

        if ($user->hasRole('author')) {
            $postsQuery->whereHas('author', function ($query) use ($user) {
                $query->where('author_id', $user->id);
            });
        }

        $posts = $postsQuery->count();
        $categories = Category::count();
        $users = User::count();

        return view('dashboard', compact('categories', 'posts', 'users'));
    }

    public function article()
    {
        $user = Auth::user();
        $posts = Article::query();
        $postsQ = Article::orderBy('id', 'desc')->get();

        if ($user->hasRole('author')) {
            $posts->whereHas('author', function ($posts) use ($user) {
                $posts->where('author_id', $user->id);
            });
        }

        $posts = $posts->orderBy('id', 'desc')->paginate(10);


        return view('admin.articles.list', compact('posts'));
    }

    public function article_create()
    {
        $categories = Category::all();
        return view('admin.articles.create', compact('categories'));
    }

    public function articleCategory()
    {

        return view('admin.articles.categories');
    }

    public function articleCreate()
    {

        return view('admin.articles.create');
    }

    public function media()
    {

        return view('admin.media.index');
    }

    public function program()
    {

        return view('admin.programs.index');
    }

    public function certifications()
    {

        return view('admin.certification.index');
    }

    public function clients()
    {

        return view('admin.clients.index');
    }
    public function laboratory()
    {

        return view('admin.laboratory.index');
    }




    public function messages()
    {

        return view('admin.messages.index');
    }
    public function reports()
    {

        return view('admin.reports.index');
    }
    public function settings()
    {

        return view('admin.settings.index');
    }
}
