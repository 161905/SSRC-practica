<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TablaSolicitud extends Migration
{
    /**
     * Run the migrations.  
     *
     * @return void
     */
    public function up()
    {
        Schema::create('solicitud', function (Blueprint $table) {
            $table->increments('numSol');

            $table->integer('idCreador')->unsigned();
            $table->foreign('idCreador')->references('id')->on('users');

            $table->integer('idSolicitante')->unsigned();
            $table->foreign('idSolicitante')->references('id')->on('users');

            $table->string('aneContrato')->nullable($value = true);
            $table->string('pais')->nullable($value = true);
            $table->text('Nota_Supervisor')->nullable($value = true);
            $table->text('Nota_Dueño_Rec')->nullable($value = true);
            $table->text('Nota_Ejecutor')->nullable($value = true);
            $table->string('Estado');

            $table->integer('idSupervisor')->unsigned();
            $table->foreign('idSupervisor')->references('id')->on('users');

            $table->integer('recid')->unsigned();
            $table->foreign('recid')->references('recid')->on('recursos');

            
            $table->dateTime('fechaSup')->nullable($value = true);
            $table->dateTime('fechaApr')->nullable($value = true);
            $table->dateTime('fechaEje')->nullable($value = true);
            $table->dateTime('fechaRec')->nullable($value = true);
            $table->string('ticketGSD')->nullable($value = true);

            $table->string('compromisoReserva')->nullable($value = true);

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
        Schema::dropIfExists('solicitud');
    }
}
