<?php

namespace Tests\Feature\Api;

use App\Models\Job;
use Tests\TestCase;
use App\Models\Follow;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class FollowsTest extends TestCase
{
    use RefreshDatabase;
    public function test_ItCreatesFollowsSuccessfully()
    {
        
        $job = Job::factory()->create();

        $response = $this->postJson(route('followStore', $job->id), [
            'news' => ['Update 1', 'Update 2']
        ]);

        $response->assertStatus(200);
        $response->assertJson([
            'message' => 'Las novedades se han añadido correctamente',
            'job' => [
                'id' => $job->id,
                'follows' => [
                    ['news' => 'Update 1'],
                    ['news' => 'Update 2'],
                ],
            ],
        ]);

        $this->assertCount(2, $job->follows);
    }
    public function it_returns_404_if_job_not_found()
    {
        $response = $this->postJson(route('followStore', 999), [
            'news' => ['Update 1']
        ]);

        $response->assertStatus(404);
        $response->assertJson([
            'message' => 'La oferta para la que quieres crear un seguimiento no existe'
        ]);
    }
    public function it_validates_the_request()
    {
        $job = Job::factory()->create();

        $response = $this->postJson(route('followStore', $job->id), []);

        $response->assertStatus(422);
        $response->assertJsonValidationErrors(['news']);
    }
    public function it_returns_a_follow_successfully()
    {
        $job = Job::factory()->create();
        $follow = Follow::factory()->create();

        $response = $this->getJson(route('apishowfollow',['jobId' => $job->id, 'followsId' => $follow->id])); 

        $response->assertStatus(200);
        $response->assertJson($follow->toArray());
    }

    public function it_returns_404_if_follow_not_found()
    {
        $job = Job::factory()->create();
        
        $response = $this->getJson(route('apishowfollow',['jobId' => $job->id, 'followsId' => 999]));

        $response->assertStatus(404);
    }
    public function it_returns_job_and_follows_when_job_exists()
    {
        // Arrange: Create a job instance and multiple follow instances
        $job = Job::factory()->create();
        $follow1 = Follow::factory()->create(['job_id' => $job->id]);
        $follow2 = Follow::factory()->create(['job_id' => $job->id]);

        // Act: Make a GET request to the show method with the job ID
        $response = $this->getJson(route('apishowfollow', ['jobId' => $job->id]));

        // Assert: Check that the response is successful and contains the job and follows data
        $response->assertStatus(200);
        $response->assertJsonStructure([
            'job' => [
                'id',
                'title', // Add other job fields as necessary
                'description',
                // Add other fields you want to include
            ],
            'news' => [
                '*' => [ // This indicates that news is an array of objects
                    'id',
                    'user_id', // Add other follow fields as necessary
                    'job_id',
                    // Add other fields you want to include
                ],
            ],
        ]);
    }

    /** @test */
    public function it_returns_job_with_message_if_no_follows_found()
    {
        // Arrange: Create a job instance without any follows
        $job = Job::factory()->create();

        // Act: Make a GET request to the show method with the job ID
        $response = $this->getJson(route('apishowfollow', ['jobId' => $job->id]));

        // Assert: Check that the response is successful and contains the job data with the custom message
        $response->assertStatus(200);
        $response->assertJson([
            'job' => $job->toArray(),
            'message' => 'No follows found for this job.',
        ]);
    }

    /** @test */
    public function it_returns_error_message_if_job_not_found()
    {
        // Act: Make a GET request to the show method with a non-existent job ID
        $response = $this->getJson(route('apishowfollow', ['jobId' => 999])); // Assuming 999 does not exist

        // Assert: Check that a 404 status is returned with the custom message
        $response->assertStatus(404);
        $response->assertJson(['message' => 'A Job with that Id doesn´t exist']);
    }
}



