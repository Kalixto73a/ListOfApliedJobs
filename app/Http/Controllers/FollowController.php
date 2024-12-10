<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\Follow;
use Illuminate\Http\Request;

class FollowController extends Controller
{
    public function index()
    {
        $jobs = Job::with('follows')->get();
        return view('home', compact('jobs'));
    }
    public function show(string $id)
    {
        $job = Job::findOrFail($id);
        return view('offer', compact('job')); 
    }
}
