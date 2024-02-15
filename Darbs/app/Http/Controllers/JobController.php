<?php

namespace App\Http\Controllers;

use App\Models\Rating;
use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class JobController extends Controller
{

    public function index()
    {
        $jobs = Job::paginate(6);


        return view('jobs.index', compact('jobs'));
    }
    //CreateMETHOD
    public function create()
    {
        return view('jobs.create');
    }

    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'job_title' => 'required|string|max:255',
            'job_description' => 'nullable|string',
            'job_category' => 'nullable|string|max:100',
            'job_location' => 'nullable|string|max:100',
            'job_salary' => 'nullable|numeric',
            'job_posted_date' => 'required|date',
            'job_expiry_date' => 'required|date|after:job_posted_date',
            'company_id' => 'string',
        ]);


        $validatedData['user_id'] = Auth::id();


        $job = Job::create($validatedData);

        return redirect()->route('jobs.show', $job->id)
            ->with('success', 'Job created successfully!');

        return view('jobs.index', ['jobs' => Job::all()]);
    }

    //Show Jobs
    public function show($id)
    {
        $job = Job::findOrFail($id);
        return view('jobs.show', ['job' => $job]);
    }

    // EDIT METHOD

    public function edit($id)
    {

        $job = Job::findOrFail($id);
        $this->authorize('update', $job);
        return view('jobs.edit', ['job' => $job]);
    }
    //DELETE METHOD
    public function delete(Job $job)
    {
        $this->authorize('delete', $job);
        $job->delete();

        return redirect()->route('jobs.index')
            ->with('success', 'Job deleted successfully!');
    }


    //Update METHOD
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'job_title' => 'required|string|max:255',
            'job_description' => 'nullable|string',
            'job_category' => 'nullable|string|max:100',
            'job_location' => 'nullable|string|max:100',
            'job_salary' => 'nullable|numeric',
            'job_posted_date' => 'required|date',
            'job_expiry_date' => 'required|date|after:job_posted_date',
        ]);

        $job = Job::findOrFail($id);
        $job->update($validatedData);

        return redirect()->route('jobs.show', $job->id)
            ->with('success', 'Job updated successfully!');
    }
}
