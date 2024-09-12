<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
     if(!Schema::enableForeignKeyConstraints()){
          Schema::table('waiter_call', function (Blueprint $table) {
               $table->integer('table_no')->change();
               $table->foreign('table_no')->references('id')->on('tables');
           });
     }
       
    }
    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('waiter_call', function (Blueprint $table) {
          Schema::dropIfExists('table_no');
          //   $table->dropForeign('table_no');
        });
    }
};
