<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_all_users_returns_a_view_with_users_collection()
    {
        // Mock the HTTP client response
        $this->mockHttpClientResponse();

        // Send a GET request to /users
        $response = $this->get(route('all.users'));

        // Assert that a view is rendered
        $response->assertViewIs('AllUsers');

        // Assert that the users collection is passed to the view
        $response->assertViewHas('users');

        // Optionally, you can assert that the view received a collection of the correct size
        $users = $response->original->users;
        $this->assertCount(5, $users);

        // Assert that the response status code is 200
        $response->assertStatus(200);
    }

    private function mockHttpClientResponse()
    {
        $usersJson = [
            [
                'firstName' => 'John Doe',
                'email' => 'john.doe@example.com',
            ],
            // Add more users here to have a collection of size 5
        ];

        // Mock the HTTP client instance
        $httpClient = \Mockery::mock('overload:' . \App\Http\Clients\Http::class);

        // Set the response for the GET request to /api/v1/users
        $httpClient->shouldReceive('get')
        ->with('http://localhost:8000/api/v1/users')
        ->andReturn(new \Illuminate\Http\Response(200, [], json_encode($usersJson)));

        // Bind the mocked instance to the container
        $this->app->instance(\App\Http\Clients\Http::class, $httpClient);
    }
}