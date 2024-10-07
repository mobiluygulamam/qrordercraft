<?php 
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class  extends  Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user', function (Blueprint $table) {
            // Plan ile ilgili alanları ekle

            $table->dateTime('plan_start_date')->nullable();
            $table->dateTime('plan_end_date')->nullable();
            $table->dateTime('last_payment_date')->nullable();
            $table->dateTime('next_payment_due')->nullable();
            $table->string('payment_status')->default('register');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user', function (Blueprint $table) {
            // Eklemiş olduğumuz alanları kaldır
            $table->dropColumn([
             
                'plan_start_date',
                'plan_end_date',
                'last_payment_date',
                'next_payment_due',
                'payment_status',
            ]);
        });
    }
}

?>