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

    public function  __construct(){
        //
    }

    public function encriptado($password){

        $rsa = new RSA();
        $archivo="-----BEGIN PUBLIC KEY-----
                MIGfMA0GCSqGSIb3DQEBAQUAA4GNADCBiQKBgQC/WN0hikX2AF/5LO/8NvoqViXq
                /XRNru2t250uahJfvfc+U3ybN/eg5EGfIpwQTxjWyCf7SXKWyQDeQIY8kplmI6Ub
                pkVMt9BSaPvA22ypVfKnQZJtoL2dM1U8v26B1ljNjzZqA7mlpiEQ93bQ/gc4fAFk
                oLvq6Dyi57+NxWRG5wIDAQAB
                -----END PUBLIC KEY-----";
        $rsa->loadKey($archivo);
        $ciphertext = $rsa->encrypt($password);
        return $ciphertext;

    }
    public function desencriptado($encripted){

        $rsa = new RSA();
        $archivo="-----BEGIN RSA PRIVATE KEY-----
                MIICXgIBAAKBgQC/WN0hikX2AF/5LO/8NvoqViXq/XRNru2t250uahJfvfc+U3yb
                N/eg5EGfIpwQTxjWyCf7SXKWyQDeQIY8kplmI6UbpkVMt9BSaPvA22ypVfKnQZJt
                oL2dM1U8v26B1ljNjzZqA7mlpiEQ93bQ/gc4fAFkoLvq6Dyi57+NxWRG5wIDAQAB
                AoGBAIWWSruxx2oZlOdnYhxZXYnVHx/R1zKs366zVicjUrSY8VYH/0R2bGFdOhsZ
                lI8mSZcZoiAjhOaUahDAR3deeczHWw1nm6rRpEC13V1zUPYE9bE42fDCpKsJk/oO
                cgv1pSnhjhNn0NuuG3xuN5pqyNf1SRhtrJsM5tbWf3Mf0aSRAkEA/TUK7QosVjgv
                ZZWv/2hziEvTiVPeTbysL+rO3Oq64iyiZ00Rll+rxHhnFUgWUZD2t2/5Y89cEf0f
                NQU7IMQJewJBAMF1JxP6ZkeSJeN2EmCkLc1/IlQP/9EcMQrw7V+QxysLGpzWxn7O
                jE0F5eMwgUESroDIWoPxZjgNP8m+nzvB7oUCQG0Yho2dHX9Ek/9T4FHOYkDuUsVP
                km+yBApdRCXhKQY8LvkNNq+wpuRu8BM2TQ91wydEIpLDjCrgAasphtFWRbMCQQCP
                c+TfXp17Uvc/fS1Rdkz0heKZvSdwE1yWhWMvqzbVRy2bwXN9UoIdF1OJrU0bSNQX
                cPoVvuqSg9iaK/z9nefVAkEAzcNCSrap87whGhWF6KKO3xYdYAfDMAokNHa0HL44
                yiTpuLM6XMazqLvFGDwbr/BUm0FjN2nR2HTWyo4cn6xyyA==
                -----END RSA PRIVATE KEY-----";
        $rsa->loadKey($archivo);
        $ciphertext = $rsa->decrypt($encripted);
        return $ciphertext;

    }
}