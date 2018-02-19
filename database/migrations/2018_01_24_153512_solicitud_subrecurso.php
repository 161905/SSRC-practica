<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SolicitudSubrecurso extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('solicitud_subrecurso', function (Blueprint $table) {
            $table->increments('id');
            $table->boolean('status');
            $table->integer('subrecid')->unsigned();//->unsigned();
            $table->integer('numSol')->unsigned();//->unsigned();
            $table->foreign('subrecid')->references('subrecid')->on('subrecursos');
            $table->foreign('numSol')->references('numSol')->on('solicitud');
            $table->string('Estado')->nullable($value = true);
            $table->string('accion')->nullable($value = true);
            $table->string('tag')->nullable($value = true);
            $table->dateTime('fechaApr')->nullable($value = true);
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
        Schema::dropIfExists('solicitud_subrecurso');
    }
}
