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
        Schema::table('subscriber', function (Blueprint $table) {
            // Yeni sütunları ekle
            $table->string('token', 64)->nullable(); // Benzersiz token alanı (nullable)
         
            $table->timestamp('trial_ends_at')->nullable(); // Deneme süresi bitiş tarihi
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('subscriber', function (Blueprint $table) {
            // Geri alma işlemi, sütunları siler
            $table->dropColumn('token');

            $table->dropColumn('trial_ends_at');
        });
    }
};
