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
          $table->renameColumn('createdDateTime', 'created_at');
          $table->renameColumn('updatedDateTime', 'updated_at');
      });
    }
 
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
     Schema::table('tables', function (Blueprint $table) {
          $table->renameColumn('created_at', 'createdDateTime');
          $table->renameColumn('updated_at', 'updatedDateTime');
      });
    }
};
