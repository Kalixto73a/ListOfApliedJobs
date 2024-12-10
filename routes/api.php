<?php


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\JobController;
use App\Http\Controllers\Api\FollowController;

Route::get('/jobs', [JobController::class, 'index'])->name('apihome');
Route::delete('/jobs/{id}', [JobController::class, 'destroy'])->name('apidestroy');
Route::post('/jobs', [JobController::class, 'store'])->name('apistore');
Route::put('/jobs/{id}', [JobController::class, 'update'])->name('apiupdate');
Route::get('/jobs/{id}',[JobController::class, 'show'])->name('apishow');

Route::post('/jobs/{jobId}/follows', [FollowController::class, 'store'])->name('followStore');
Route::get('/jobs/{jobId}/follows', [FollowController::class, 'show'])->name('apishowfollow');
