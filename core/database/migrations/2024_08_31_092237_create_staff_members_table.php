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
        Schema::create('staff_members', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('position');
            $table->string('email')->unique()->nullable();
            $table->string('phone', 20)->nullable();
            $table->string('photo_url')->nullable();
            $table->date('hire_date')->nullable();
            $table->string('salary')->nullable();
            $table->timestamps(); // created_at ve updated_at sütunlarını otomatik olarak ekler
            $table->string('surname');
            $table->integer('restaurant_id');
      
          });
    }
    
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('staff_members');
    }
};
