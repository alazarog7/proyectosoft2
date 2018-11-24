<?php

namespace App;
use App\Library\RSACrypt;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{

    protected $table='TCPD_ITEM';
    protected $primaryKey='ID_ITEM';
    public $timestamps=false;
    protected $fillable = [ 'FK_CPD_PARA_IP_ITEM_PI',
                            'FK_CPD_PADRE',
                            'APP_ID_HISTORICO',
                            'CODIGO_ACTIVO',
                            'NOMBRE',
                            'IP',
                            'CODIGO_SAF',
                            'USUARIO_ALIAS',
                            'PASSWORD',
                            'DESCRIPCION',
                            'AUD_ESTADO',
                            'AUD_FECHA',
                            'AUD_USUARIO',
                            'AUD_BAJA_FECHA',
                            'AUD_BAJA_USUARIO'
                            ];

    public function setNombreAttribute($nombre){
        $this->attributes['NOMBRE'] = strtoupper($nombre);
    }
    public function setPasswordAttribute($password){
        $encrypt = new RSACrypt();
        $this->attributes['PASSWORD'] = base64_encode($encrypt->encriptado($password));
    }

}
