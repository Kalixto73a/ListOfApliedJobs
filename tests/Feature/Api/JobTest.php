<?php

namespace Tests\Feature\Api;

use App\Models\Job;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class JobTest extends TestCase
{
    use RefreshDatabase;
    public function test_CheckIfReceiveAllEntryJobInJsonFile()
    {
        $job = Job::factory(2)->create();

        $response = $this->get(route('apihome'));

        $response->assertStatus(200)
                 ->assertJsonCount(2);
    }
    public function test_CheckIfCanDeleteEntryInJobWithApi()
    {
        $job = Job::factory(2)->create();
        $response = $this->delete(route('apidestroy',1));
        $this->assertDatabaseCount('jobs',1);
        $response = $this->get(route('apihome'));
        $response->assertJsonCount(1);
    }
    public function test_CheckIfCanCreateNewEntryInJobWihtJsonFile()
    {
        $response = $this->post(route('apistore'),[
            'company' => 'Microsoft',
            'offer' => 'Backend Developer',
            'status' => 1
        ]);
        $response = $this->get(route('apihome'));
        $response->assertStatus(200)
                 ->assertJsonCount(1);
    }
    public function test_CheckIfCanUpdateEntryInJobWithJsonFile()
    {
        $response = $this->post(route('apistore'),[
            'company' => 'Microsoft',
            'offer' => 'Backend Developer',
            'status' => 1
        ]);
        $data = ['status' => 1];
        $response = $this->get(route('apihome'));
        $response->assertStatus(200)
                 ->assertJsonCount(1)
                 ->assertJsonFragment($data);
        $response = $this->put('/api/jobs/1',[
            'status' => 0
        ]);
        $data = ['status' => 0];
        $response = $this->get(route('apihome'));
        $response->assertStatus(200)
                 ->assertJsonCount(1)
                 ->assertJsonFragment($data);
    }
    public function test_CheckIfFunctionShowWorks(){
        $response = $this->post(route('apistore'),[
            'company' => 'Microsoft',
            'offer' => 'Frontend Developer',
            'status' => 1
        ]);
        $data = ['company' => 'Microsoft', 'offer' => 'Frontend Developer', 'status' => 1];
        $response = $this->get(route('apishow', 1));
        $response->assertStatus(200)
                 ->assertJsonCount(6)
                 ->assertJsonFragment($data);
    }
    public function test_IfBooleanTruePrintEnCursoAndFalsePrintFinalizado()
    {
        $job = new Job();
        $job->status=true;
        $this->assertEquals('En Curso', $job->status_text);
        $job->status=false;
        $this->assertEquals('Finalizado', $job->status_text);
    }
    
}
