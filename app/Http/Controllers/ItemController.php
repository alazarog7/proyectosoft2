<?php

namespace App\Http\Controllers;

use App\Item;
use App\Providers\RsaEncDecProvider;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\Item as ItemRequest;
use App\Library\RSACrypt;
class ItemController extends Controller
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
        $familias = Item::where('FK_CPD_PARA_IP_ITEM_PI',1)->get();
        return view('item.index',['familia'=>$familias]);
    }
    /**
     * @param Pone las familias en cards
     */

    public function listFamiliaItem(Request $request,$id){
        //dd($id);
        $prueba = DB::select("
                                    SELECT b.\"NOMBRE\" AS \"FAMILIA\",a.\"NOMBRE\",a.\"CODIGO_ACTIVO\",a.\"IP\",a.\"CODIGO_SAF\",a.\"ID_ITEM\",a.\"AUD_ESTADO\"
                                     FROM \"TCPD_ITEM\" a INNER JOIN (SELECT \"ID_ITEM\",\"NOMBRE\" FROM \"TCPD_ITEM\" WHERE \"FK_CPD_PARA_IP_ITEM_PI\"=1) b ON a.\"FK_CPD_PADRE\"=b.\"ID_ITEM\" 
                                     WHERE
                                     a.\"FK_CPD_PARA_IP_ITEM_PI\"=2 AND
                                     a.\"FK_CPD_PADRE\"=".$id." AND 
                                     (a.\"AUD_ESTADO\"=1) AND
                                     b.\"NOMBRE\" LIKE '%".$request->familia."%' AND 
                                     a.\"NOMBRE\" LIKE '%".$request->item."%' AND 
                                     a.\"CODIGO_ACTIVO\" LIKE '%".$request->cod_activo."%' AND 
                                     a.\"IP\" LIKE '%".$request->ip."%' AND 
                                     a.\"CODIGO_SAF\" LIKE '%".$request->CODIGO_SAF."%' 
                                     ORDER BY b.\"NOMBRE\"
                                    ");

        $item =Item::all();
        return view('item.item',['item'=>$item,'lista'=>$prueba]);//Se debe separar en una carpeta independiente para los items
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $familia = Item::where('FK_CPD_PADRE',null)->get();
        return view('item.item-registro',['item'=>$familia]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ItemRequest $request)
    {
         //dd($request);
         $request->request->add(['FK_CPD_PARA_IP_ITEM_PI'=>2,
                                 'FK_CPD_PADRE'=>$request->FAMILIA,
                                 'AUD_ESTADO'=>1,
                                 'AUD_FECHA'=>Carbon::now(),
                                 'AUD_USUARIO'=>Auth::user()->ID_USUA
                                ]);
         $item = new Item;
         $item->fill($request->all())->save();
         return redirect('/itemFam/'.$request->FAMILIA);
         //return Redirect::to('item');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //return "hola";
        //dd("hola");
        $item = Item::where('APP_ID_HISTORICO',null)
                    ->where('ID_ITEM',$id)->first();
        $encrypt = new RSACrypt();
        $item->PASSWORD_D = $encrypt->desencriptado(base64_decode($item->PASSWORD));
        return response()->json(['item'=>$item]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //dd($id);
        $familia = Item::all();
        $item = Item::findOrFail($id);
        return view('item.item-modi',['familia'=>$familia,'item'=>$item]);

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
        //$request->request->add(['APP_ID_HISTORICO'=>$id,'FK_CPD_PADRE'=>2]);
        //dd($request);

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

        return redirect('itemFam/'.$item->FK_CPD_PADRE);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Item::findOrFail($id);
        //dd($item);

        if($item->AUD_ESTADO == 1){
            $item->AUD_ESTADO = 3;
            $item->AUD_BAJA_FECHA = Carbon::now();
            $item->AUD_BAJA_USUARIO = Auth::user()->ID_USUA;
            $item->update();
        }else{
            $item_i = new Item;
            $item_i->FK_CPD_PARA_IP_ITEM_PI = 2;
            $item_i->FK_CPD_PADRE = $item->FK_CPD_PADRE;
            $item_i->APP_ID_HISTORICO = $item->ID_ITEM;
            $item_i->CODIGO_ACTIVO = $item->CODIGO_ACTIVO;
            $item_i->NOMBRE = $item->NOMBRE;
            $item_i->IP = $item->IP;
            $item_i->CODIGO_SAF = $item->CODIGO_SAF;
            $item_i->USUARIO_ALIAS = $item->USUARIO_ALIAS;
            $item_i->PASSWORD = $item->PASSWORD;
            $item_i->save();
        }
        return Redirect::to('item');
    }

    /**
     *Regeneracion de passowrds
     */
    public function regenerarPassword(Request $request){

        //dd($request->all());
        $items = DB::select("
                                    SELECT *
                                    FROM \"TCPD_ITEM\"
                                    WHERE
                                      \"FK_CPD_PADRE\"=".$request->ID_FAMILIA." AND
                                      \"AUD_ESTADO\" = 1
                          ");
        //dd($items);
        $radom_s  = substr(
                          str_shuffle(
                                      str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ',
                                                ceil(10/strlen($x))
                                                 )
                          ),1,10);

        //dd($radom_s);
        foreach ($items AS $i){
            $item_familia = Item::findOrFail($i->ID_ITEM);
            //echo $item_familia->ID_ITEM;
            //echo "<br>";
            $item_familia2 = new Item;
            $item_familia2->fill(array(
                'FK_CPD_PARA_IP_ITEM_PI' => 2,
                'FK_CPD_PADRE' => $item_familia->FK_CPD_PADRE,
                'APP_ID_HISTORICO'=> $item_familia->ID_ITEM,
                'CODIGO_ACTIVO'=> $item_familia->CODIGO_ACTIVO,
                'NOMBRE'=> $item_familia->NOMBRE,
                'IP' => $item_familia->IP,
                'CODIGO_SAF' => $item_familia->CODIGO_SAF,
                'PASSWORD'=>$item_familia->PASSWORD,
                'AUD_ESTADO'=>2,
                'AUD_FECHA'=>Carbon::now(),
                'AUD_USUARIO'=>Auth::user()->ID_USUA
            ))->save();
            $item_familia->fill(array(
                'PASSWORD'=>(strcmp($request->FAMILIA,"igual"))==0?$radom_s:substr(
                                                                                        str_shuffle(
                                                                                            str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ',
                                                                                                ceil(10/strlen($x))
                                                                                            )
                                                                                        ),1,10)
            ))->update();

        }
        if(session()->get('ROL')=='6'){
            return Redirect::to('item');
        }else{
            return Redirect::to('privilegio');
        }

        //return Redirect::to('item');
    }
}
