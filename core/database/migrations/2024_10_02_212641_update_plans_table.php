<?php 
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

 return new class  extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('plans', function (Blueprint $table) {
            // Plan ile ilgili alanları ekle
            $table->text('features')->nullable()->after('description');
            $table->unsignedInteger('max_users')->default(1)->after('features');
            $table->unsignedInteger('validity_period')->default(30)->after('max_users'); // gün olarak
            $table->decimal('renewal_price', 10, 2)->nullable()->after('validity_period');
            $table->unsignedInteger('trial_period')->nullable()->after('renewal_price'); // gün olarak
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('plans', function (Blueprint $table) {
            // Eklemiş olduğumuz alanları kaldır
            $table->dropColumn([
                'features',
                'max_users',
                'validity_period',
                'renewal_price',
                'trial_period',
            ]);
        });
    }
}

?>