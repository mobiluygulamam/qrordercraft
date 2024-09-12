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
     Schema::table('tables', function (Blueprint $table) {
          $table->bigInteger('table_id')->after('restoid'); // `resto_id` alanından sonra eklenir.
      });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
     Schema::table('tables', function (Blueprint $table) {
          $table->dropColumn('table_id');
      });
    }
};
