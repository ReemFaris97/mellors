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
        Schema::create('tech_ride_down_reports', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ride_down_id')->nullable()->constrained('rides');
            $table->longText('comment')->nullable();
            $table->string('lead_name')->nullable();
            $table->date('date_expected_open')->nullable();
            $table->foreignId('tech_report_id')->nullable()->constrained('tech_reports');
            $table->foreignId('park_time_id')->nullable()->constrained('park_times');
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
        Schema::dropIfExists('tech_ride_down_reports');
    }
};
