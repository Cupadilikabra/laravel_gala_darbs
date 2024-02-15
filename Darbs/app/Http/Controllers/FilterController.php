<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Job;
use Illuminate\Http\Request;

class FilterController extends Controller
{
    public function sort(Request $request)
    {
        $filter = $request->input('filter');


        $query = Job::query();

        if ($filter == 'latest') {
            $query->orderByDesc('created_at');
        } elseif ($filter == 'oldest') {
            $query->orderBy('created_at');
        } else {

            $query->select(
                'jobs.*',
                DB::raw('(SELECT AVG(rating_value) FROM ratings WHERE ratings.job_id = jobs.id) AS avg_rating')
            )->orderByDesc('avg_rating');
        }

        $jobs = $query->paginate(6);

        return view('jobs.index', compact('jobs'));
    }
}
