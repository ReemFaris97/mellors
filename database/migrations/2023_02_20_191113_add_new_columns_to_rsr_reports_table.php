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
        Schema::table('rsr_reports', function (Blueprint $table) {
            $table->foreignId('park_id')->nullable()->constrained('parks');
            $table->foreignId('stoppage_id')->nullable()->constrained('ride_stoppages');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('rsr_reports', function (Blueprint $table) {
            //
        });
    }
};
