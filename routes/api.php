<?php

use App\Http\Controllers\JobController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/journals', [JobController::class, 'index'])->name('apihome');
Route::delete('/journals/{id}', [JobController::class, 'destroy'])->name('apidestroy');
Route::post('/journals', [JobController::class, 'store'])->name('apistore');
Route::put('/journals/{id}', [JobController::class, 'update'])->name('apiupdate');
Route::get('/journals/{id}',[JobController::class, 'show'])->name('apishow');
