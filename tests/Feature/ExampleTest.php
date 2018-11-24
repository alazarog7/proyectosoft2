<?php

namespace Tests\Feature;

use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $user = new User(array('ID_USUA'=>1,'USUARIO_ALIAS'=>'jlopez'));
        $this->be($user);
        $response = $this->get('/item');
        $response->assertStatus(200)
                 ->assertSee('Nuevo Item');

    }
}
