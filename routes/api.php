<?php


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\JobController;


Route::get('/jobs', [JobController::class, 'index'])->name('apihome');
Route::delete('/jobs/{id}', [JobController::class, 'destroy'])->name('apidestroy');
Route::post('/jobs', [JobController::class, 'store'])->name('apistore');
Route::put('/jobs/{id}', [JobController::class, 'update'])->name('apiupdate');
Route::get('/jobs/{id}',[JobController::class, 'show'])->name('apishow');
