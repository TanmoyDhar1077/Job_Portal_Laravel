<?php

namespace App\Http\Controllers;

use App\Models\JobPost;
use App\Models\User;
use App\Models\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Display the dashboard with analytics
     */
    public function index()
    {
        $user = Auth::user();

        // Check if user can see charts (Super Admin OR has Dashboard View permission)
        $canViewCharts = false;
        if ($user) {
            $canViewCharts = $user->hasRole('super-admin') || $user->hasPermissionTo('Dashboard View');
        }

        // Job posts by category for bar chart (only if user can view charts)
        $categories = [];
        $jobCounts = [];
        $jobTypeData = collect();
        
        if ($canViewCharts) {
            $jobCategoryData = JobPost::select('job_category', DB::raw('count(*) as total'))
                ->groupBy('job_category')
                ->orderBy('total', 'desc')
                ->get();

            $categories = $jobCategoryData->pluck('job_category')->toArray();
            $jobCounts = $jobCategoryData->pluck('total')->toArray();

            // Job type distribution
            $jobTypeData = JobPost::select('job_type', DB::raw('count(*) as total'))
                ->groupBy('job_type')
                ->get();
        }

        // Basic statistics (available to all users)
        $totalJobs = JobPost::count();
        $activeJobs = JobPost::where('is_active', true)->count();
        $totalEmployers = User::role('Employer')->count();
        $recentJobs = JobPost::where('created_at', '>=', now()->subDays(7))->count();
        
        // Additional statistics (only for users with chart access)
        $totalCandidates = 0;
        $totalApplications = 0;
        
        if ($canViewCharts) {
            $totalCandidates = User::role('Candidate')->count();
            $totalApplications = Application::count();
        }

        // Most viewed jobs (only if user can view charts)
        $mostViewedJobs = collect();
        if ($canViewCharts) {
            $mostViewedJobs = JobPost::orderBy('views', 'desc')
                ->limit(5)
                ->get(['job_title', 'views', 'company_name']);
        }

        return view('dashboard', [
            'categories' => $categories,
            'jobCounts' => $jobCounts,
            'totalJobs' => $totalJobs,
            'activeJobs' => $activeJobs,
            'totalEmployers' => $totalEmployers,
            'totalCandidates' => $totalCandidates,
            'totalApplications' => $totalApplications,
            'recentJobs' => $recentJobs,
            'jobTypeData' => $jobTypeData,
            'mostViewedJobs' => $mostViewedJobs,
            'canViewCharts' => $canViewCharts, // Pass this to the view
        ]);
    }
}
