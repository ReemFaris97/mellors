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
        Schema::create('ride_cycles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ride_id')->nullable()->constrained('rides');
            $table->foreignId('user_id')->nullable()->constrained('users');
            $table->foreignId('park_id')->nullable()->constrained('parks');
            $table->integer('seats_filled')->nullable();
            $table->integer('number_of_vip')->nullable();
            $table->integer('number_of_disabled')->nullable();
            $table->integer('cycle_time_minute')->nullable();
            $table->decimal('ride_price')->nullable();
            $table->decimal('ride_price_vip')->nullable();
            $table->decimal('ride_price_new')->nullable();
            $table->decimal('ride_price_vip_new')->nullable();
            $table->decimal('sales')->nullable();
            $table->date('opened_date')->nullable();
            $table->time('time');
            $table->date('date');
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
        Schema::dropIfExists('ride_cycles');
    }
};
