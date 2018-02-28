<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class RecursosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $SB_S = DB::table('solicitud')->get();
        $SB_R = DB::table('recursos')->get();

        $userrs = DB::table('users')->get();
        $clasi = DB::table('clasificacion')->get();

        $subrecs = DB::table('subrecursos')->get();
        
        $recurs = DB::table('recursos')->get();
        return view('recursos.index', ['recurs' => $recurs, 'userrs' => $userrs, 'clasi' => $clasi, 'SB_S' => $SB_S, 'SB_R' => $SB_R, 'subrecs' => $subrecs]);
    /*
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    }
    public function create()
    {
        $SB_S = DB::table('solicitud')->get();
        $SB_R = DB::table('recursos')->get();

        $userrs = DB::table('users')->get();
        $clasi = DB::table('clasificacion')->get();

        $subrecs = DB::table('subrecursos')->get();
        
        $recurs = DB::table('recursos')->get();
        return view('recursos.index', ['recurs' => $recurs, 'userrs' => $userrs, 'clasi' => $clasi, 'SB_S' => $SB_S, 'SB_R' => $SB_R, 'subrecs' => $subrecs]);
    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $nombre = $request->input('nombre');
        $idAprobador = $request->input('idAprobador');
        $idEjecutor = $request->input('idEjecutor');
        $idClasifica = $request->input('idClasifica');
        $pais = $request->input('pais');
        $nota = $request->input('nota');
        $tipo_r = $request->input('tipo_r');
        $grupo_nt = $request->input('grupo_nt');
        $mail_gsd = $request->input('mail_gsd');
        $cod_gsd = $request->input('cod_gsd');


        DB::table('recursos')->insert([
                'nombre' => $nombre,
                'idAprobador' => $idAprobador,
                'idEjecutor' => $idEjecutor,
                'idClasifica' => $idClasifica,
                'pais' => $pais,
                'nota' => $nota,
                'tipo_r' => $tipo_r,
                'grupo_nt' => $grupo_nt,
                'mail_gsd' => $mail_gsd,
                'cod_gsd' => $cod_gsd,
            ]);
        



        $SB_S = DB::table('solicitud')->get();
        $SB_R = DB::table('recursos')->get();
        $userrs = DB::table('users')->get();
        $clasi = DB::table('clasificacion')->get();
        $subrecs = DB::table('subrecursos')->get();
        $recurs = DB::table('recursos')->get();
        return $request->all();
        return view('recursos.index', ['recurs' => $recurs, 'userrs' => $userrs, 'clasi' => $clasi, 'SB_S' => $SB_S, 'SB_R' => $SB_R, 'subrecs' => $subrecs]);
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
        $SB_S = DB::table('solicitud')->get();
        $SB_R = DB::table('recursos')->get();
        $recurs = DB::table('recursos')->where('recid',$id)->first();
        return view('recursos.show',['recurs' => $recurs, 'SB_S' => $SB_S, 'SB_R' => $SB_R]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
}
