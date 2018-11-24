<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usit extends Model
{
    protected $table ='TCPD_USIT';
    protected $primaryKey = 'ID_USIT';
    public $timestamps = false;
    protected $fillable = ['FK_CPD_PARA_IP_USIT_PI',
                           'APP_ID_HISTORICO',
                           'FK_CPD_ITEM_II_USIT_II',
                           'FK_CPD_USUA_IU_USIT_UI',
                           'AUD_ESTADO',
                           'AUD_FECHA',
                           'AUD_USUARIO',
                           'AUD_BAJA_FECHA',
                           'AUD_BAJA_USUARIO',
                           ];

}
