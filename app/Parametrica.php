<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Parametrica extends Model
{
    protected $table='TPAR_PARA';
    protected $primaryKey='ID_PARA';
    public$timestamps=false;
    public function rol(){
        return $this->hasMany('App\Rol');
    }

}
