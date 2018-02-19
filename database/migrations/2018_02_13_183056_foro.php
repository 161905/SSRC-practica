<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Foro extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('foro', function (Blueprint $table) {
            $table->increments('idMensaje');
            $table->integer('id')->unsigned();//->unsigned();
            $table->foreign('id')->references('id')->on('users');
            $table->integer('numSol')->unsigned();//->unsigned();
            $table->foreign('numSol')->references('numSol')->on('solicitud');
            $table->text('mensaje')->nullable($value = true);
            $table->string('cargo')->nullable($value = true);
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
        Schema::drop('foro');
    }
}
