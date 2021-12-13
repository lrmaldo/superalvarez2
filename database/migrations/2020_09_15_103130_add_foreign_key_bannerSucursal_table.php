<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeyBannerSucursalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('banner_sucursals', function (Blueprint $table) {
            
            
          
           
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
        Schema::table('banner_sucursals',function(Blueprint $table){
           
            $table->dropForeign('banner_sucursals_id_sucursal_foreign');
        });
    }
}
