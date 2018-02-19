<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recursos extends Model
{
    //
    protected $primaryKey = 'recid';
    protected $table = 'recursos';

    protected $fillable = [
    	'nombre',
        'idAprobador',
        'idEjecutor',
    	'idClasifica',
    	'pais',
    	'nota',
    	'tipo_r',
    	'grupo_nt',
    	'mail_gsd',
    	'cod_gsd',
    ];
}
