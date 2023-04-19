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
        Schema::table('ride_cycles', function (Blueprint $table) {
            $table->dropColumn(['seats_filled','cycle_time_minute',
            'ride_price','ride_price_vip','ride_price_new',
            'ride_price_vip_new','time','date']);
            $table->integer('riders_count');
            $table->integer('number_of_ft')->nullable();
            $table->integer('duration_seconds');
            $table->timestamp('start_time');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('rids_cycles', function (Blueprint $table) {
            //
        });
    }
};
