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
        Schema::create('red_flags', function (Blueprint $table) {
            $table->id();
            $table->text('ride')->nullable();
            $table->longText('issue')->nullable();
            $table->enum('type',['h&s','tech','maintenance','skill_games','ride_ops'])->default('h&s');
            $table->foreignId('park_time_id')->nullable()->constrained('park_times');
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
        Schema::dropIfExists('red_flags');
    }
};