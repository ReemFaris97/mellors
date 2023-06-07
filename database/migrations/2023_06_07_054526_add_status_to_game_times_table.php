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
        Schema::table('game_times', function (Blueprint $table) {
            $table->string('first_status')->nullable();
            $table->string('second_status')->nullable();
            $table->string('comment')->nullable();
            $table->integer('no_of_gondolas')->nullable();
            $table->integer('no_of_seats')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('game_times', function (Blueprint $table) {
            //
        });
    }
};
