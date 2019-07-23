<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;

class ReqTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $user = \App\User::find(1);
        $response = $this->actingAs($user, 'api')->post('/adoções/requisição/status',[
            'id' => 10,
            'acao' => 3,
            'comentario' => 'OK!' 
        ]);

        // $response->assertStatus(201);
        $this->assertDatabaseHas('status_adocao', [
            'id_adocao' => 10,
            'status_adocao' => 3
        ]);
    }
}
