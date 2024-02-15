<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    public function index()
    {
        // Get top-rated jobs
        $topRatedJobs = Job::whereHas('ratings', function ($query) {
            $query->selectRaw('avg(rating_value) as avg_rating')
                ->groupBy('job_id')
                ->havingRaw('avg(rating_value) >= ?', [4]);
        })
            ->with('ratings')
            ->limit(10)
            ->get();

        // Get latest jobs
        $latestJobs = Job::latest()->limit(6)->get(); 

        return view('dashboard', compact('topRatedJobs', 'latestJobs'));
    }
}
