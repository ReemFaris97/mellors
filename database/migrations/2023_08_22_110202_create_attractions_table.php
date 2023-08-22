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
        Schema::create('attractions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ride_id')->constrained('rides');
            $table->foreignId('zone_id')->nullable()->constrained('zones');
            $table->foreignId('park_id')->nullable()->constrained('parks');
            $table->foreignId('park_time_id')->nullable()->constrained('park_times');
            $table->foreignId('created_by_id')->nullable()->constrained('users');
            $table->foreignId('approve_by_id')->nullable()->constrained('users');
            $table->date('date')->nullable();
            $table->tinyInteger('approve')->default(0);

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
        Schema::dropIfExists('attractions');
    }
};
