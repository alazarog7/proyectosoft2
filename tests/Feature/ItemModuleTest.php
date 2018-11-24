<?php

namespace Tests\Feature;

use function foo\func;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;

class ItemModuleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {

        //Auth::login($user);
        $user = new User(array('NOMBRE'=>"ALE"));
        $this->be($user);
        $this->session(['ROL'=>6]);
        $response = $this->get('/item');
        $response->assertStatus(200)
                     ->assertSee('CERRAR SESION')
                     ->assertSee('USUARIO')
                     ->assertSee('REGISTRO')
                     ->assertSee('REGISTRADOS')
                     ->assertSee('ITEM')
                     ->assertSee('NUEVOS ITEMS');

    }
}
