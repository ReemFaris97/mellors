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
        Schema::table('health_and_safety_reports', function (Blueprint $table) {
            $table->enum('color',['yes','no'])->default('yes');
        });
        Schema::table('skill_game_reports', function (Blueprint $table) {
            $table->enum('color',['yes','no'])->default('yes');
        });
        Schema::table('ride_ops_reports', function (Blueprint $table) {
            $table->enum('color',['yes','no'])->default('yes');
        });
        Schema::table('maintenance_reports', function (Blueprint $table) {
            $table->enum('color',['yes','no'])->default('yes');
        });
        Schema::table('tech_reports', function (Blueprint $table) {
            $table->enum('color',['yes','no'])->default('yes');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tech_reports', function (Blueprint $table) {
            //
        });
    }
};
