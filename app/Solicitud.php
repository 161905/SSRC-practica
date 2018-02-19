<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Solicitud extends Model
{
    //
    protected $primaryKey = 'numSol';
    protected $table = 'solicitud';

    protected $fillable = [
    	'aneContrato',
        'idCreador',
        'idSolicitante',
    	'pais',
    	'Nota_Supervisor',
    	'Nota_Dueño_Rec',
    	'Nota_Ejecutor',
    	'Estado',
    	'idSupervisor',
    	'recid',
        'compromisoReserva'
    ];

    public function subrecursos(){
        return $this->belongsToMany('\App\Subrecursos','subrecursos')->withPivot('subrecid','status');

    }

}
