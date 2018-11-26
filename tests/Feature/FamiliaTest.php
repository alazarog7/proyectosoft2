<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;
use App\User;
use Carbon\Carbon;
class FamiliaTest extends TestCase
{
     /**
     * @test
     */
    public function Nombre_familia_requerido_test()
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
       	$response = $this->from('/familia')->post('/familia',
       	 	[
<<<<<<< HEAD
       	 	'NOMBRE'=>NULL,
=======
       	 	'NOMBRE'=>null,
>>>>>>> f451a1d98f711f67e0759fe8adf8618f2b126d49
       	 	]);
       	$response->assertRedirect('/familia')
                  ->assertSessionHasErrors([
                        'NOMBRE' => 'Debe ingresar un nombre mayor a 5 caracteres',
                  ]);
    }
}
