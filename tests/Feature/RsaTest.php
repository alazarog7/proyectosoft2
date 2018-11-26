<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Library\RSACrypt;

class RsaTest extends TestCase
{
    /**
     * @test
     * */
    public function prueba()
    {
        $encrypt = new RSACrypt();
        $temp = $encrypt->encriptado("usuario");
        $this->assertEquals("usuario",$encrypt->desencriptado($temp));
    }
}
