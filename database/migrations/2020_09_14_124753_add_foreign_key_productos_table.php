<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeyProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('productos', function (Blueprint $table) {
            
            
          
            $table->integer('id_categoria')->unsigned()->nullable();
            $table->foreign('id_categoria')->references('id')->on('categorias')->onDelete('cascade');/* set null */
            $table->integer('id_sucursal')->unsigned()->nullable();
            $table->foreign('id_sucursal')->references('id')->on('users')->onDelete('cascade');
            
          
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
    Schema::table('productos',function(Blueprint $table){
        $table->dropForeign('productos_id_categoria_foreign');
        $table->dropForeign('productos_id_sucursal_foreign');
    });
    }
}
