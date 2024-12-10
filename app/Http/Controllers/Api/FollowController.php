<?php

namespace App\Http\Controllers\Api;

use App\Models\Job;
use App\Models\Follow;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class FollowController extends Controller
{
    public function store(Request $request, $jobId)
    {
        $validated = $request->validate([
            'news' => 'required|array'
        ]); 
        $job = Job::find($jobId);
        
        if (!$job){
            return response()->json([
                'message' => 'La oferta para la que quieres crear un seguimiento no existe'
            ], 404);
        }
        
        $followsData = collect($validated['news'])->map(function($newsItem) use ($job){
            return[
                'job_id' => $job->id,
                'news' => $newsItem,
            ];
        }); 
        $job->follows()->createMany($followsData);

            return response()->json([
                'message' => 'Las novedades se han añadido correctamente',
                'job' => $job->load('follows'),
            ], 200);
    }
    public function show(string $jobId){
        try{
            $job = Job::findOrFail($jobId);
            }
            catch (ModelNotFoundException $e) {
                return response()->json(['message' => 'A Job with that Id doesn´t exist'], 404);
            }
        $follows = Follow::where('job_id', $jobId)->get();
            if ($follows->isEmpty()) {
                return response()->json(['job'=> $job, 'message' => 'No follows found for this job.'], 200);
            }
        return response()->json([
            'job' => $job,
            'news' => $follows,
        ]);
    }
}
