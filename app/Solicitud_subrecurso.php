<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Solicitud_subrecurso extends Model
{
    protected $primaryKey = 'id';
    protected $table = 'solicitud_subrecurso';
    protected $fillable = [
    	'subrecid',
    	'numSol'
    ];
}
