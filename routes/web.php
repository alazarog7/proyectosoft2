<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('inicio');
});

Route::get('/principal',function (){
    return view('principal');
})->name('principal')->middleware('auth3');

Auth::routes();

Route::resource('/item','ItemController');
Route::get('/itemFam/{id}','ItemController@listFamiliaItem')->name('item.listFam');
Route::post('/regenerar/','ItemController@regenerarPassword')->name('item.regenerar');
//Route::patch('/item/{id}','ItemController@sof_delete')->name('item.soft_del');
Route::resource('/familia','FamiliaController');
Route::resource('/usuario','UsuarioController');
Route::post('usuario/{id}','UsuarioController@altaRegistro')->name('usuario.alta_nv');
Route::post('/login','LoginController@ingresar');
Route::get('/salir','LoginController@salir')->name('salir');

/**
 * Rutas para los privilegios
 */

Route::resource('/privilegio','PrivilegioController');
Route::post('/privilegio/{id_user}/{id_item}/{id_param}','PrivilegioController@asignarPrivilegio')->name('privilegio.asignar_privilegio');

/**
 * Ruta para los historicos
 */
Route::get('/hitem','HistoricoController@listItem')->name('historico.item');
Route::get('/huser','HistoricoController@listUserPri')->name('historico.user');
Route::get('/hitem/{id}','HistoricoController@showItem')->name('historico.showitem');
Route::get('/huser/{id}','HistoricoController@showUserPri')->name('historico.showuserpri');


/**
 * Rutas para la impresion de los reportes
 */
Route::get('/pdfItem/{id}','PDFHistoricoController@imprimirHistoricoItem')->name('pdfItem');
Route::get('/pdfItemPriv/{id}','PDFHistoricoController@imprimirHistoricoUsuarioPrivilegio')->name('pdfItemPriv');



/**
 * Ruta  de prueba para hacer los pdfs
 */
Route::get('generate-pdf/{id}', 'PdfGenerateController@pdfview')->name('generate-pdf');

/**
 * Rutas de prueba para la instalacion
 */
Route::get('/cert',function(){
   return view('instalacion.certificado');
})->name('certificado');
Route::get('/nuevoUsuario',function (){
   return view('instalacion.usuario-registro');
});
Route::get('/iniCPD',function (){
    return view('instalacion.inicio');
});