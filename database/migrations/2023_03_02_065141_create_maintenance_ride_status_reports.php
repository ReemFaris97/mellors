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
        Schema::create('maintenance_ride_status_reports', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ride_id')->nullable()->constrained('rides');
            $table->longText('comment')->nullable();
            $table->enum('status',['open','close'])->default('open');
            $table->date('date');
            $table->foreignId('maintenance_report_id')->nullable()->constrained('maintenance_reports');
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
        Schema::dropIfExists('maintenance_ride_status_reports');
    }
};
