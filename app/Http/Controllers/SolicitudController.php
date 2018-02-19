<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Solicitud;
use App\Recursos;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Validator;
use Illuminate\Support\Facades\Storage;

class SolicitudController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $userrs = DB::table('users')->get();
        $recurs = DB::table('recursos')->get();
        $SolSub = DB::table('solicitud_subrecurso')->get();
        $subrecs = DB::table('subrecursos')->get();
        $solis = DB::table('solicitud')->get();

        $SB_S = DB::table('solicitud')->get();
        $SB_R = DB::table('recursos')->get();


        
        return view('solicitud.index', ['recurs' => $recurs, 'userrs' => $userrs, 'subrecs' => $subrecs, 
        'SolSub' => $SolSub, 'solis' => $solis, 'SB_S' => $SB_S, 'SB_R' => $SB_R]);



    }

    public function indexEnviar()
    {
        //
        $userrs = DB::table('users')->get();
        $recurs = DB::table('recursos')->get();
        $SolSub = DB::table('solicitud_subrecurso')->get();
        $subrecs = DB::table('subrecursos')->get();
        $solis = DB::table('solicitud')->where(
            'Estado','SOLICITUD CREADA NO ENVIADA'
            )->get();
        $solis2 = DB::table('solicitud')->where(
            'Estado','RECHAZADO POR SUPERVISOR'
            )->get();
        $solis3 = DB::table('solicitud')->where(
            'Estado','RECHAZADO POR DUEÑO DE RECURSO'
            )->get();
        $solis4 = DB::table('solicitud')->where(
            'Estado','RECHAZADO POR EJECUTOR')->get();

        $SB_S = DB::table('solicitud')->get();
        $SB_R = DB::table('recursos')->get();

        return view('solicitud.enviar', ['recurs' => $recurs, 'userrs' => $userrs, 'subrecs' => $subrecs, 
        'SolSub' => $SolSub, 'solis' => $solis,'solis2' => $solis2, 'solis3' => $solis3, 'solis4' => $solis4, 'SB_S' => $SB_S, 'SB_R' => $SB_R]);

    }

    public function indexSuper()
    {
        //
        $userrs = DB::table('users')->get();
        $recurs = DB::table('recursos')->get();
        $SolSub = DB::table('solicitud_subrecurso')->get();
        $subrecs = DB::table('subrecursos')->get();
        $solis = DB::table('solicitud')->get();

        $SB_S = DB::table('solicitud')->get();
        $SB_R = DB::table('recursos')->get();
        
        return view('solicitud.supervisor.index', ['recurs' => $recurs, 'userrs' => $userrs, 'subrecs' => $subrecs, 
        'SolSub' => $SolSub, 'solis' => $solis, 'SB_S' => $SB_S, 'SB_R' => $SB_R]);



    }

    public function indexDue()
    {
        //
        $userrs = DB::table('users')->get();
        $userid = Auth::id();
        $recurs = DB::table('recursos')->get();
        $rec = DB::table('recursos')->where('idAprobador',$userid)->get();
        $SolSub = DB::table('solicitud_subrecurso')->get();
        $subrecs = DB::table('subrecursos')->get();
        $solis = DB::table('recursos')
                    ->select('*')
                    ->join('solicitud', 'recursos.recid', '=', 'solicitud.recid')
                    ->where('idAprobador', $userid)
                    ->get();


        $SB_S = DB::table('solicitud')->get();
        $SB_R = DB::table('recursos')->get();
        
        return view('solicitud.dueño.index', ['recurs' => $recurs, 'userrs' => $userrs, 'subrecs' => $subrecs, 
        'SolSub' => $SolSub, 'solis' => $solis, 'rec' => $rec, 'SB_S' => $SB_S, 'SB_R' => $SB_R]);


    }

    public function indexEje()
    {
        //
        $userrs = DB::table('users')->get();
        $userid = Auth::id();
        $recurs = DB::table('recursos')->get();
        $rec = DB::table('recursos')->where('idEjecutor',$userid)->get();
        $SolSub = DB::table('solicitud_subrecurso')->get();
        $subrecs = DB::table('subrecursos')->get();
        $solis = DB::table('recursos')
                    ->select('*')
                    ->join('solicitud', 'recursos.recid', '=', 'solicitud.recid')
                    ->where('idEjecutor', $userid)
                    ->get();

        $SB_S = DB::table('solicitud')->get();
        $SB_R = DB::table('recursos')->get();

        return view('solicitud.ejecutor.index', ['recurs' => $recurs, 'userrs' => $userrs, 'subrecs' => $subrecs, 
        'SolSub' => $SolSub, 'solis' => $solis, 'rec' => $rec, 'SB_S' => $SB_S, 'SB_R' => $SB_R]);


    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    /*******************************************************************/
    /*******************************************************************/
    /*******************************************************************/
    /************************Crear Solicitudes**************************/
    /*******************************************************************/
    /*******************************************************************/
    /*******************************************************************/
    public function create()
    {
        //
        $userrs = DB::table('users')->get()->where('perfil','=','SUPERVISOR');
        $SolSub = DB::table('solicitud_subrecurso')->get();
        $subrecs = DB::table('subrecursos')->get();
        $recurs = DB::table('recursos')->get();
        $clasi = DB::table('clasificacion')->get();

        $SB_S = DB::table('solicitud')->get();
        $SB_R = DB::table('recursos')->get();

        return view('solicitud.create', ['recurs' => $recurs, 'userrs' => $userrs, 'subrecs' => $subrecs, 
        'SolSub' => $SolSub, 'clasi' => $clasi, 'SB_S' => $SB_S, 'SB_R' => $SB_R]);
    }

    public function create2($id)
    {
        //
        $userrs = DB::table('users')->get()->where('perfil','=','SUPERVISOR');
        $recurs = DB::table('recursos')->where('recid','=',$id)->first();
        $SolSub = DB::table('solicitud_subrecurso')->get();
        $subrecs = DB::table('subrecursos')->get();
        $dueño = DB::table('users')->where('id',$recurs->idAprobador)->first();

        $SB_S = DB::table('solicitud')->get();
        $SB_R = DB::table('recursos')->get();

        return view('solicitud.create2', ['recurs' => Recursos::findOrFail($id), 'userrs' => $userrs, 'subrecs' => $subrecs, 'SolSub' => $SolSub, 'dueño' => $dueño, 'SB_S' => $SB_S, 'SB_R' => $SB_R]);

    }

    public function createTerceros()
    {
        //
        $userrs = DB::table('users')->get()->where('perfil','=','SUPERVISOR');
        $userNoCont = DB::table('users')->get()->where('tipo','!=','CONTRATISTA');
        $SolSub = DB::table('solicitud_subrecurso')->get();
        $subrecs = DB::table('subrecursos')->get();
        $recurs = DB::table('recursos')->get();
        $clasi = DB::table('clasificacion')->get();


        $SB_S = DB::table('solicitud')->get();
        $SB_R = DB::table('recursos')->get();
  

        return view('solicitud.createTerceros', ['recurs' => $recurs, 'userrs' => $userrs, 'subrecs' => $subrecs, 
        'SolSub' => $SolSub, 'clasi' => $clasi, 'userNoCont' => $userNoCont,'SB_S' => $SB_S, 'SB_R' => $SB_R]);



    }
        public function createTercerosC()
    {
        //
        $userrs = DB::table('users')->get()->where('perfil','=','SUPERVISOR');
        $userNoCont = DB::table('users')->get()->where('tipo','!=','CONTRATISTA');
        $SolSub = DB::table('solicitud_subrecurso')->get();
        $subrecs = DB::table('subrecursos')->get();
        $recurs = DB::table('recursos')->get();
        $clasi = DB::table('clasificacion')->get();

        $SB_S = DB::table('solicitud')->get();
        $SB_R = DB::table('recursos')->get();

        return view('solicitud.createTercerosC', ['recurs' => $recurs, 'userrs' => $userrs, 'subrecs' => $subrecs, 
        'SolSub' => $SolSub, 'clasi' => $clasi, 'userNoCont' => $userNoCont,'SB_S' => $SB_S, 'SB_R' => $SB_R]);

    }

    public function create2Terceros($id)
    {
        //
        $userrs = DB::table('users')->get()->where('perfil','=','SUPERVISOR');
        $userNoCont = DB::table('users')->get()->where('tipo','!=','CONTRATISTA');
        $recurs = DB::table('recursos')->where('recid','=',$id)->first();
        $SolSub = DB::table('solicitud_subrecurso')->get();
        $subrecs = DB::table('subrecursos')->get();
        $dueño = DB::table('users')->where('id',$recurs->idAprobador)->first();


        $SB_S = DB::table('solicitud')->get();
        $SB_R = DB::table('recursos')->get();

        return view('solicitud.create2Terceros', ['recurs' => Recursos::findOrFail($id), 'userrs' => $userrs, 'subrecs' => $subrecs, 'SolSub' => $SolSub, 'userNoCont' => $userNoCont, 'dueño' => $dueño, 'SB_S' => $SB_S, 'SB_R' => $SB_R]);


    }

    public function create2TercerosC($id)
    {
        //
        $userrs = DB::table('users')->get()->where('perfil','=','SUPERVISOR');
        $userNoCont = DB::table('users')->get()->where('tipo','=','CONTRATISTA');
        $recurs = DB::table('recursos')->where('recid','=',$id)->first();
        $SolSub = DB::table('solicitud_subrecurso')->get();
        $subrecs = DB::table('subrecursos')->get();
        $dueño = DB::table('users')->where('id',$recurs->idAprobador)->first();

        $SB_S = DB::table('solicitud')->get();
        $SB_R = DB::table('recursos')->get();

        return view('solicitud.create2TercerosC', ['recurs' => Recursos::findOrFail($id), 'userrs' => $userrs, 'subrecs' => $subrecs, 'SolSub' => $SolSub, 'userNoCont' => $userNoCont, 'dueño' => $dueño,'SB_S' => $SB_S, 'SB_R' => $SB_R]);


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */ 
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'idSupervisor' => 'required',
        ],
        [
            'idSupervisor.required' => "NO A INGRESADO SUPERVISOR"
        ]
    );
        
        if(Input::get('grabar')){
            $Estado = 'SOLICITUD CREADA NO ENVIADA';
        }
         if(Input::get('enviar')){
            $Estado = 'PENDIENTE DE SUPERVISOR';
         }
        //$compromisoReserva = $request->input('compromisoReserva');
        $idCreador = $request->input('idCreador');
        $idSolicitante = $request->input('idSolicitante');
        $recid = $request->input('recid');
        $idSupervisor = $request->input('idSupervisor');
        $pais = $request->input('pais');
        $aneContrato = $request->input('aneContrato');
//        $Estado = $request->input('Estado');
        $date = date('Y-m-d H:i:s');
        $save = $date;
        DB::table('solicitud')->insert([
            'idCreador' => $idCreador,
            'idSolicitante' => $idSolicitante,
            'idSupervisor' => $idSupervisor,
            'recid' => $recid,
            'pais' => $pais,
            'Estado' => $Estado,
            'created_at' => $save,
            'updated_at' => $save,
            'aneContrato' => $aneContrato,
            'compromisoReserva' =>  $request->file('compromisoReserva')->store('public'),
        ]);
        $numeroSol = DB::table('solicitud')->get()->where('created_at','=',$save);
        $subrecidr = DB::table('subrecursos')->get()->where('recid','=',$recid);

        foreach ($subrecidr as $sub) {
            foreach ($numeroSol as $num) {
                $accion = $request->input("subA-{$sub->subrecid}");
                $tag = $request->input("subV-{$sub->subrecid}");
                DB::table('solicitud_subrecurso')->insert([
                'subrecid' => $sub->subrecid,
                'numSol' => $num->numSol,
                'accion' => $accion,
                'tag' => $tag,
                'status' => 1,
                'created_at' => $save,
                'updated_at' => $save,
                ]);
            }
        }

        DB::table('solicitud_subrecurso')->where('accion','=','NADA')->delete();
        //Solicitud::create($request->all());


        //return $request->all();
        // si quiero ver el paquete json que se envio hacer return $request->all();
        //redireccionar
        //return redirect()->route('solicitud/create');

        $userrs = DB::table('users')->get()->where('perfil','=','SUPERVISOR');
        $SolSub = DB::table('solicitud_subrecurso')->get();
        $subrecs = DB::table('subrecursos')->get();
        $recurs = DB::table('recursos')->get();
        $clasi = DB::table('clasificacion')->get();

        $SB_S = DB::table('solicitud')->get();
        $SB_R = DB::table('recursos')->get();



        $alert = "Solicitud registrada satisfactoriamente";
        return view('solicitud.create', ['recurs' => $recurs, 'userrs' => $userrs, 'subrecs' => $subrecs, 
        'SolSub' => $SolSub, 'clasi' => $clasi, 'Funciono' => 'Solicitud enviada correctamente','SB_S' => $SB_S, 'SB_R' => 
        $SB_R]);
    }

   public function storeTerceros(Request $request)
    {
        $validatedData = $request->validate([
            'idSupervisor' => 'required',
            'idSolicitante' => 'required',
        ],
        [
            'idSupervisor.required' => "NO A INGRESADO SUPERVISOR",
            'idSolicitante.required' => " NO A INGRESADO SOLICITANTE",
        ]
    );
        
        if(Input::get('grabar')){
            $Estado = 'SOLICITUD CREADA NO ENVIADA';
        }
         if(Input::get('enviar')){
            $Estado = 'PENDIENTE DE SUPERVISOR';
         }
        $idCreador = $request->input('idCreador');
        $idSolicitante = $request->input('idSolicitante');
        $recid = $request->input('recid');
        $idSupervisor = $request->input('idSupervisor');
        $pais = $request->input('pais');
        $aneContrato = $request->input('aneContrato');
//        $Estado = $request->input('Estado');
        $date = date('Y-m-d H:i:s');
        $save = $date;
        DB::table('solicitud')->insert([
            'idCreador' => $idCreador,
            'idSolicitante' => $idSolicitante,
            'idSupervisor' => $idSupervisor,
            'recid' => $recid,
            'pais' => $pais,
            'Estado' => $Estado,
            'created_at' => $save,
            'updated_at' => $save,
            'aneContrato' => $aneContrato,
        ]);
        $numeroSol = DB::table('solicitud')->get()->where('created_at','=',$save);
        $subrecidr = DB::table('subrecursos')->get()->where('recid','=',$recid);

        foreach ($subrecidr as $sub) {
            foreach ($numeroSol as $num) {
                $accion = $request->input("subA-{$sub->subrecid}");
                $tag = $request->input("subV-{$sub->subrecid}");
                DB::table('solicitud_subrecurso')->insert([
                'subrecid' => $sub->subrecid,
                'numSol' => $num->numSol,
                'accion' => $accion,
                'tag' => $tag,
                'status' => 1,
                'created_at' => $save,
                'updated_at' => $save,
                ]);
            }
        }

        DB::table('solicitud_subrecurso')->where('accion','=','NADA')->delete();
        //Solicitud::create($request->all());


        //return $request->all();
        // si quiero ver el paquete json que se envio hacer return $request->all();
        //redireccionar
        //return redirect()->route('solicitud/create');

        $userrs = DB::table('users')->get()->where('perfil','=','SUPERVISOR');
        $SolSub = DB::table('solicitud_subrecurso')->get();
        $subrecs = DB::table('subrecursos')->get();
        $recurs = DB::table('recursos')->get();
        $clasi = DB::table('clasificacion')->get();

        $SB_S = DB::table('solicitud')->get();
        $SB_R = DB::table('recursos')->get();


        $alert = "Solicitud registrada satisfactoriamente";
        return view('solicitud.createTerceros', ['recurs' => $recurs, 'userrs' => $userrs, 'subrecs' => $subrecs, 
        'SolSub' => $SolSub, 'clasi' => $clasi, 'Funciono' => 'Solicitud enviada correctamente','SB_S' => $SB_S, 'SB_R' => 
        $SB_R]);
    }

     public function storeTercerosC(Request $request)
    {
        $validatedData = $request->validate([
            'idSupervisor' => 'required',
            'idSolicitante' => 'required',
            'aneContrato' => 'required'
        ],
        [
            'idSupervisor.required' => "NO A INGRESADO SUPERVISOR",
            'idSolicitante.required' => " NO A INGRESADO SOLICITANTE",
            'aneContrato.required' => "NO A INGRESADO NUMERO DE CONTRATO",
        ]
    );
        
        if(Input::get('grabar')){
            $Estado = 'SOLICITUD CREADA NO ENVIADA';
        }
         if(Input::get('enviar')){
            $Estado = 'PENDIENTE DE SUPERVISOR';
         }
        $idCreador = $request->input('idCreador');
        $idSolicitante = $request->input('idSolicitante');
        $recid = $request->input('recid');
        $idSupervisor = $request->input('idSupervisor');
        $pais = $request->input('pais');
        $aneContrato = $request->input('aneContrato');
       
        
//        $Estado = $request->input('Estado');
        $date = date('Y-m-d H:i:s');
        $save = $date;
        DB::table('solicitud')->insert([
            'idCreador' => $idCreador,
            'idSolicitante' => $idSolicitante,
            'idSupervisor' => $idSupervisor,
            'recid' => $recid,
            'pais' => $pais,
            'Estado' => $Estado,
            'created_at' => $save,
            'updated_at' => $save,
            'aneContrato' => $aneContrato,
            'compromisoReserva' =>  $request->file('compromisoReserva')->store('public'),
        ]);
        $numeroSol = DB::table('solicitud')->get()->where('created_at','=',$save);
        $subrecidr = DB::table('subrecursos')->get()->where('recid','=',$recid);

        foreach ($subrecidr as $sub) {
            foreach ($numeroSol as $num) {
                $accion = $request->input("subA-{$sub->subrecid}");
                $tag = $request->input("subV-{$sub->subrecid}");
                DB::table('solicitud_subrecurso')->insert([
                'subrecid' => $sub->subrecid,
                'numSol' => $num->numSol,
                'accion' => $accion,
                'tag' => $tag,
                'status' => 1,
                'created_at' => $save,
                'updated_at' => $save,
                ]);
            }
        }

        DB::table('solicitud_subrecurso')->where('accion','=','NADA')->delete();
        //Solicitud::create($request->all());


        //return $request->all();
        // si quiero ver el paquete json que se envio hacer return $request->all();
        //redireccionar
        //return redirect()->route('solicitud/create');


        $userrs = DB::table('users')->get()->where('perfil','=','SUPERVISOR');
        $SolSub = DB::table('solicitud_subrecurso')->get();
        $subrecs = DB::table('subrecursos')->get();
        $recurs = DB::table('recursos')->get();
        $clasi = DB::table('clasificacion')->get();

        $SB_S = DB::table('solicitud')->get();
        $SB_R = DB::table('recursos')->get();

        $alert = "Solicitud registrada satisfactoriamente";
        return view('solicitud.createTercerosC', ['recurs' => $recurs, 'userrs' => $userrs, 'subrecs' => $subrecs, 
        'SolSub' => $SolSub, 'clasi' => $clasi, 'Funciono' => 'Solicitud enviada correctamente','SB_S' => $SB_S, 'SB_R' => $SB_R]);
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function showEnviar($id)
    {
        $solis = DB::table('solicitud')->where('numSol',$id)->first();
        $userrs = DB::table('users')->get();
        $rec = DB::table('recursos')->where('recid',$solis->recid)->first();
        $SolSub = DB::table('solicitud_subrecurso')->where('numSol',$solis->numSol)->get();
        $subrecs = DB::table('subrecursos')->get();
        $mensajes = DB::table('foro')->where('numSol',$id)->get();

        $SB_S = DB::table('solicitud')->get();
        $SB_R = DB::table('recursos')->get();

        return view('solicitud.enviar2', ['rec' => $rec, 'userrs' => $userrs, 'subrecs' => $subrecs, 'solis' => $solis,'SolSub' => $SolSub, 'mensajes' => $mensajes,'SB_S' => $SB_S, 'SB_R' => $SB_R]);
    }


    public function show0($id)
    {
        $solis = DB::table('solicitud')->where('numSol',$id)->first();
        $userrs = DB::table('users')->get();
        $rec = DB::table('recursos')->where('recid',$solis->recid)->first();
        $SolSub = DB::table('solicitud_subrecurso')->where('numSol',$solis->numSol)->get();
        $subrecs = DB::table('subrecursos')->get();
        $mensajes = DB::table('foro')->where('numSol',$id)->get();
        

        $SB_S = DB::table('solicitud')->get();
        $SB_R = DB::table('recursos')->get();


        return view('solicitud.show', ['rec' => $rec, 'userrs' => $userrs, 'subrecs' => $subrecs, 'solis' => $solis,'SolSub' => $SolSub, 'mensajes' => $mensajes,'SB_S' => $SB_S, 'SB_R' => $SB_R]);
    }


    public function show($id)
    {
        $userrs = DB::table('users')->get();
        $recurs = DB::table('recursos')->get();
        $subrecs = DB::table('subrecursos')->get();
        $SolSub = DB::table('solicitud_subrecurso')->get();
        $solis = DB::table('solicitud')->where('numSol',$id)->first();
        $mensajes = DB::table('foro')->where('numSol',$id)->get();

        $SB_S = DB::table('solicitud')->get();
        $SB_R = DB::table('recursos')->get();

        return view('solicitud.supervisor.edit', ['recurs' => $recurs, 'userrs' => $userrs, 'subrecs' => $subrecs, 'solis' => $solis,'SolSub' => $SolSub,'mensajes' => $mensajes,'SB_S' => $SB_S, 'SB_R' => $SB_R]);
    }

    public function show2($id)
    {
        $userrs = DB::table('users')->get();
        $recurs = DB::table('recursos')->get();
        $subrecs = DB::table('subrecursos')->get();
        $SolSub = DB::table('solicitud_subrecurso')->get();
        $solis = DB::table('solicitud')->where('numSol',$id)->first();
        $mensajes = DB::table('foro')->where('numSol',$id)->get();


        $SB_S = DB::table('solicitud');
        $SB_R = DB::table('recursos');

        return view('solicitud.supervisor.edit2', ['recurs' => $recurs, 'userrs' => $userrs, 'subrecs' => $subrecs, 'solis' => $solis,'SolSub' => $SolSub, 'mensajes' => $mensajes,'SB_S' => $SB_S, 'SB_R' => $SB_R]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function editDue($id)
    {
        $userrs = DB::table('users')->get();
        $recurs = DB::table('recursos')->get();
        $subrecs = DB::table('subrecursos')->get();
        $SolSub = DB::table('solicitud_subrecurso')->get();
        $solis = DB::table('solicitud')->where('numSol',$id)->first();
        $mensajes = DB::table('foro')->where('numSol',$id)->get();


        $SB_S = DB::table('solicitud')->get();
        $SB_R = DB::table('recursos')->get();

        return view('solicitud.dueño.edit', ['recurs' => $recurs, 'userrs' => $userrs, 'subrecs' => $subrecs, 'solis' => $solis,'SolSub' => $SolSub, 'mensajes' => $mensajes,'SB_S' => $SB_S, 'SB_R' => $SB_R]);
    }

    public function edit2Due($id)
    {
        $userrs = DB::table('users')->get();
        $recurs = DB::table('recursos')->get();
        $subrecs = DB::table('subrecursos')->get();
        $SolSub = DB::table('solicitud_subrecurso')->get();
        $solis = DB::table('solicitud')->where('numSol',$id)->first();
        $mensajes = DB::table('foro')->where('numSol',$id)->get();

        $SB_S = DB::table('solicitud')->get();
        $SB_R = DB::table('recursos')->get();

        return view('solicitud.dueño.edit2', ['recurs' => $recurs, 'userrs' => $userrs, 'subrecs' => $subrecs, 'solis' => $solis,'SolSub' => $SolSub, 'mensajes' => $mensajes,'SB_S' => $SB_S, 'SB_R' => $SB_R]);
    }

    public function editEje($id)
    {
        $userrs = DB::table('users')->get();
        $recurs = DB::table('recursos')->get();
        $subrecs = DB::table('subrecursos')->get();
        $SolSub = DB::table('solicitud_subrecurso')->get();
        $solis = DB::table('solicitud')->where('numSol',$id)->first();
        $mensajes = DB::table('foro')->where('numSol',$id)->get();

        $SB_S = DB::table('solicitud')->get();
        $SB_R = DB::table('recursos')->get();

        return view('solicitud.ejecutor.edit', ['recurs' => $recurs, 'userrs' => $userrs, 'subrecs' => $subrecs, 'solis' => $solis,'SolSub' => $SolSub, 'mensajes' => $mensajes,'SB_S' => $SB_S, 'SB_R' => $SB_R]);
    }

    public function edit2Eje($id)
    {
        $userrs = DB::table('users')->get();
        $recurs = DB::table('recursos')->get();
        $subrecs = DB::table('subrecursos')->get();
        $SolSub = DB::table('solicitud_subrecurso')->get();
        $solis = DB::table('solicitud')->where('numSol',$id)->first();
        $mensajes = DB::table('foro')->where('numSol',$id)->get();

        $SB_S = DB::table('solicitud')->get();
        $SB_R = DB::table('recursos')->get();

        return view('solicitud.ejecutor.edit2', ['recurs' => $recurs, 'userrs' => $userrs, 'subrecs' => $subrecs, 'solis' => $solis,'SolSub' => $SolSub, 'mensajes' => $mensajes,'SB_S' => $SB_S, 'SB_R' => $SB_R]);
    }


    public function editar($id)
    {
        
        $userrs = DB::table('users')->get();
        $recurs = DB::table('recursos')->get();
        $subrecs = DB::table('subrecursos')->get();
        $SolSub = DB::table('solicitud_subrecurso')->get();
        $solis = DB::table('solicitud')->where('numSol',$id)->first();
        $mensajes = DB::table('foro')->where('numSol',$id)->get();
        $rec = DB::table('recursos')->where('recid',$solis->recid)->first();
        $SolSubI= DB::table('solicitud_subrecurso')->where('numSol',$solis->numSol)->get();
        $sub = DB::table('subrecursos')->where('recid',$rec->recid)->get();
        $q = DB::table('solicitud_subrecurso')->select('subrecid')->where('numSol',$solis->numSol);

        $TEST = DB::table('subrecursos')->whereNotIn('subrecid',$q)->where('recid',$solis->recid)->get();


        $SB_S = DB::table('solicitud')->get();
        $SB_R = DB::table('recursos')->get();

        return view('solicitud.editar', ['recurs' => $recurs, 'userrs' => $userrs, 'subrecs' => $subrecs, 'solis' => $solis,'SolSub' => $SolSub, 'mensajes' => $mensajes, 'rec' => $rec,'SolSubI' => $SolSubI,'sub' => $sub, 'TEST' => $TEST,'SB_S' => $SB_S, 'SB_R' => $SB_R]);
    }
 
    


    public function editSup($id)
    {
        
        $userrs = DB::table('users')->get();
        $recurs = DB::table('recursos')->get();
        $subrecs = DB::table('subrecursos')->get();
        $SolSub = DB::table('solicitud_subrecurso')->get();
        $solis = DB::table('solicitud')->where('numSol',$id)->first();
        $mensajes = DB::table('foro')->where('numSol',$id)->get();

        $SB_S = DB::table('solicitud')->get();
        $SB_R = DB::table('recursos')->get();


        return view('solicitud.supervisor.edit', ['recurs' => $recurs, 'userrs' => $userrs, 'subrecs' => $subrecs, 'solis' => $solis,'SolSub' => $SolSub, 'mensajes' => $mensajes,'SB_S' => $SB_S, 'SB_R' => $SB_R]);
 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateSup(Request $request, $id)
    {
        $nota = $request->input('Nota_Supervisor'); 
        $date = date('Y-m-d H:i:s');
        $solis = DB::table('solicitud')->where('numSol',$id)->first();
        $idEmisor = $request->input('idEmisor');
        DB::table('foro')->insert([
          'id' => $idEmisor,
          'numSol' => $solis->numSol,
          'mensaje' => $nota,
          'cargo' => 'SUPERVISOR',
          'created_at' => $date
        ]); 
        if(Input::get('rechazar')){

            $mensajes = DB::table('foro')->where('numSol',$id)->get();
            DB::table('solicitud')->where('numSol',$id)->update([
                'fechaRec' => $date,
                'fechaSup' => NULL,
                'Estado' => 'RECHAZADO POR SUPERVISOR',
                'Nota_Supervisor' => $nota,
            ]);
            //return $request->all();   
            $userrs = DB::table('users')->get();
            $recurs = DB::table('recursos')->get();
            $subrecs = DB::table('subrecursos')->get();
            $SolSub = DB::table('solicitud_subrecurso')->get();

            $SB_S = DB::table('solicitud')->get();
            $SB_R = DB::table('recursos')->get();


            return view('solicitud.supervisor.edit2', ['recurs' => $recurs, 'userrs' => $userrs, 'subrecs' => $subrecs, 'solis' => $solis,'SolSub' => $SolSub, 'mensajes' => $mensajes,'SB_S' => $SB_S, 'SB_R' => $SB_R]);
        }
        if(Input::get('aceptar')){
            $mensajes = DB::table('foro')->where('numSol',$id)->get();
            $dueño_existe = DB::table('solicitud')->where('numSol',$id)->first();
            $dueño_existe2 = DB::table('recursos')->where('recid',$dueño_existe->recid)->first();
            if($dueño_existe2->idAprobador == NULL){

                DB::table('solicitud')->where('numSol',$id)->update([
                    'fechaSup' => $date,
                    'fechaRec' => NULL,
                    'Estado' => 'PENDIENTE DE EJECUCION',
                    'Nota_Supervisor' => $nota, 
                ]);
                            //return $request->all();
                $userrs = DB::table('users')->get();
                $recurs = DB::table('recursos')->get();
                $subrecs = DB::table('subrecursos')->get();
                $SolSub = DB::table('solicitud_subrecurso')->get();
                $solis = DB::table('solicitud')->where('numSol',$id)->first();
                /*
                $idEmisor = $request->input('idEmisor');
                DB::table('foro')->insert([
                    'id' => $idEmisor,
                    'numSol' => $solis->numSol,
                    'mensaje' => $nota,
                    'created_at' => $date
                ]); */


                $SB_S = DB::table('solicitud')->get();
                $SB_R = DB::table('recursos')->get();

                return view('solicitud.supervisor.edit2', ['recurs' => $recurs, 'userrs' => $userrs, 'subrecs' => $subrecs, 'solis' => $solis,'SolSub' => $SolSub, 'mensajes' => $mensajes,'SB_S' => $SB_S, 'SB_R' => $SB_R]);
            }
            else{
                DB::table('solicitud')->where('numSol',$id)->update([
                    'fechaSup' => $date,
                    'fechaRec' => NULL,
                    'Estado' => 'PENDIENTE DE APROBACION DE DUEÑO RECURSO',
                    'Nota_Supervisor' => $nota, 
                ]);
                            //return $request->all();
                $mensajes = DB::table('foro')->where('numSol',$id)->get();
                $userrs = DB::table('users')->get();
                $recurs = DB::table('recursos')->get();
                $subrecs = DB::table('subrecursos')->get();
                $SolSub = DB::table('solicitud_subrecurso')->get();

                /*$idEmisor = $request->input('idEmisor');
                DB::table('foro')->insert([
                    'id' => $idEmisor,
                    'numSol' => $solis->numSol,
                    'mensaje' => $nota,
                    'created_at' => $date
                ]);*/ 
                $SB_S = DB::table('solicitud')->get();
                $SB_R = DB::table('recursos')->get();

                return view('solicitud.supervisor.edit2', ['recurs' => $recurs, 'userrs' => $userrs, 'subrecs' => $subrecs, 'solis' => $solis,'SolSub' => $SolSub, 'mensajes' => $mensajes,'SB_S' => $SB_S, 'SB_R' => $SB_R]);

            }


        }

        if(Input::get('actualizar')){
            DB::table('solicitud')->where('numSol',$id)->update([
                'Nota_Supervisor' => $nota, 
            ]);
            //return $request->all();
            /*$userrs = DB::table('users')->get();
            $recurs = DB::table('recursos')->get();
            $subrecs = DB::table('subrecursos')->get();
            $SolSub = DB::table('solicitud_subrecurso')->get();
            $solis = DB::table('solicitud')->where('numSol',$id)->first();
            $idEmisor = $request->input('idEmisor');
            DB::table('foro')->insert([
                'id' => $idEmisor,
                'numSol' => $solis->numSol,
                'mensaje' => $nota,
                'created_at' => $date
            ]); */
            //return view('solicitud.supervisor.edit2', ['recurs' => $recurs, 'userrs' => $userrs, 'subrecs' => $subrecs, 'solis' => $solis,'SolSub' => $SolSub, 'mensajes' => $mensajes]);
            $mensajes = DB::table('foro')->where('numSol',$id)->get();
            $userrs = DB::table('users')->get();
            $recurs = DB::table('recursos')->get();
            $subrecs = DB::table('subrecursos')->get();
            $SolSub = DB::table('solicitud_subrecurso')->get(); 



            $SB_S = DB::table('solicitud')->get();
            $SB_R = DB::table('recursos')->get();
                

            return view('solicitud.supervisor.edit2', ['recurs' => $recurs, 'userrs' => $userrs, 'subrecs' => $subrecs, 'solis' => $solis,'SolSub' => $SolSub, 'mensajes' => $mensajes,'SB_S' => $SB_S, 'SB_R' => $SB_R]);
  
        }



    }

     public function updateDue(Request $request, $id)
    {
        $nota = $request->input('mensaje'); 
        $date = date('Y-m-d H:i:s');
        $solis = DB::table('solicitud')->where('numSol',$id)->first();
        $idEmisor = $request->input('idEmisor');
        DB::table('foro')->insert([
          'id' => $idEmisor,
          'numSol' => $solis->numSol,
          'mensaje' => $nota,
          'cargo' => 'DUEÑO DE RECURSO',
          'created_at' => $date
        ]); 
        if(Input::get('rechazar')){

            $mensajes = DB::table('foro')->where('numSol',$id)->get();
            DB::table('solicitud')->where('numSol',$id)->update([
                'fechaRec' => $date,
                'fechaSup' => NULL,
                'Estado' => 'RECHAZADO POR DUEÑO DE RECURSO',
                'Nota_Dueño_Rec' => $nota,
            ]);
            //return $request->all();   
            $userrs = DB::table('users')->get();
            $recurs = DB::table('recursos')->get();
            $subrecs = DB::table('subrecursos')->get();
            $SolSub = DB::table('solicitud_subrecurso')->get();


            $SB_S = DB::table('solicitud')->get();
            $SB_R = DB::table('recursos')->get();

            return view('solicitud.dueño.edit2', ['recurs' => $recurs, 'userrs' => $userrs, 'subrecs' => $subrecs, 'solis' => $solis,'SolSub' => $SolSub, 'mensajes' => $mensajes,'SB_S' => $SB_S, 'SB_R' => $SB_R]);
        }
        if(Input::get('aceptar')){
            $mensajes = DB::table('foro')->where('numSol',$id)->get();
            $dueño_existe = DB::table('solicitud')->where('numSol',$id)->first();
            $dueño_existe2 = DB::table('recursos')->where('recid',$dueño_existe->recid)->first();
            

                DB::table('solicitud')->where('numSol',$id)->update([
                    'fechaSup' => $date,
                    'fechaRec' => NULL,
                    'Estado' => 'PENDIENTE DE EJECUCION',
                    'Nota_Dueño_Rec' => $nota, 
                ]);
                            //return $request->all();
                $userrs = DB::table('users')->get();
                $recurs = DB::table('recursos')->get();
                $subrecs = DB::table('subrecursos')->get();
                $SolSub = DB::table('solicitud_subrecurso')->get();
                $solis = DB::table('solicitud')->where('numSol',$id)->first();
                /*
                $idEmisor = $request->input('idEmisor');
                DB::table('foro')->insert([
                    'id' => $idEmisor,
                    'numSol' => $solis->numSol,
                    'mensaje' => $nota,
                    'created_at' => $date
                ]); */

                $SB_S = DB::table('solicitud')->get();
                $SB_R = DB::table('recursos')->get();
                
                return view('solicitud.dueño.edit2', ['recurs' => $recurs, 'userrs' => $userrs, 'subrecs' => $subrecs, 'solis' => $solis,'SolSub' => $SolSub, 'mensajes' => $mensajes,'SB_S' => $SB_S, 'SB_R' => $SB_R]);
            
        


        }

        if(Input::get('actualizar')){
            DB::table('solicitud')->where('numSol',$id)->update([
                'Nota_Dueño_Rec' => $nota, 
            ]);
            //return $request->all();
            /*$userrs = DB::table('users')->get();
            $recurs = DB::table('recursos')->get();
            $subrecs = DB::table('subrecursos')->get();
            $SolSub = DB::table('solicitud_subrecurso')->get();
            $solis = DB::table('solicitud')->where('numSol',$id)->first();
            $idEmisor = $request->input('idEmisor');
            DB::table('foro')->insert([
                'id' => $idEmisor,
                'numSol' => $solis->numSol,
                'mensaje' => $nota,
                'created_at' => $date
            ]); */
            //return view('solicitud.supervisor.edit2', ['recurs' => $recurs, 'userrs' => $userrs, 'subrecs' => $subrecs, 'solis' => $solis,'SolSub' => $SolSub, 'mensajes' => $mensajes]);
            $mensajes = DB::table('foro')->where('numSol',$id)->get();
            $userrs = DB::table('users')->get();
            $recurs = DB::table('recursos')->get();
            $subrecs = DB::table('subrecursos')->get();
            $SolSub = DB::table('solicitud_subrecurso')->get(); 


            $SB_S = DB::table('solicitud')->get();
            $SB_R = DB::table('recursos')->get();

            return view('solicitud.dueño.edit2', ['recurs' => $recurs, 'userrs' => $userrs, 'subrecs' => $subrecs, 'solis' => $solis,'SolSub' => $SolSub, 'mensajes' => $mensajes,'SB_S' => $SB_S, 'SB_R' => $SB_R]);    
        }



    }


    public function updateEje(Request $request, $id)
    {
        $nota = $request->input('Nota_Ejecutor'); 
        $date = date('Y-m-d H:i:s');
        $solis = DB::table('solicitud')->where('numSol',$id)->first();
        $idEmisor = $request->input('idEmisor');
        $ticketGSD = $request->input('ticketGSD');  
        DB::table('foro')->insert([
          'id' => $idEmisor,
          'numSol' => $solis->numSol,
          'mensaje' => $nota,
          'cargo' => 'EJECUTOR',
          'created_at' => $date
        ]); 
        if(Input::get('rechazar')){

            $mensajes = DB::table('foro')->where('numSol',$id)->get();
            DB::table('solicitud')->where('numSol',$id)->update([
                'fechaRec' => $date,
                'fechaSup' => NULL,
                'Estado' => 'RECHAZADO POR EJECUTOR',
                'Nota_Ejecutor' => $nota,

            ]);
            //return $request->all();   
            $userrs = DB::table('users')->get();
            $recurs = DB::table('recursos')->get();
            $subrecs = DB::table('subrecursos')->get();
            $SolSub = DB::table('solicitud_subrecurso')->get();


            $SB_S = DB::table('solicitud')->get();
            $SB_R = DB::table('recursos')->get();

            return view('solicitud.ejecutor.edit2', ['recurs' => $recurs, 'userrs' => $userrs, 'subrecs' => $subrecs, 'solis' => $solis,'SolSub' => $SolSub, 'mensajes' => $mensajes,'SB_S' => $SB_S, 'SB_R' => $SB_R]);
        }
        if(Input::get('aceptar')){
            $mensajes = DB::table('foro')->where('numSol',$id)->get();
            $dueño_existe = DB::table('solicitud')->where('numSol',$id)->first();
            $dueño_existe2 = DB::table('recursos')->where('recid',$dueño_existe->recid)->first();
            

                DB::table('solicitud')->where('numSol',$id)->update([
                    'fechaSup' => $date,
                    'fechaRec' => NULL,
                    'Estado' => 'EJECUTADA',
                    'Nota_Ejecutor' => $nota, 
                    'ticketGSD' => $ticketGSD,
                ]);
                            //return $request->all();
                $userrs = DB::table('users')->get();
                $recurs = DB::table('recursos')->get();
                $subrecs = DB::table('subrecursos')->get();
                $SolSub = DB::table('solicitud_subrecurso')->get();
                $solis = DB::table('solicitud')->where('numSol',$id)->first();
                /*
                $idEmisor = $request->input('idEmisor');
                DB::table('foro')->insert([
                    'id' => $idEmisor,
                    'numSol' => $solis->numSol,
                    'mensaje' => $nota,
                    'created_at' => $date
                ]); */

                $SB_S = DB::table('solicitud')->get();
                $SB_R = DB::table('recursos')->get();

                return view('solicitud.ejecutor.edit2', ['recurs' => $recurs, 'userrs' => $userrs, 'subrecs' => $subrecs, 'solis' => $solis,'SolSub' => $SolSub, 'mensajes' => $mensajes,'SB_S' => $SB_S, 'SB_R' => $SB_R]);
        }

        if(Input::get('actualizar')){
            DB::table('solicitud')->where('numSol',$id)->update([
                'Nota_Ejecutor' => $nota, 
            ]);
            //return $request->all();
            /*$userrs = DB::table('users')->get();
            $recurs = DB::table('recursos')->get();
            $subrecs = DB::table('subrecursos')->get();
            $SolSub = DB::table('solicitud_subrecurso')->get();
            $solis = DB::table('solicitud')->where('numSol',$id)->first();
            $idEmisor = $request->input('idEmisor');
            DB::table('foro')->insert([
                'id' => $idEmisor,
                'numSol' => $solis->numSol,
                'mensaje' => $nota,
                'created_at' => $date
            ]); */
            //return view('solicitud.supervisor.edit2', ['recurs' => $recurs, 'userrs' => $userrs, 'subrecs' => $subrecs, 'solis' => $solis,'SolSub' => $SolSub, 'mensajes' => $mensajes]);
            $mensajes = DB::table('foro')->where('numSol',$id)->get();
            $userrs = DB::table('users')->get();
            $recurs = DB::table('recursos')->get();
            $subrecs = DB::table('subrecursos')->get();
            $SolSub = DB::table('solicitud_subrecurso')->get(); 


            $SB_S = DB::table('solicitud')->get();
            $SB_R = DB::table('recursos')->get();

            return view('solicitud.ejecutor.edit2', ['recurs' => $recurs, 'userrs' => $userrs, 'subrecs' => $subrecs, 'solis' => $solis,'SolSub' => $SolSub, 'mensajes' => $mensajes,'SB_S' => $SB_S, 'SB_R' => $SB_R]);    
        }



    }


public function enviarUpdate(Request $request, $id)
    {
        DB::table('solicitud')->where('numSol','=',$id)->update([
            'Estado' => 'PENDIENTE DE SUPERVISOR'

        ]);

        $userrs = DB::table('users')->get();
        $recurs = DB::table('recursos')->get();
        $SolSub = DB::table('solicitud_subrecurso')->get();
        $subrecs = DB::table('subrecursos')->get();
        $solis = DB::table('solicitud')->where(
            'Estado','SOLICITUD CREADA NO ENVIADA'
            )->get();
        $solis2 = DB::table('solicitud')->where(
            'Estado','RECHAZADO POR SUPERVISOR'
            )->get();
        $solis3 = DB::table('solicitud')->where(
            'Estado','RECHAZADO POR DUEÑO DE RECURSO'
            )->get();
        $solis4 = DB::table('solicitud')->where(
            'Estado','RECHAZADO POR EJECUTOR')->get();

        $SB_S = DB::table('solicitud')->get();
        $SB_R = DB::table('recursos')->get();

        return view('solicitud.enviar', ['recurs' => $recurs, 'userrs' => $userrs, 'subrecs' => $subrecs, 
        'SolSub' => $SolSub, 'solis' => $solis,'solis2' => $solis2, 'solis3' => $solis3, 'solis4' => $solis4,'Funciono' => 'Solicitud enviada correctamente','SB_S' => $SB_S, 'SB_R' => $SB_R]); 


    }


public function editarUpdate(Request $request, $id)
    {   
        if(Input::get('anexo')){
            $aneContrato = $request->input('aneContrato');

            DB::table('solicitud')->update([
                'aneContrato' => $aneContrato,

            ]);

            $userrs = DB::table('users')->get();
            $recurs = DB::table('recursos')->get();
            $subrecs = DB::table('subrecursos')->get();
            $SolSub = DB::table('solicitud_subrecurso')->get();
            $solis = DB::table('solicitud')->where('numSol',$id)->first();
            $mensajes = DB::table('foro')->where('numSol',$id)->get();
            $rec = DB::table('recursos')->where('recid',$solis->recid)->first();
            $SolSubI= DB::table('solicitud_subrecurso')->where('numSol',$solis->numSol)->get();
            $sub = DB::table('subrecursos')->where('recid',$rec->recid)->get();
            $q = DB::table('solicitud_subrecurso')->select('subrecid')->where('numSol',$solis->numSol);

            $TEST = DB::table('subrecursos')->whereNotIn('subrecid',$q)->where('recid',$solis->recid)->get();
            DB::table('solicitud_subrecurso')->where('accion','=','No Seleccionar')->delete();

            //sreturn $request->all();
            

            $SB_S = DB::table('solicitud')->get();
            $SB_R = DB::table('recursos')->get();

            return view('solicitud.editar', ['recurs' => $recurs, 'userrs' => $userrs, 'subrecs' => $subrecs, 'solis' => $solis,'SolSub' => $SolSub, 'mensajes' => $mensajes, 'rec' => $rec,'SolSubI' => $SolSubI,'sub' => $sub, 'TEST' => $TEST,'SB_S' => $SB_S, 'SB_R' => $SB_R]); 
        }


        if(Input::get('compromiso')){


            DB::table('solicitud')->update([
                'compromisoReserva' =>  $request->file('compromisoReserva')->store('public'),

            ]);

            $userrs = DB::table('users')->get();
            $recurs = DB::table('recursos')->get();
            $subrecs = DB::table('subrecursos')->get();
            $SolSub = DB::table('solicitud_subrecurso')->get();
            $solis = DB::table('solicitud')->where('numSol',$id)->first();
            $mensajes = DB::table('foro')->where('numSol',$id)->get();
            $rec = DB::table('recursos')->where('recid',$solis->recid)->first();
            $SolSubI= DB::table('solicitud_subrecurso')->where('numSol',$solis->numSol)->get();
            $sub = DB::table('subrecursos')->where('recid',$rec->recid)->get();
            $q = DB::table('solicitud_subrecurso')->select('subrecid')->where('numSol',$solis->numSol);

            $TEST = DB::table('subrecursos')->whereNotIn('subrecid',$q)->where('recid',$solis->recid)->get();
            DB::table('solicitud_subrecurso')->where('accion','=','No Seleccionar')->delete();

            //sreturn $request->all();
            

            $SB_S = DB::table('solicitud')->get();
            $SB_R = DB::table('recursos')->get();

            return view('solicitud.editar', ['recurs' => $recurs, 'userrs' => $userrs, 'subrecs' => $subrecs, 'solis' => $solis,'SolSub' => $SolSub, 'mensajes' => $mensajes, 'rec' => $rec,'SolSubI' => $SolSubI,'sub' => $sub, 'TEST' => $TEST,'SB_S' => $SB_S, 'SB_R' => $SB_R]); 
        }


        if(Input::get('actualizar')){
            $subrecid = $request->input('subrecid');
            $tag = $request->input('tag');
            $accion = $request->input('accion');


            DB::table('solicitud_subrecurso')->where('numSol','=',$id)->where('subrecid','=',$subrecid)->update([
                'accion' => $accion,
                'tag' => $tag

            ]);

            $userrs = DB::table('users')->get();
            $recurs = DB::table('recursos')->get();
            $subrecs = DB::table('subrecursos')->get();
            $SolSub = DB::table('solicitud_subrecurso')->get();
            $solis = DB::table('solicitud')->where('numSol',$id)->first();
            $mensajes = DB::table('foro')->where('numSol',$id)->get();
            $rec = DB::table('recursos')->where('recid',$solis->recid)->first();
            $SolSubI= DB::table('solicitud_subrecurso')->where('numSol',$solis->numSol)->get();
            $sub = DB::table('subrecursos')->where('recid',$rec->recid)->get();
            $q = DB::table('solicitud_subrecurso')->select('subrecid')->where('numSol',$solis->numSol);

            $TEST = DB::table('subrecursos')->whereNotIn('subrecid',$q)->where('recid',$solis->recid)->get();
            DB::table('solicitud_subrecurso')->where('accion','=','No Seleccionar')->delete();

            //sreturn $request->all();
            $SB_S = DB::table('solicitud')->get();
            $SB_R = DB::table('recursos')->get();
            
            return view('solicitud.editar', ['recurs' => $recurs, 'userrs' => $userrs, 'subrecs' => $subrecs, 'solis' => $solis,'SolSub' => $SolSub, 'mensajes' => $mensajes, 'rec' => $rec,'SolSubI' => $SolSubI,'sub' => $sub, 'TEST' => $TEST,'SB_S' => $SB_S, 'SB_R' => $SB_R]); 
        }
        if(Input::get('crear')){
            $subrecid = $request->input('subrecid');
            $tag = $request->input('tag');
            $accion = $request->input('accion');


            DB::table('solicitud_subrecurso')->insert([
                'subrecid' => $subrecid,
                'numSol' => $id,
                'accion' => $accion,
                'tag' => $tag,
                'status' => 1

            ]);

            DB::table('solicitud_subrecurso')->where('accion','=','No Seleccionar')->delete();

            $userrs = DB::table('users')->get();
            $recurs = DB::table('recursos')->get();
            $subrecs = DB::table('subrecursos')->get();
            $SolSub = DB::table('solicitud_subrecurso')->get();
            $solis = DB::table('solicitud')->where('numSol',$id)->first();
            $mensajes = DB::table('foro')->where('numSol',$id)->get();
            $rec = DB::table('recursos')->where('recid',$solis->recid)->first();
            $SolSubI= DB::table('solicitud_subrecurso')->where('numSol',$solis->numSol)->get();
            $sub = DB::table('subrecursos')->where('recid',$rec->recid)->get();
            $q = DB::table('solicitud_subrecurso')->select('subrecid')->where('numSol',$solis->numSol);

            $TEST = DB::table('subrecursos')->whereNotIn('subrecid',$q)->where('recid',$solis->recid)->get();

            //return $request->all();
        
            $SB_S = DB::table('solicitud')->get();
            $SB_R = DB::table('recursos')->get();
            


            return view('solicitud.editar', ['recurs' => $recurs, 'userrs' => $userrs, 'subrecs' => $subrecs, 'solis' => $solis,'SolSub' => $SolSub, 'mensajes' => $mensajes, 'rec' => $rec,'SolSubI' => $SolSubI,'sub' => $sub, 'TEST' => $TEST,'SB_S' => $SB_S, 'SB_R' => $SB_R]); 
        }



    }

    public function descargarCompromiso()
    {
        //PDF file is stored under project/public/download/info.pdf
        //$file=  "\laravel-with-admin-lte\storage\app\public\compromisoReserva.pdf";
        $file = Storage::get('compromisoReserva.pdf');
        $headers = array(
                  'Content-Type: application/pdf',
                );

        return response()->download($file, 'compromisoReserva.pdf', $headers);
    }

    public function destroy($id)
    {
        //
    }
}
