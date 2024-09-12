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
    {if (!Schema::hasTable('feedbacks')) {
  
        Schema::create('feedbacks', function (Blueprint $table) {
            $table->id();
            $table->integer('restaurant_id');
            $table->integer('order_id');
            $table->integer('table_id');
         
            $table->tinyInteger('rating');
          //   $table->foreignId('restaurant_id')->constrained('posts')->onDelete('cascade');
     
            $table->text('comment')->nullable();
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
        Schema::dropIfExists('feedbacks');
    }
};
