<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $param = [['NOMBRE'=>'FAMILIA','CATEGORIA'=>1,'AUD_ESTADO'=>1,'AUD_FECHA'=>Carbon::now(),'AUD_USUARIO'=>1],
                  ['NOMBRE'=>'ITEM','CATEGORIA'=>1,'AUD_ESTADO'=>1,'AUD_FECHA'=>Carbon::now(),'AUD_USUARIO'=>1],
                  ['NOMBRE'=>'LEER','CATEGORIA'=>2,'AUD_ESTADO'=>1,'AUD_FECHA'=>Carbon::now(),'AUD_USUARIO'=>1],
                  ['NOMBRE'=>'ACTUALIZAR','CATEGORIA'=>2,'AUD_ESTADO'=>1,'AUD_FECHA'=>Carbon::now(),'AUD_USUARIO'=>1],
                  ['NOMBRE'=>'REGENERAR','CATEGORIA'=>2,'AUD_ESTADO'=>1,'AUD_FECHA'=>Carbon::now(),'AUD_USUARIO'=>1],
                  ['NOMBRE'=>'ADMINISTRADOR','CATEGORIA'=>3,'AUD_ESTADO'=>1,'AUD_FECHA'=>Carbon::now(),'AUD_USUARIO'=>1],
                  ['NOMBRE'=>'USUARIO','CATEGORIA'=>3,'AUD_ESTADO'=>1,'AUD_FECHA'=>Carbon::now(),'AUD_USUARIO'=>1],
                 ];
        $usuario = [
                    [
                         'NOMBRE'=>'JUAN',
                         'APELLIDO'=>'LOPEZ ARANA',
                         'USUARIO_ALIAS'=>'jlopez',
                         'TELEFONO'=>'75643562',
                         'EMAIL'=>'j.lopez@anh.gob.bo',
                         'PASSWORD'=>bcrypt('123'),
                         'AUD_ESTADO'=>1,
                         'AUD_FECHA'=>Carbon::now(),
                    ],
                    [
                        'NOMBRE'=>'PEDRO',
                        'APELLIDO'=>'MARTINEZ ARANA',
                        'USUARIO_ALIAS'=>'p.martinez',
                        'TELEFONO'=>'75943562',
                        'EMAIL'=>'p.martinez@anh.gob.bo',
                        'PASSWORD'=>bcrypt('123'),
                        'AUD_ESTADO'=>1,
                        'AUD_FECHA'=>Carbon::now(),
                    ],
                    ];
        $usuario_parametrica = [
                                    ['FK_PARA_IP_ROL_RI'=>6,'FK_USUA_ID_USUA_UI'=>1,'AUD_ESTADO'=>1,'AUD_FECHA'=>Carbon::now(),'AUD_USUARIO'=>null],
                                    ['FK_PARA_IP_ROL_RI'=>7,'FK_USUA_ID_USUA_UI'=>2,'AUD_ESTADO'=>1,'AUD_FECHA'=>Carbon::now(),'AUD_USUARIO'=>1],
                                ];






        DB::table('TPAR_PARA')->insert($param);
        DB::table('TCPD_USUA')->insert($usuario);
        //DB::table('TCPD_ITEM')->insert($items);
        DB::table('TCPD_ROL')->insert($usuario_parametrica);
    }
}
