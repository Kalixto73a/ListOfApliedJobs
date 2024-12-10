<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class JobController extends Controller
{
    public function index()
    {
        $jobs = Job::get();
        return view('home', compact('jobs'));
    }
    public function show(string $id)
    {
        $job = Job::findOrFail($id);
        return view('offer', compact('job')); 
    }
    
}
