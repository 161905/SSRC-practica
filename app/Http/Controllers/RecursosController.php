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
        
        $recurs = DB::table('recursos')->get();
        return view('recursos.index', ['recurs' => $recurs, 'userrs' => $userrs, 'clasi' => $clasi, 'SB_S' => $SB_S, 'SB_R' => $SB_R]);
    /*
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    }
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
