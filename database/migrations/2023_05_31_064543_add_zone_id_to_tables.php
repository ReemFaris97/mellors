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
        Schema::table('tables', function (Blueprint $table) {
            Schema::table('ride_stoppages', function (Blueprint $table) {
                $table->foreignId('zone_id')->nullable()->constrained('zones');
            });
            Schema::table('ride_cycles', function (Blueprint $table) {
                $table->foreignId('zone_id')->nullable()->constrained('zones');
    
            });
            Schema::table('queues', function (Blueprint $table) {
                $table->foreignId('zone_id')->nullable()->constrained('zones');
    
            });
            Schema::table('preopening_lists', function (Blueprint $table) {
                $table->foreignId('zone_id')->nullable()->constrained('zones');
                $table->foreignId('park_id')->nullable()->constrained('parks');
                $table->date('opened_date')->nullable();
    
            });

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tables', function (Blueprint $table) {
            //
        });
    }
};
