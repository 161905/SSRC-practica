<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('userid');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('rut');
            $table->string('perfil')->nullable($value = true);
            $table->string('tipo')->nullable($value = true);
            $table->string('division')->nullable($value = true);
            $table->text('anexo')->nullable($value = true);
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
