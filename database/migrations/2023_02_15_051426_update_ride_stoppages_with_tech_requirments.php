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
        Schema::table('ride_stoppages', function (Blueprint $table) {
            $table->longText('description')->after('down_minutes')->nullable();
            $table->enum('stoppage_status',['pending','in_maintenance','done'])->after('description')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('stopage_categories', function (Blueprint $table) {
            //
        });
    }
};
