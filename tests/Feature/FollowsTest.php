<?php

namespace Tests\Feature;

use App\Models\Job;
use Tests\TestCase;
use App\Models\Follow;
use App\Models\Follows;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class FollowsTest extends TestCase
{
    use RefreshDatabase;
    public function test_ItLoadsJobsAndRelatedFollows(){
        {
            
            $jobs = Job::factory()->count(3)->create();
    
            $response = $this->get(route('homeF')); 
    
            $response->assertStatus(200);
            $response->assertViewIs('home');
            $response->assertViewHas('jobs', $jobs);
        }
    }    
}

