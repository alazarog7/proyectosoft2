<?php

namespace App\Http\Controllers;

use App\Http\Requests\Usuario;
use App\Http\Requests\UsuarioActualizacion;
use App\Parametrica;
use App\Rol;
use App\User;
use App\Usit;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class UsuarioController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth3');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $usuario = DB::select("
                                      SELECT a.\"ID_USUA\",b.\"ID_ROL\", c.\"ID_PARA\",a.\"NOMBRE\",a.\"APELLIDO\",a.\"TELEFONO\",a.\"EMAIL\",c.\"NOMBRE\" as \"ROL\", 
                                             a.\"AUD_ESTADO\",c.\"ID_PARA\"
                                      FROM  
                                          \"TCPD_USUA\" a 
                                          INNER JOIN  \"TCPD_ROL\" b ON a.\"ID_USUA\"=b.\"FK_USUA_ID_USUA_UI\" 
                                          INNER JOIN \"TPAR_PARA\" c ON b.\"FK_PARA_IP_ROL_RI\"=c.\"ID_PARA\"
                                      WHERE 
                                          c.\"CATEGORIA\"=3   AND
                                          b.\"APP_ID_HISTORICO\" IS NULL AND 
                                          a.\"NOMBRE\" LIKE '%".$request->nombre."%'AND 
                                          a.\"APELLIDO\" LIKE '%".$request->apellido."%'AND 
                                          a.\"TELEFONO\" LIKE '%".$request->fono."%'AND 
                                          a.\"EMAIL\" LIKE '%".$request->email."%' AND
                                          c.\"ID_PARA\" in (".($request->rol?$request->rol:'6,7').")AND
                                          a.\"AUD_ESTADO\" = 1 
                                      ORDER BY c.\"NOMBRE\"
                                      ");
        $combo_rol = DB::select("
                                    SELECT * 
                                    FROM \"TPAR_PARA\"
                                    WHERE 
                                         \"CATEGORIA\"=3  
                        ");

        return view('usuario.index',['usuario'=>$usuario,'rol'=>$combo_rol]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $combo_rol = DB::select("
                                    SELECT * 
                                    FROM \"TPAR_PARA\"
                                    WHERE 
                                         \"CATEGORIA\"=3  
                        ");
        return view('usuario.usuario-registro',['combo_rol'=>$combo_rol]);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Usuario $request)
    {

        $request->request->add(array(
            'AUD_ESTADO'=>1,
            'AUD_FECHA'=>Carbon::now(),
            'AUD_USUARIO'=>Auth::user()->ID_USUA
        ));
        $usuario = new User;
        $usuario->fill($request->all())->save();
        $rol =  new Rol;
        $roles = array( 'FK_PARA_IP_ROL_RI'=>$request->ROL,
                        'FK_USUA_ID_USUA_UI'=>$usuario->ID_USUA,
                        'AUD_ESTADO'=>1,
                        'AUD_FECHA'=>Carbon::now(),
                        'AUD_USUARIO'=>Auth::user()->ID_USUA
                       );
        $rol->fill($roles)->save();

        return Redirect::to('usuario');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $combo_rol = DB::select("
                                    SELECT \"ID_PARA\",\"NOMBRE\"
                                    FROM \"TPAR_PARA\"
                                    WHERE 
                                         \"CATEGORIA\"=3  
                        ");
        $usuario = DB::select("
                                      SELECT *
                                      FROM \"TCPD_USUA\" a INNER JOIN \"TCPD_ROL\" b ON a.\"ID_USUA\"=b.\"FK_USUA_ID_USUA_UI\"
                                      WHERE a.\"ID_USUA\"=".$id." AND b.\"AUD_ESTADO\"=1
                                    ");
        //dd($usuario);
        return view('usuario.usuario-modi',['usuario'=>$usuario,'combo_rol'=>$combo_rol]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UsuarioActualizacion $request, $id)
    {
        $flag = false;
        //dd("hola");
        $usuario = User::where('NOMBRE',$request->NOMBRE)
                        ->where('APELLIDO',$request->APELLIDO)
                        ->where('USUARIO_ALIAS',$request->USUARIO_ALIAS)
                        ->where('TELEFONO',$request->TELEFONO)
                        ->where('EMAIL',$request->EMAIL)->first();
        $rol = Rol::where("FK_USUA_ID_USUA_UI",$id)
                  ->where('AUD_ESTADO',1)->first();

        //dd($usuario);
        //dd($rol);
        //dd("hola");
        //dd("se cambiara el rol".$request->ROL);
        //dd($privilegios);
        if($rol->FK_PARA_IP_ROL_RI!=$request->ROL){
            //dd("se cambiara el rol".$request->ROL);
            //$rol = Rol::where("FK_USUA_ID_USUA_UI",$id)->first();
            $rol2 = new Rol;
            $rol2->fill(array(
                'FK_PARA_IP_ROL_RI'=>$rol->FK_PARA_IP_ROL_RI,
                'FK_USUA_ID_USUA_UI'=>$rol->FK_USUA_ID_USUA_UI,
                'APP_ID_HISTORICO'=>$rol->ID_ROL,
                'AUD_ESTADO'=>2,
                'AUD_FECHA'=>Carbon::now(),
                'AUD_USUARIO'=>Auth::user()->ID_USUA
            ))->save();
            if(Auth::user()->ID_USUA==$rol->FK_USUA_ID_USUA_UI){
                session(["ROL"=>session()->get('ROL')==7?6:7]);
                $flag = true;
            }
            //session(["ROL"=>session()->get('ROL')==7?6:7]);
            $rol->fill(array(
                'FK_PARA_IP_ROL_RI'=>$request->ROL
            ))->update();
           /*$privilegios= Usit::where('FK_CPD_USUA_IU_USIT_UI',$id)
                               ->where('AUD_ESTADO',1);
            privilegios->update(array('AUD_BAJA_USUARIO'=>Auth::user()->ID_USUA,'AUD_BAJA_FECHA'=>Carbon::now()));
           */
        }
        if(!isset($usuario) or isset($request->PASSWORD)){
            $user = User::findOrFail($id);
            $user2 = $user->replicate();
            $user2->save();
            /*$user2 = new User;*/
            $user2->fill(array(
                'APP_ID_HISTORICO'=>$id,
                'AUD_ESTADO'=>2,
                'AUD_FECHA'=>Carbon::now(),
                'AUD_USUARIO'=>Auth::user()->ID_USUA
            ))->update();

            if(!isset($request->PASSWORD)) $request->request->remove('PASSWORD');
            $user->fill($request->all())->update();

        }
        //dd("Nose cambiara nada");
        if($flag){
            return Redirect::to('item');
        }else{
            return Redirect::to('usuario');
        }


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $usuario = User::findOrFail($id);
        $usuario->fill(['AUD_ESTADO'=>3,
                        'AUD_BAJA_FECHA'=>Carbon::now(),
                        'AUD_BAJA_USUARIO'=>Auth::user()->ID_USUA])->update();

        $rol = Rol::where("FK_USUA_ID_USUA_UI",$id)->first();
        //dd($rol);
        $rol->fill(['AUD_ESTADO'=>3,
                    'AUD_BAJA_FECHA'=>Carbon::now(),
                    'AUD_BAJA_USUARIO'=>Auth::user()->ID_USUA])->update();
        return Redirect::to('usuario');
    }
    /**
     * Dar de alta un usuario que esta como
     *
     * no vigente
     *
     */
    public function altaRegistro($id){
       // dd($id);
        $user = User::findOrFail($id);
        $user2 = $user->replicate();
        $user2->fill(array(
            //'APP_ID_HISTORICO'=>$user->ID_USUA,
            'AUD_ESTADO'=>1,
            'AUD_FECHA'=>Carbon::now(),
            'AUD_USUARIO'=>Auth::user()->ID_USUA
        ))->save();
        $rol = Rol::where("FK_USUA_ID_USUA_UI",$id)->first();
        $rol2 = $rol->replicate();
        $rol2->fill(array(
            'FK_USUA_ID_USUA_UI'=>$user2->ID_USUA,
            //'APP_ID_HISTORICO'=>$rol->ID_ROL,
            'AUD_ESTADO'=>1,
            'AUD_FECHA'=>Carbon::now(),
            'AUD_USUARIO'=>Auth::user()->ID_USUA
        ))->save();
        return Redirect::to('usuario');
    }


}
