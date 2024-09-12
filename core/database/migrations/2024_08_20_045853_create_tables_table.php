<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    if (! Schema::hasTable('tables')) {
     Schema::create('tables', function (Blueprint $table) {
          $table->integer('id', true); // Otomatik olarak 'id' sütunu ve AUTO_INCREMENT oluşturur
            $table->integer('userid');
            $table->integer('restoid');
            $table->text('url');
            $table->dateTime('createdDateTime')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->dateTime('updatedDateTime')->nullable();
            $table->string('qr_text', 255);
            
            $table->foreign('userid')->references(['id'])->on('user');
            $table->foreign('restoid')->references(['id'])->on('posts');
        });
    }
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tables');
    }
};
