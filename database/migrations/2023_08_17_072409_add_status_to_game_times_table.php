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
            $table->foreignId('verified_by_id')->nullable()->constrained('users');
            $table->enum('status',['approved','pending'])->nullable()->default('pending');
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
