<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Foro extends Model
{
    protected $primaryKey = 'idMensaje';
    protected $table = 'foro';

    protected $fillable = [
    	'id',
        'numSol',
        'mensaje',

    ];
}
