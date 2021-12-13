<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeyPedidosTable extends Migration
{
    public function up()
    {
        Schema::table('pedidos', function (Blueprint $table) {
            
            
          
           
            $table->integer('id_sucursal')->unsigned()->nullable();
            $table->foreign('id_sucursal')->references('id')->on('users')->onDelete('cascade'); /* set null */
            
          
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pedidos',function(Blueprint $table){
           
            $table->dropForeign('pedidos_id_sucursal_foreign');
        });
    }
}
