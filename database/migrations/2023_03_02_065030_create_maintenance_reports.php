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
        Schema::create('maintenance_reports', function (Blueprint $table) {
            $table->id();
            $table->string('question');
            $table->string('answer')->nullable();
            $table->longText('comment')->nullable();
            $table->date('date');
            $table->foreignId('user_id')->nullable()->constrained('users');
            $table->foreignId('park_id')->nullable()->constrained('parks');
            $table->foreignId('park_time_id')->nullable()->constrained('park_times');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('maintenance_reports');
    }
};
