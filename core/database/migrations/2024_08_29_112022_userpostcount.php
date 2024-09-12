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
     Schema::table('plans', function (Blueprint $table) {
          $table->bigInteger('userpostcount')->after('tablecount');
           // `resto_id` alanından sonra eklenir.
      });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
     Schema::table('plans', function (Blueprint $table) {
          $table->dropColumn('userpostcount');
      });
    }
};
