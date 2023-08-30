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
        Schema::create('accident_incident', function (Blueprint $table) {
            $table->id();
            $table->foreignId('dept_id')->constrained('departments');
            $table->string('location')->nullable();
            $$table->dateTime('time');
            $table->string('ref_no')->nullable();
            $table->string('location')->nullable();
            $table->string('location')->nullable();
            $table->string('location')->nullable();
            $table->string('location')->nullable();
            $table->string('location')->nullable();
            $table->string('location')->nullable();
            $table->string('location')->nullable();
            $table->string('location')->nullable();
 

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
        Schema::dropIfExists('accident_incident');
    }
};
