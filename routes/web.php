<?php

use Illuminate\Support\Facades\Route;
use App\Models\Job;

Route::get('/', function () {
    return view('home');
});

Route::get('/jobs', function () {
    return view('jobs', [
        // Show 10 jobs per page, with employer & tags eager loaded
        'jobs' => Job::with(['employer', 'tags'])->paginate(10)
    ]);
});

Route::get('/jobs/{id}', function ($id) {
    return view('job', [
        'job' => Job::with(['employer', 'tags'])->findOrFail($id)
    ]);
});
