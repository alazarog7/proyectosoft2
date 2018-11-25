<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Library\RSACrypt;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $encrypt = new RSACrypt();
        $temp = $encrypt->encriptado("hola");
        $this->assertEquals("hola",$encrypt->desencriptado($temp));
    }
}
