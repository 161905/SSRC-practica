<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TablaSubrecursos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subrecursos', function (Blueprint $table) {
            $table->increments('subrecid');
            $table->string('nombre');
            /*Referencia a users para hallar el dueño*/
            $table->integer('idDueño')->nullable($value = true)->unsigned();
            $table->foreign('idDueño')->references('id')->on('users');
            /*Referencia a recursos*/
            $table->integer('recid')->unsigned();
            $table->foreign('recid')->references('recid')->on('recursos');
            
            $table->string('pais');
            $table->boolean('recurso_ellipse');
            $table->text('nota')->nullable($value = true);
            $table->string('grupo_nt')->nullable($value = true);
            $table->string('tabla_aso');
            $table->boolean('activo');
            $table->boolean('req_accion');
            $table->boolean('req_nota');
            $table->string('tag_nota')->nullable($value = true);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subrecursos');
    }
}
