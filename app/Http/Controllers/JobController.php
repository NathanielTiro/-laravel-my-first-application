<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class JobController extends Controller
{
    // All Jobs
    public function index()
    {
        $jobs = Job::with('employer')->paginate(10); // eager load employer
        return view('jobs.index', ['jobs' => $jobs]);
    }

    // Show Create Form
    public function create()
    {
        return view('jobs.create');
    }

    // Store a New Job with validation
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => ['required', 'min:3'],
            'salary' => ['required']
        ]);

        Job::create([
            'title' => $validated['title'],
            'salary' => $validated['salary'],
            'employer_id' => 1
        ]);

        return redirect('/jobs');
    }

    // Show a Single Job
    public function show(Job $job)
    {
        return view('jobs.show', ['job' => $job]);
    }

    // ✅ Show Edit Form
    public function edit(Job $job)
    {
        return view('jobs.edit', ['job' => $job]);
    }

    // ✅ Update Job
    public function update(Request $request, Job $job)
    {
        $validated = $request->validate([
            'title' => ['required', 'min:3'],
            'salary' => ['required']
        ]);

        $job->update($validated);

        return redirect('/jobs/' . $job->id)->with('success', 'Job updated successfully!');
    }

    // Delete a Job
    public function destroy(Job $job)
    {
        $job->delete();
        return redirect('/jobs');
    }
}
