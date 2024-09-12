<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
     if (Schema::disableForeignKeyConstraints()) {
          Schema::table('orders', function (Blueprint $table) {
               $table->integer('table_number')->change();
               $table->foreign('table_number')->references('id')->on('tables');
           });
     }
    
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
     Schema::table('orders', function (Blueprint $table) {
          // $table->dropForeign(['table_number']);

          // Schema::dropIfExists('orders');
      });
    }
};
