<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\Job;

// Homepage
Route::get('/', function () {
    return view('home');
});

// All Jobs (jobs/index.blade.php)
Route::get('/jobs', function () {
    return view('jobs.index', [
        'jobs' => Job::with('employer')->paginate(10) // eager load employer, 10 per page
    ]);
});

// Show Create Form (jobs/create.blade.php)
Route::get('/jobs/create', function () {
    return view('jobs.create');
});

// Store a New Job with validation
Route::post('/jobs', function (Request $request) {
    // ✅ Validate incoming request
    $validated = $request->validate([
        'title' => ['required', 'min:3'],
        'salary' => ['required']
    ]);

    // ✅ Create the job safely
    Job::create([
        'title' => $validated['title'],
        'salary' => $validated['salary'],
        'employer_id' => 1
    ]);

    return redirect('/jobs');
});

// Single Job (jobs/show.blade.php)
Route::get('/jobs/{job}', function (Job $job) {
    return view('jobs.show', ['job' => $job]);
});
Route::delete('/jobs/{job}', function (Job $job) {
    $job->delete();
    return redirect('/jobs');
});