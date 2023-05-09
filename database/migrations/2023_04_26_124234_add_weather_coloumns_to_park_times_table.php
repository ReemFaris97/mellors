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
        Schema::table('park_times', function (Blueprint $table) {
            $table->string('general_weather')->nullable();
            $table->decimal('temp')->nullable();
            $table->string('description')->nullable();
            $table->decimal('windspeed_avg')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('park_times', function (Blueprint $table) {
            //
        });
    }
};
