<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase, DatabaseMigrations;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_register_user_success()
    {
        $data = [
            'name' => 'Leo',
            'email' => 'leo@gmail.com',
            'pssword' => '123',
            'weight' => 55.0,
            'height' => 172.0,
            'planType' => 'Gratuito',
            'goal' => 'Subir peso',
        ];

        $response = $this->post('api/register', $data);

        $response
            ->assertStatus(201)
            ->assertJson(['success' => true]);

        $this->assertDatabaseHas('users', $data);
    }
    public function test_register_user_failed()
    {
        $data = [
            'name' => 'Leo',
            'email' => 'leo@gmail.com',
            'pssword' => '123',
            'weight' => 55.0,
            'height' => 172.0,
            'planType' => 'Gratuito',
            'goal' => 'Subir peso',
        ];

        $response = $this->post('api/register', $data);

        $response
            ->assertStatus(201)
            ->assertJson(['success' => true]);

        $this->assertDatabaseHas('users', $data);
    }

    // public function test_login_user()
    // {
    //     $data = [
    //         // 'email' => 'leo@gmail.com',
    //         // 'pssword' => '123'
    //     ];

    //     $response = $this->post('api/login', $data);

    //     $response
    //         ->assertStatus(401)
    //         ->assertJson(['success' => false]);
    //     // $this->assertDatabaseHas('users', $data);
    // }
}
