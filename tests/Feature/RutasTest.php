<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

use App\User;
use Carbon\Carbon;

class LoginTest extends TestCase
{
  
    /*
		simularemos una petición HTTP GET a la URL de login. Con asserStatus comprobamos que la URL carga de forma correcta verificando que el status HTTP sea 200. Con el método assertSee comprobamos que podemos ver el texto “Login”:
    */
		/**
     * @test
     */
		public function item_create()
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
        $response = $this->get('/item/create');
        $response->assertStatus(200);
		}
/**
     * @test
     */
		public function familia_index()
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
        $response = $this->get('/familia');
        $response->assertStatus(200);
		}
/**
     * @test
     */
		public function familia_create()
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
        $response = $this->get('/familia/create');
        $response->assertStatus(200);
		}
/**
     * @test
     */
		public function hitem_index()
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
        $response = $this->get('/hitem');
        $response->assertStatus(200);
		}
}
