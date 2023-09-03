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
        Schema::create('general_incidents', function (Blueprint $table) {
            $table->id();
            $table->string('type');
            $table->dateTime('date')->nullable();
            $table->json('value')->nullable();
            $table->json('value_2')->nullable();
            $table->json('value_3')->nullable();
            $table->json('value_4')->nullable();
            $table->foreignId('created_by_id')->nullable()->constrained('users');
            $table->foreignId('approve_by_id')->nullable()->constrained('users');
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
        Schema::dropIfExists('general_incidents');
    }
};
