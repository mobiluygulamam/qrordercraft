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
     if (!Schema::hasTable('feedback_responses')) {
          Schema::create('feedback_responses', function (Blueprint $table) {
               $table->id();
               $table->foreignId('feedback_id')->constrained('feedbacks')->onDelete('cascade');
               $table->text('response');
               $table->integer('responded_by');
               $table->timestamps();
           });
     } 
      
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('feedback_responses');
    }

};
