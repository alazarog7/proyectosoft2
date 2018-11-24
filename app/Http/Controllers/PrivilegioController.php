<?php

namespace App\Http\Controllers;

use App\Item;
use App\User;
use App\Usit;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\Item as ItemRequest;

class PrivilegioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //dd(session()->get('ROL'));

        $items =  DB::select("SELECT b.\"ID_ITEM\" as \"ID_FAMILIA\",b.\"NOMBRE\" AS \"FAMILIA\",a.\"NOMBRE\",a.\"CODIGO_ACTIVO\",a.\"IP\",a.\"CODIGO_SAF\",a.\"ID_ITEM\",a.\"USUARIO_ALIAS\",a.\"PASSWORD\",a.\"AUD_ESTADO\"
                                     FROM \"TCPD_ITEM\" a INNER JOIN (SELECT \"ID_ITEM\",\"NOMBRE\" FROM \"TCPD_ITEM\" WHERE \"FK_CPD_PARA_IP_ITEM_PI\"=1) b ON a.\"FK_CPD_PADRE\"=b.\"ID_ITEM\" 
                                     WHERE
                                     a.\"FK_CPD_PARA_IP_ITEM_PI\"=2 AND
                                     a.\"FK_CPD_PADRE\" IS NOT NULL AND 
                                     (a.\"AUD_ESTADO\"=1)
                                     ORDER BY b.\"NOMBRE\"
                                    ");

        $param = DB::select("
                                    SELECT a.\"ID_PARA\",a.\"NOMBRE\"
                                    FROM \"TPAR_PARA\" a
                                    WHERE
                                      a.\"CATEGORIA\"=2
                          ");

        $privilegios = DB::select("
                                        SELECT a.\"ID_USIT\",a.\"FK_CPD_PARA_IP_USIT_PI\",a.\"FK_CPD_ITEM_II_USIT_II\"
                                        FROM \"TCPD_USIT\" a INNER JOIN \"TCPD_USUA\" b ON a.\"FK_CPD_USUA_IU_USIT_UI\"=b.\"ID_USUA\"
                                        WHERE b.\"ID_USUA\" = ".Auth::user()->ID_USUA." AND a.\"AUD_ESTADO\"=1
                                ");
        return view('usuario.usuario-item',['items'=>$items, 'ope'=>$param,'privilegio'=>$privilegios]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $usuario = User::findOrFail($id);

        $items =  DB::select("SELECT b.\"ID_ITEM\" as \"ID_FAMILIA\",b.\"NOMBRE\" AS \"FAMILIA\",a.\"NOMBRE\",a.\"CODIGO_ACTIVO\",a.\"IP\",a.\"CODIGO_SAF\",a.\"ID_ITEM\",a.\"PASSWORD\",a.\"AUD_ESTADO\"
                                     FROM \"TCPD_ITEM\" a INNER JOIN (SELECT \"ID_ITEM\",\"NOMBRE\" FROM \"TCPD_ITEM\" WHERE \"FK_CPD_PARA_IP_ITEM_PI\"=1) b ON a.\"FK_CPD_PADRE\"=b.\"ID_ITEM\" 
                                     WHERE
                                     a.\"FK_CPD_PARA_IP_ITEM_PI\"=2 AND
                                     a.\"FK_CPD_PADRE\" IS NOT NULL AND 
                                     (a.\"AUD_ESTADO\"=1)
                                     ORDER BY b.\"NOMBRE\"
                                    ");
        $param = DB::select("
                                    SELECT a.\"ID_PARA\",a.\"NOMBRE\"
                                    FROM \"TPAR_PARA\" a
                                    WHERE
                                      a.\"CATEGORIA\"=2
                          ");
        $privilegios = DB::select("
                                        SELECT a.\"ID_USIT\",a.\"FK_CPD_PARA_IP_USIT_PI\",a.\"FK_CPD_ITEM_II_USIT_II\"
                                        FROM \"TCPD_USIT\" a INNER JOIN \"TCPD_USUA\" b ON a.\"FK_CPD_USUA_IU_USIT_UI\"=b.\"ID_USUA\"
                                        WHERE b.\"ID_USUA\" = ".$id." AND a.\"AUD_ESTADO\"=1
                                ");
        return view('privilegio.usuario-privilegio',["usuario"=>$usuario,'items'=>$items, 'ope'=>$param,'privilegio'=>$privilegios]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $familia = Item::all();
        $item = Item::findOrFail($id);
        return view('usuario.usuario-item-modi',['familia'=>$familia,'item'=>$item]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ItemRequest $request, $id)
    {
        $item = Item::findOrFail($id);
        $item2 =  new Item;
        $item2->fill(array(
            'APP_ID_HISTORICO'=>$id,
            'FK_CPD_PARA_IP_ITEM_PI'=>2,
            'FK_CPD_PADRE'=>$item->FK_CPD_PADRE,
            'CODIGO_ACTIVO'=>$item->CODIGO_ACTIVO,
            'NOMBRE'=>$item->NOMBRE,
            'IP'=>$item->IP,
            'CODIGO_SAF'=>$item->CODIGO_SAF,
            'USUARIO_ALIAS'=>$item->USUARIO_ALIAS,
            'PASSWORD'=>$item->PASSWORD,
            'DESCRIPCION'=>$item->DESCRIPCION,
            'AUD_ESTADO'=>2,
            'AUD_FECHA'=>Carbon::now(),
            'AUD_USUARIO'=>Auth::user()->ID_USUA,
        ))->save();

        $item->fill($request->all())->update();

        return Redirect::to('privilegio');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function asignarPrivilegio($idUser,$idItem,$idParam,Request $request){
        //dd($request->all());
        if($request->accion == 0){
            $privilegio = new Usit;
            $privilegio->fill(array(
                'FK_CPD_PARA_IP_USIT_PI'=>$idParam,
                'FK_CPD_ITEM_II_USIT_II'=>$idItem,
                'FK_CPD_USUA_IU_USIT_UI'=>$idUser,
                'AUD_ESTADO'=>1,
                'AUD_FECHA'=>Carbon::now(),
                'AUD_USUARIO'=>Auth::user()->ID_USUA
            ))->save();
        }else{
            $privilegio = Usit::findOrFail($request->usit);
            $privilegio->fill(array(
                'AUD_ESTADO'=>3,
                'AUD_BAJA_FECHA'=>Carbon::now(),
                'AUD_BAJA_USUARIO'=>Auth::user()->ID_USUA
            ))->update();
        }

        return Redirect::route('privilegio.show',$idUser);
    }

}
