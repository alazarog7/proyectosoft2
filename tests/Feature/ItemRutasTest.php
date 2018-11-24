<?php

namespace Tests\Feature;

use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Carbon\Carbon;
class ItemRutasTest extends TestCase
{
    /**
     * @test
     */
    public function Index()
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
        $response = $this->get('/item');
        $response->assertStatus(200);
    }


}
