<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    protected $table='TCPD_ROL';
    protected $primaryKey='ID_ROL';
    public $timestamps=false;
    protected $fillable = [
        'FK_PARA_IP_ROL_RI','FK_USUA_ID_USUA_UI','APP_ID_HISTORICO','AUD_ESTADO','AUD_FECHA','AUD_USUARIO','AUD_BAJA_FECHA','AUD_BAJA_USUARIO'
    ];
    /**
     * Joinf de las tablas usuario y parametrica
     */
    public function user(){
        return $this->belongsTo('App\User');
    }
    public function para(){
        return $this->belongsTo('App\Parametrica');
    }

}
