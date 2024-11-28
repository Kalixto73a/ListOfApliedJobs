<?php

namespace Tests\Feature;

use App\Models\Job;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class JobTest extends TestCase
{
    use RefreshDatabase;
    public function test_ListOffTableCanBeRead(): void
    {
        $this->withoutExceptionHandling();
        Job::all();
        $response = $this->get('/');

        $response->assertStatus(200)
                 ->assertViewIs('home');
    }
}
