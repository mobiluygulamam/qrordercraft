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
     Schema::create('device_users', function (Blueprint $table) {
          $table->id();
          $table->uuid('device_id')->unique();
          $table->timestamp('last_active_at')->nullable();
          $table->timestamps();
      });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
     Schema::dropIfExists('device_users');

    }
};
