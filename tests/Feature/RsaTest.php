<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Library\RSACrypt;

class RsaTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $encrypt = new RSACrypt();
        $temp = $encrypt->encriptado("usuario");
        $this->assertEquals("usuario",$encrypt->desencriptado($temp));
    }
}
