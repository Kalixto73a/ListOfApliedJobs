<?php

namespace Tests\Feature;

use App\Models\Job;
use Illuminate\Console\View\Components\Task;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class JobTest extends TestCase
{
    use RefreshDatabase;
    public function test_ListOffEntrysInJobCanBeRead(): void
    {
        $this->withoutExceptionHandling();
        Job::all();
        $response = $this->get('/');

        $response->assertStatus(200)
                 ->assertViewIs('home');
    }
    public function test_ItDisplaysTheOfferViewWithAJob()
    {
    
        $job = Job::factory()->create();

        $response = $this->get(route('show', $job->id)); 

        $response->assertStatus(200);
        $response->assertViewIs('offer');
        $response->assertViewHas('job', $job);
    }
    public function it_throws_a_404_error_if_job_not_found()
    {
        $response = $this->get(route('show', 999)); 

        $response->assertStatus(404);
    }
}

 