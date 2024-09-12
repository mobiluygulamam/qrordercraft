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
    if (! Schema::hasColumns('plans', ['tablecount']) ) {
     Schema::table('plans', function (Blueprint $table) {
          // Yanlış kolonun ve tablo isminin geri alınması
        
          $table->bigInteger('tablecount');
      });
    }
    
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
     Schema::table('plans', function (Blueprint $table) {
          // Yanlış kolonun ve tablo isminin geri alınması
          $table->dropColumn('tablecount');
      });
    }
};
