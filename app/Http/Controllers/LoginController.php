<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class LoginController extends Controller
{
    /**
     * @param Request $request
     */
    public function ingresar(Request $request){
        if(Auth::attempt(['USUARIO_ALIAS'=>$request->usuario,'password'=>$request->pass,'APP_ID_HISTORICO'=>NULL,'AUD_ESTADO'=>1])){
            $rol = DB::select("
                                        SELECT  \"FK_PARA_IP_ROL_RI\" as \"ROL\"
                                        FROM \"TCPD_USUA\" a INNER JOIN \"TCPD_ROL\" b ON a.\"ID_USUA\"=b.\"FK_USUA_ID_USUA_UI\"
                                        WHERE a.\"ID_USUA\"=".Auth::user()->ID_USUA." AND b.\"AUD_ESTADO\"=1
                                    ");
            //dd(Auth::user()->ID_USUA);
            session(["ROL"=>$rol[0]->ROL]);


            //********************** Comsiderar Importante ******************
            // Se debe ingresar la variable session para la creacion de los menus
            //Considerar acceder al rol a partir del Auth


            return view('principal');
        }else{
            return Redirect::to('/');
        }

    }
    public function salir(){

         Auth::logout();
         return Redirect::to('/');
    }
}
