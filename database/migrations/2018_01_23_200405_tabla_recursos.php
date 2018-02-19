<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TablaRecursos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recursos', function (Blueprint $table) {
            $table->increments('recid');
            $table->string('nombre');
            $table->integer('idAprobador')->nullable($value = true)->unsigned();
            $table->foreign('idAprobador')->references('id')->on('users');
            $table->integer('idEjecutor')->nullable($value = true)->unsigned();
            $table->foreign('idEjecutor')->references('id')->on('users');
            $table->integer('idClasifica')->nullable($value = true)->unsigned();//->unsigned();
            $table->foreign('idClasifica')->references('idClasifica')->on('clasificacion');
            $table->string('pais');
            $table->text('nota')->nullable($value = true);
            $table->string('tipo_r');
            $table->string('grupo_nt')->nullable($value = true);
            $table->boolean('mail_gsd')->nullable($value = true);
            $table->string('cod_gsd')->nullable($value = true);


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
        Schema::dropIfExists('recursos');
    }
}
