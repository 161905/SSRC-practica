<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subrecursos extends Model
{
    protected $primaryKey = 'subrecid';
    protected $table = 'subrecursos';

    protected $fillable = [
    	'nombre',
        'recid',
        'idDueño',
    	'pais',
    	'recurso_ellipse',
    	'nota',
    	'grupo_nt',
    	'tabla_aso',
    	'activo',
    	'req_nota',
    	'tag_nota',
    ];

    public function solicitud(){
        return $this->belongsToMany('\App\Solicitud','solicitud')->withPivot('numSol','status');

    }

}