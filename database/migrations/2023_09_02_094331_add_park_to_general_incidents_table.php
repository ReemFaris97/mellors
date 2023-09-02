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
        Schema::table('general_incidents', function (Blueprint $table) {
            $table->foreignId('park_id')->nullable()->constrained('parks');
            $table->foreignId('zone_id')->nullable()->constrained('zones');
            $table->foreignId('ride_id')->nullable()->constrained('rides');
            $table->text('text')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('general_incidents', function (Blueprint $table) {
            //
        });
    }
};
