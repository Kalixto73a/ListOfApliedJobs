<?php

use App\Models\Job;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobController;
use App\Http\Controllers\FollowController;

Route::get('/', [JobController::class, 'index'])->name('home');
Route::get('/jobs/{id}', [FollowController::class, 'show'])->name('show');