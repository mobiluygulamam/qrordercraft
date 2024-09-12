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
        Schema::create('feedback_statuses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('feedback_id')->constrained('feedbacks')->onDelete('cascade');
            $table->enum('status', ['pending', 'in_review', 'resolved'])->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('feedback_statuses');
    }
};
