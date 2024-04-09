<?php

namespace Tests\Feature\Auth;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LoginTest extends TestCase
{
   

     public function testSuccessLogin()
     {
        $payload = [
            "email" => "admin2@gmail.com",
            "password" => "123456789"
        ];

        $response = $this->json('POST', 'api/login', $payload, ['Accept' => 'application/json']);
        $response->assertStatus(200);
     }

     public function testErrorLogin()
     {
        $payload = [
            "email" => "admin222@gmail.com",
            "password" => "123456789"
        ];

        $response = $this->json('POST', 'api/login', $payload, ['Accept' => 'application/json']);
        $response->assertJson([
            'message' => 'Unauthorized'
        ]);
     }
}
