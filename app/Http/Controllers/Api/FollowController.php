<?php

namespace App\Http\Controllers\Api;

use App\Models\Job;
use App\Models\Follow;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
    public function show(string $id){
        $follows = Follow::findOrFail($id);
        return response()->json($follows, 200);
    }
}
