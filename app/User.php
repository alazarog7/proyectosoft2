<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Carbon\Carbon;

class User extends Authenticatable
{
    use Notifiable;
    protected $table='TCPD_USUA';
    protected $primaryKey='ID_USUA';
    public $timestamps=false;
    public $rememberTokenName=false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'ID_USUA',
        'APP_ID_HISTORICO',
        'NOMBRE',
        'APELLIDO',
        'USUARIO_ALIAS',
        'TELEFONO',
        'EMAIL',
        'PASSWORD',
        'AUD_ESTADO',
        'AUD_FECHA',
        'AUD_USUARIO',
        'AUD_BAJA_FECHA',
        'AUD_BAJA_USUARIO',
    ];


    /**
     * @param $password
     */
    public function setPasswordAttribute($password){
        $this->attributes['PASSWORD'] = bcrypt($password);
    }
    public function setNombreAttribute($nombre){
        $this->attributes['NOMBRE'] = strtoupper($nombre);
    }

    /**
     * @param $apellido
     */
    public function setApellidoAttribute($apellido){
        $this->attributes['APELLIDO'] = strtoupper($apellido);
    }
    public function getAuthPassword()
    {
        return $this->PASSWORD;
    }

    /**
     * Obtencion de los roles
     */
    public function getRol(){
        return $this->FK_CPD_PARA_IP_USUA_RI;
    }

    public function rol(){
        return $this->hasMany('App\Rol');
    }
}
