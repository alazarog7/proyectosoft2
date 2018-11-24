<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Item;
use Illuminate\Support\Facades\DB;

class HistoricoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth3');
    }
    public function listItem(){
        $items = DB::select("
            SELECT b.\"NOMBRE\" AS \"FAMILIA\",a.\"NOMBRE\",a.\"CODIGO_ACTIVO\",a.\"IP\",a.\"CODIGO_SAF\",a.\"ID_ITEM\",a.\"AUD_ESTADO\"
                                     FROM \"TCPD_ITEM\" a INNER JOIN (SELECT \"ID_ITEM\",\"NOMBRE\" FROM \"TCPD_ITEM\" WHERE \"FK_CPD_PARA_IP_ITEM_PI\"=1) b ON a.\"FK_CPD_PADRE\"=b.\"ID_ITEM\" 
                                     WHERE
                                     a.\"FK_CPD_PARA_IP_ITEM_PI\"=2 AND
                                     a.\"FK_CPD_PADRE\" IS NOT NULL AND 
                                     a.\"APP_ID_HISTORICO\" IS NULL
                                     ORDER BY \"FAMILIA\"
        ");

        return view('historico.item',['items'=>$items]);
    }

    /**
     * @param $id
     * sujetos a cambios por migracion a oracle
     * -> OFFSET
     */
    public function showItem($id){
        $item = DB::select("
                                        SELECT
                                            a.\"NOMBRE\",
                                            a.\"CODIGO_ACTIVO\",
                                            a.\"IP\",
                                            a.\"CODIGO_SAF\",
                                            a.\"PASSWORD\",
                                             CASE
                                               WHEN a.\"AUD_ESTADO\" = 1  THEN 'CREADO'
                                               WHEN a.\"AUD_ESTADO\" = 2  THEN 'MODIFICADO'
                                               WHEN a.\"AUD_ESTADO\" = 3  THEN 'ELIMINADO'
                                             END AS \"ACCION\",
                                             (
                                              SELECT concat(b.\"NOMBRE\", ' ', b.\"APELLIDO\")
                                              FROM \"TCPD_USUA\" b
                                              WHERE b.\"ID_USUA\" = a.\"AUD_USUARIO\"
                                             ) AS \"USUARIO\",
                                            a .\"AUD_FECHA\",
                                            a.\"AUD_BAJA_FECHA\",
                                            ( 
                                              SELECT concat(c.\"NOMBRE\", c.\"APELLIDO\")
                                              FROM \"TCPD_USUA\" c
                                            WHERE c.\"ID_USUA\" = a.\"AUD_BAJA_USUARIO\"
                                            ) AS \"AUD_BAJA_USUARIO\"
                                         FROM \"TCPD_ITEM\" a
                                         WHERE a.\"ID_ITEM\" = ".$id." OR a.\"APP_ID_HISTORICO\" = ".$id."
                                         ORDER BY a.\"AUD_FECHA\" ASC  
                                          ");
        //dd($item);
        return view('historico.item_act',['item'=>$item,'codigo'=>$id]);
    }
    public function listUserPri(){
        $user = User::where('APP_ID_HISTORICO',null)->get();

        return view('historico.usuario',['user'=>$user]);
    }

    /**
     *
     */
    public function showUserPri($id){
        $privilegio = DB::select("
                        SELECT  d.\"NOMBRE\",
                                CONCAT(b.\"NOMBRE\",' ',b.\"APELLIDO\") AS \"USUARIO\",
                                CASE WHEN a.\"FK_CPD_PARA_IP_USIT_PI\" = 3 THEN 'LEER'
                                                WHEN a.\"FK_CPD_PARA_IP_USIT_PI\" = 4 THEN 'ACTUALIZAR'
                                                WHEN a.\"FK_CPD_PARA_IP_USIT_PI\" = 5 THEN 'REGENERAR'
                                END AS \"PRIVILEGIO\",
                                (
                                  SELECT CONCAT(m.\"NOMBRE\",' ',m.\"APELLIDO\")
                                  FROM \"TCPD_USUA\" m
                                  WHERE m.\"ID_USUA\" = a.\"AUD_USUARIO\"
                                ) AS \"AUTOR_REG\",
                                a.\"AUD_FECHA\",
                                a.\"AUD_BAJA_FECHA\",
                                (
                                  SELECT CONCAT(m.\"NOMBRE\",' ',m.\"APELLIDO\")
                                  FROM \"TCPD_USUA\" m
                                  WHERE m.\"ID_USUA\" = a.\"AUD_BAJA_USUARIO\"
                                ) AS \"AUTOR_BAJ\"
                        
                        FROM \"TCPD_USIT\" a  INNER JOIN  \"TCPD_USUA\" b ON b.\"ID_USUA\" = a.\"FK_CPD_USUA_IU_USIT_UI\"
                                            INNER JOIN  \"TPAR_PARA\" c ON c.\"ID_PARA\" = a.\"FK_CPD_PARA_IP_USIT_PI\"
                                            INNER JOIN  \"TCPD_ITEM\" d ON d.\"ID_ITEM\" = a.\"FK_CPD_ITEM_II_USIT_II\"
                        WHERE b.\"ID_USUA\"=".$id." AND
                              a.\"FK_CPD_PARA_IP_USIT_PI\" IS NOT NULL
                        ORDER BY a.\"AUD_FECHA\" ASC
        ");
        //dd($privilegio);
        return view('historico.usuario_act',['privilegio'=>$privilegio,'codigo'=>$id]);
    }
}
