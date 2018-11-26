<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Carbon\Carbon;
use App\User;
use Illuminate\Foundation\Auth;
class UserRutasTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $reponse = $this->get('/');
        $reponse->assertStatus(200);
    }
/**
     * @test
     */
    public function registrar_usuario()
    {
        $user = new User([
            'NOMBRE'=>'JUAN',
            'APELLIDO'=>'LOPEZ ARANA',
            'USUARIO_ALIAS'=>'jlopez',
            'TELEFONO'=>'75643562',
            'EMAIL'=>'j.lopez@anh.gob.bo',
            'PASSWORD'=>bcrypt('123'),
            'AUD_ESTADO'=>1,
            'AUD_FECHA'=>Carbon::now(),
        ]);
        $this->be($user);
        $this->session(['ROL'=>6]);
        $this->get('/usuario/create')
                ->assertSee('Registro de Usuario');
        $response = $this->from('/usuario/create')->post('/usuario/store', [
            'NOMBRE'=>'Ana',
            'APELLIDO'=>'Tineo Torrico',
            'USUARIO_ALIAS'=>'ana',
            'TELEFONO'=>'7984512',
            'EMAIL'=>'ana@anh.gob.bo',
            'PASSWORD'=>bcrypt('123'),
        ]);
         /*
        $response->assertRedirect('/usuario');
       $this->assertCredentials([
            'NOMBRE'=>'Ana',
            'APELLIDO'=>'Tineo Torrico',
            'USUARIO_ALIAS'=>'ana',
            'TELEFONO'=>'7984512',
            'EMAIL'=>'ana@anh.gob.bo',
            'PASSWORD'=>bcrypt('123'),
            ]);
*/
    }

}
