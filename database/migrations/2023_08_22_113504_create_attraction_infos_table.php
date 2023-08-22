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
        Schema::create('attraction_infos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('attraction_id')->constrained('attractions');
            $table->foreignId('general_question_id')->constrained('general_questions');
            $table->enum('status',['yes','no'])->nullable();
            $table->text('note')->nullable();

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
        Schema::dropIfExists('attraction_infos');
    }
};
