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
            $table->string('activo')->default('1');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->text('descripcion')->nullable();
            $table->text('url_imagen')->nullable();
            $table->integer('id_telegram')->nullable();
            $table->text('direccion')->nullable();
            $table->string('telefono')->nullable();
            $table->string('whatsapp')->nullable();
            $table->string('lat')->nullable();
            $table->string('lon')->nullable();
           
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
