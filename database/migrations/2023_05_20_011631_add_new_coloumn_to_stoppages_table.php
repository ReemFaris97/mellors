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
            $table->foreignId('park_time_id')->nullable()->constrained('park_times');
        });
        Schema::table('ride_cycles', function (Blueprint $table) {
            $table->foreignId('park_time_id')->nullable()->constrained('park_times');

        });
        Schema::table('queues', function (Blueprint $table) {
            $table->foreignId('park_time_id')->nullable()->constrained('park_times');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('stoppages', function (Blueprint $table) {
            //
        });
    }
};
