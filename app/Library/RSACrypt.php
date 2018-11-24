<?php
/**
 * Created by PhpStorm.
 * User: alejandrolazarogutierrez
 * Date: 15/11/18
 * Time: 16:34
 */

namespace App\Library;
use phpseclib\Crypt\RSA;
class RSACrypt
{
    private $PRK_FILE = "../App/Library/PRkey.txt";
    private $PK_FILE =  "../App/Library/Pkey.txt";
    public function  __construct(){

        $rsa = new RSA();
        if(filesize($this->PRK_FILE) == 0 or filesize($this->PK_FILE) == 0 ){
            $llave = $rsa->createKey(2048);
            // Creando la llave privada
            $privateFile = fopen($this->PRK_FILE,"w");
            fwrite($privateFile,$llave["privatekey"]);
            fclose($privateFile);
            //Fin creacion llave privada

            //Creando la llave publica
            $publicFile = fopen($this->PK_FILE,"w");
            fwrite($publicFile,$llave["publickey"]);
            fclose($publicFile);
            //Fin creacion de la llave publca
        }
    }

    public function encriptado($password){

        $rsa = new RSA();
        $file = fopen($this->PK_FILE,"r");
        $archivo = fread($file,filesize($this->PK_FILE));
        fclose($file);
        $rsa->loadKey($archivo);
        $ciphertext = $rsa->encrypt($password);
        return $ciphertext;

    }
    public  function desencriptado($encripted){

        $rsa = new RSA();
        $file = fopen($this->PRK_FILE,"r");
        $archivo = fread($file,filesize($this->PRK_FILE));
        $rsa->loadKey($archivo);
        fclose($file);
        $ciphertext = $rsa->decrypt($encripted);
        return $ciphertext;

    }
}