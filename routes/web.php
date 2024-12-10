<?php

use App\Models\Job;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobController;
use App\Http\Controllers\FollowController;
use App\Models\Follow;

Route::get('/', [JobController::class, 'index'])->name('home');
Route::get('/jobs/{id}/follows', [FollowController::class, 'show'])->name('show');
Route::get('/jobs',[FollowController::class, 'index'])->name('homeF');
