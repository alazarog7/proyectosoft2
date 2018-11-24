<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade as PDF;

class PDFHistoricoController extends Controller
{
    /**
     * @descripcion Este metodo imprime el historico de un item seleccionado
     * @nota El query esta sujeto a cambios ya que tiene errores
     */
    public function imprimirHistoricoItem($item){
        //
        //dd($item);
        $items = DB::select("
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
                                         WHERE a.\"ID_ITEM\" = ".$item." OR a.\"APP_ID_HISTORICO\" = ".$item."
                                         ORDER BY a.\"AUD_FECHA\" ASC  
                                          ");
        view()->share('item',$items);
        $pdf = PDF::loadView('pdfview'); // Esta vista es de prueba
        return $pdf->download('userlist.pdf');

    }

    /**
     * @descripcion Este metodo se encarga de imprimir el historico por un usuario seleccionado
     */
    public  function  imprimirHistoricoUsuarioPrivilegio($user){
        $prvilegio=DB::select(" SELECT  d.\"NOMBRE\",
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
                        WHERE b.\"ID_USUA\"=".$user." AND
                              a.\"FK_CPD_PARA_IP_USIT_PI\" IS NOT NULL
                        ORDER BY a.\"AUD_FECHA\" ASC");
        //dd($prvilegio);
        view()->share('privilegio',$prvilegio);
        $pdf = PDF::loadView('pdf_historico.privilegio_user'); // Esta vista es de prueba
        return $pdf->download('privuser.pdf');

    }
    /**
     * @descripcion  Este metodo se encarga de  deplegar el historico por familia
     */
    public  function  imprimirHistoricoItemFamilia($i_familia){
        //
    }
    /**
     * @descripcion Este metodo se encaraga de imprimir
     *              todo el historico de los items
     */
    public function imprimirHistoricoItemAll(){
        //
    }
    /**
     * @descripcion Este metodo se encarga de imprimir
     *              todo el historioco por usuario
     */
    public function imprimirHistoricoUsuarioAll(){
        //
    }
}
