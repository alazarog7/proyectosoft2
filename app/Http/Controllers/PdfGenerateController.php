<?php

namespace App\Http\Controllers;

use App\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade as PDF;




class PdfGenerateController extends Controller
{
    /**
     * @param Request $request
     * @param $id
     * @return mixed
     * @descripcion Este es un modelo del metodo para imprimir un pdf
     */
    public function pdfview(Request $request,$id)
    {

        $item = Item::where('APP_ID_HISTORICO',$id)->get();
        view()->share('item',$item);
        // pass view file
        $pdf = PDF::loadView('pdfview');
        // download pdf
        return $pdf->download('userlist.pdf');
    }
}
