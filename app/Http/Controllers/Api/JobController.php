<?php

namespace App\Http\Controllers\Api;

use App\Models\Job;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class JobController extends Controller 
{
    
    public function index()
    {
        $jobs = Job::all();
        return response()->json($jobs, 200);
    }

    public function store(Request $request)
    {
        $job = Job::create([
            'company' => $request->company,
            'offer' => $request->offer,
            'status' => $request->status
        ]);
        $job->save();
        return response()->json($job, 200);
    }
 
    public function show(string $id)
    {
        $job = Job::find($id);
        return response()->json($job,200);
    } 

    public function update(Request $request, string $id)
    {
        $job = Job::find($id);

        $job->update([
            'status' => $request->status
        ]);
        $job->save();
        return response()->json($job, 200);
    }

    public function destroy(string $id)
    {
        //
    }
}
