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
     Schema::table('staff_members', function (Blueprint $table) {
          // Eğer mevcut tablo içerisinde değişiklik yapıyorsanız, bu tür işlemlerle mevcut sütunun türünü değiştirebilirsiniz.
          $table->string('salary')->change();
      });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
     Schema::dropIfExists('staff_members');

    }
};
