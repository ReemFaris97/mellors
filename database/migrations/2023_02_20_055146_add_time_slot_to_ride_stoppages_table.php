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
        Schema::table('ride_stoppages', function (Blueprint $table) {
            $table->enum('type',['all_day','time_slot'])->default('all_day');
            $table->enum('stoppage_status',['pending','working','done'])->default('pending');
            $table->time('time_slot_start')->nullable();
            $table->time('time_slot_end')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ride_stoppages', function (Blueprint $table) {
            //
        });
    }
};
