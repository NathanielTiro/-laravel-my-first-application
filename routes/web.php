<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobController;

// Homepage
Route::get('/', function () {
    return view('home');
});

// ✅ Resourceful routes for Jobs (replaces 7 separate routes)
Route::resource('jobs', JobController::class);
