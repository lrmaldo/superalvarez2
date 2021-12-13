<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('activo')->nullable()->default('0');
            $table->text('titulo')->nullable();
            $table->float('precio',8,2)->nullable();
            $table->text('url_imagen')->nullable();
            $table->text('descripcion')->nullable();
            /* $table->integer('id_categoria')->nullable();
            $table->integer('id_sucursal')->nullable(); */
            
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
        Schema::dropIfExists('productos');
    }
}
