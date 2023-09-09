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
        Schema::create('ride_capacities', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->foreignId('park_id')->nullable()->constrained('parks');
            $table->foreignId('ride_id')->nullable()->constrained('rides');
            $table->integer('ride_availablity_capacity')->nullable();
            $table->integer('preopening_capacity')->nullable();
            $table->integer('final_capacity')->nullable();
            $table->foreignId('created_by_id')->nullable()->constrained('users');
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
        Schema::dropIfExists('ride_capacities');
    }
};
