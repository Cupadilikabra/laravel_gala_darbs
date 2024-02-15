<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\Rating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RatingController extends Controller
{
    public function rateJob(Request $request, $jobId)
    {

        // Check if the user is authenticated
        if (!Auth::check()) {
            return redirect()->back()->with('error', 'You must be logged in to rate a job.');
        }

        // Find the job
        $job = Job::findOrFail($jobId);

        // Prevent user from rating own job post
        if ($job->user_id == Auth::id()) {
            return redirect()->back()->with('error', 'You cannot rate your own job post.');
        }

        // Check if the user has already rated the job
        $existingRating = Rating::where('job_id', $jobId)
            ->where('user_id', Auth::id())
            ->first();

        if ($existingRating) {
            return redirect()->back()->with('error', 'You have already rated this job.');
        }

        // Validate the incoming request
        $validatedData = $request->validate([
            'rating_value' => 'required|integer|min:1|max:5',
        ]);

        // Create a new rating for the job
        $rating = new Rating();
        $rating->job_id = $jobId;
        $rating->user_id = Auth::id();
        $rating->rating_value = $validatedData['rating_value'];
        $rating->save();

        // Redirect back 
        return redirect()->back()->with('success', 'Job rated successfully!');
    }
}
