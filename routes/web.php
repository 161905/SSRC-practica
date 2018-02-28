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
    return view('welcome');
});




Route::group(['middleware' => 'auth'], function () {
    //    Route::get('/link1', function ()    {
//        // Uses Auth Middleware
//    });
	Route::get('/home2',function(){
		return view('home2');

	});
    //Please do not remove this if you want adminlte:route and adminlte:link commands to works correctly.
    #adminlte_routes



    //RECURSOS, SUBRECURSOS Y USUARIOS VISTAS
    Route::get('recursos/index',['as'=>'recursos.index','uses'=>'RecursosController@index']);
    Route::get('recursos/show/{recid}',['as'=>'recursos.show','uses'=>'RecursosController@show']);
    Route::post('recursos/index',['as'=>'recursos.store','uses'=>'RecursosController@store']);

    Route::get('subrecursos/index',['as'=>'subrecursos.index','uses'=>'SubrecursosController@index']);
    Route::get('subrecursos/show/{recid}',['as'=>'subrecursos.show','uses'=>'SubrecursosController@show']);

    Route::get('usuario/index',['as'=>'usuario.index','uses'=>'UsuarioController@index']);
    Route::get('usuario/show/',['as'=>'usuario.show','uses'=>'UsuarioController@show']);


    //RUTAS ENVIO SOLICITUDES Y SOLICITUDES EN GENERAL
    Route::get('solicitud/index',['as'=>'solicitud.index','uses'=>'SolicitudController@index']);
    Route::get('solicitud/show/{id}',['as'=>'solicitud.show','uses'=>'SolicitudController@show0']);
  

    Route::get('solicitud/enviar',['as'=>'solicitud.enviar','uses'=>'SolicitudController@indexEnviar']);
    Route::get('solicitud/enviar2/{id}',['as'=>'solicitud.enviar2','uses'=>'SolicitudController@showEnviar']);
    Route::put('solicitud/enviar2/{id}',['as'=>'solicitud.enviar2.update','uses'=>'SolicitudController@enviarUpdate']);

    Route::get('solicitud/solicitudescreadas',['as'=>'solicitud.solicitudescreadas','uses'=>'SolicitudController@indexSC']);
    Route::get('solicitud/sc2/{id}',['as'=>'solicitud.sc2','uses'=>'SolicitudController@showSC']);
    Route::put('solicitud/sc2/{id}',['as'=>'solicitud.sc2.update','uses'=>'SolicitudController@updateSC']);

    Route::get('solicitud/solicitudessolicitadas',['as'=>'solicitud.solicitudessolicitadas','uses'=>'SolicitudController@indexSS']);
    Route::get('solicitud/ss2/{id}',['as'=>'solicitud.ss2','uses'=>'SolicitudController@showSS']);
    Route::put('solicitud/ss2/{id}',['as'=>'solicitud.ss2.update','uses'=>'SolicitudController@updateSS']);



    Route::get('solicitud/create',['as'=>'solicitud.create','uses'=>'SolicitudController@create']);
    Route::post('solicitud/create',['as'=>'solicitud.store','uses'=>'SolicitudController@store']);
    Route::get('solicitud/create2/{recid}',['as'=>'solicitud.create2','uses'=>'SolicitudController@create2']);
    //Route::post('solicitud/create2/{recid}',['as'=>'solicitud.store','uses'=>'SolicitudController@store2']);

    Route::get('solicitud/createTerceros',['as'=>'solicitud.createTerceros','uses'=>'SolicitudController@createTerceros']);
    Route::post('solicitud/createTerceros',['as'=>'solicitud.storeTerceros','uses'=>'SolicitudController@storeTerceros']);
    Route::get('solicitud/create2Terceros/{recid}',['as'=>'solicitud.create2Terceros','uses'=>'SolicitudController@create2Terceros']);
    Route::get('/compromiso', ['as'=>'/compromiso', 'uses' => 'SolicitudController@descargarCompromiso']);


    Route::get('solicitud/createTercerosC',['as'=>'solicitud.createTercerosC','uses'=>'SolicitudController@createTercerosC']);
    Route::post('solicitud/createTercerosC',['as'=>'solicitud.storeTercerosC','uses'=>'SolicitudController@storeTercerosC']);
    Route::get('solicitud/create2TercerosC/{recid}',['as'=>'solicitud.create2TercerosC','uses'=>'SolicitudController@create2TercerosC']);

    Route::get('solicitud/editar/{id}',['as'=>'solicitud.editar','uses'=>'SolicitudController@editar']);
    Route::put('solicitud/editar/{id}',['as'=>'solicitud.editar.update','uses'=>'SolicitudController@editarUpdate']);


    Route::get('solicitud/reportabilidad',['as'=>'solicitud.reportabilidad','uses'=>'SolicitudController@indexReportabilidad']);

   

    //Rutas solicitud supervisor
    Route::get('solicitud/supervisor/index',['as'=>'solicitud.supervisor.index','uses'=>'SolicitudController@indexSuper']);
    Route::get('solicitud/supervisor/edit/{id}',['as'=>'solicitud.supervisor.edit','uses'=>'SolicitudController@show']);
    Route::get('solicitud/supervisor/edit2/{id}',['as'=>'solicitud.supervisor.edit2','uses'=>'SolicitudController@show2']);
    Route::put('solicitud/supervisor/edit/{id}',['as'=>'solicitud.supervisor.update','uses'=>'SolicitudController@updateSup']);

    //Rutas solicitud dueño recurso
    Route::get('solicitud/dueño/index',['as'=>'solicitud.dueño.index','uses'=>'SolicitudController@indexDue']);
    Route::get('solicitud/dueño/edit/{id}',['as'=>'solicitud.dueño.edit','uses'=>'SolicitudController@editDue']);
    Route::get('solicitud/dueño/edit2/{id}',['as'=>'solicitud.dueño.edit2','uses'=>'SolicitudController@edit2Due']);
    Route::put('solicitud/dueño/edit/{id}',['as'=>'solicitud.dueño.update','uses'=>'SolicitudController@updateDue']);
  
    //Rutas solicitud ejecutor
    Route::get('solicitud/ejecutor/index',['as'=>'solicitud.ejecutor.index','uses'=>'SolicitudController@indexEje']);
    Route::get('solicitud/ejecutor/edit/{id}',['as'=>'solicitud.ejecutor.edit','uses'=>'SolicitudController@editEje']);
    Route::get('solicitud/ejecutor/edit2/{id}',['as'=>'solicitud.ejecutor.edit2','uses'=>'SolicitudController@edit2Eje']);
    Route::put('solicitud/ejecutor/edit/{id}',['as'=>'solicitud.ejecutor.update','uses'=>'SolicitudController@updateEje']);

    Route::get('test', function ()    {
        $data = [];
        return view('test',$data);
    })->name('test');

});
