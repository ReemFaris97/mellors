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
        Schema::create('rsr_reports', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ride_id')->nullable()->constrained('rides');
            $table->foreignId('created_by_id')->nullable()->constrained('users');
            $table->foreignId('verified_by_id')->nullable()->constrained('users');
            $table->longText('ride_performance_details')->nullable();
            $table->longText('ride_inspection')->nullable();
            $table->longText('corrective_actions_taken')->nullable();
            $table->longText('conclusion')->nullable();
            $table->date('date')->nullable();
            $table->enum('type',['with_stoppages','without_stoppages'])->nullable();
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
        Schema::dropIfExists('rsr_reports');
    }
};
