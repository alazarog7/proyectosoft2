<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

use App\User;
use function foo\func;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class ItemRegistrarTest extends TestCase
{
    /**
     * *@test
     */
    public function registrar_item_test()
    {
        $user = new User([
            'NOMBRE'=>'JUAN',
            'APELLIDO'=>'LOPEZ',
             'USUARIO_ALIAS'=>'jlopez',
             'TELEFONO'=>'65643562',
             'EMAIL'=>'j.lopez@anh.gob.bo',
             'PASSWORD'=>bcrypt('123'),
             'AUD_ESTADO'=>1,
             'AUD_FECHA'=>Carbon::now(),
         ]);
          $this->be($user);
          $this->session(['ROL'=>6]);

          $this->get('/item/create')
                  ->assertSee('item');
          $response = $this->from('/item/create')->post('/item/store', [
              'FAMILIA'=>'CAMARAS',
              'CODIGO_ACTIVO'=>'1',
              'NOMBRE'=>'jlopez',
              'IP'=>'192.168.10.2',
              'CODIGO_SAF'=>'1',
              'USUARIO_ALIAS'=>'marco',
              'PASSWORD'=>bcrypt('123'),
 
          ]);
         $this->be($user);
         $response = $this->get('/item');
         $response->assertStatus(200);
    }
}
