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
        Schema::table('observations', function (Blueprint $table) {
            $table->foreignId('ride_id')->constrained('rides');
            $table->date('date_reported');
            $table->date('date_resolved')->nullable();
            $table->string('snag')->nullable();
            $table->string('maintenance_feedback')->nullable();
            $table->string('reported_on_tech_sheet')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('observations', function (Blueprint $table) {
            //
        });
    }
};
