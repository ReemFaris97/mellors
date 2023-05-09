<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('queues', function (Blueprint $table) {
            $table->dropColumn(['start', 'end',
                'seats_filled', 'time', 'date']);
            $table->integer('riders_count');
            $table->integer('current_wait_time')->nullable();
            $table->integer('current_queue_occupancy')->nullable();
            $table->integer('max_queue_capacity')->nullable();
            $table->timestamp('start_time')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('queues', function (Blueprint $table) {
            //
        });
    }
};
