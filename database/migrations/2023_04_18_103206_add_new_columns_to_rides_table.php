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
        Schema::table('rides', function (Blueprint $table) {
            $table->decimal('ride_price_ft')->nullable();
            $table->decimal('minimum_height_requirement')->nullable();
            $table->foreignId('ride_type_id')->nullable()->constrained('ride_types');
            $table->enum('ride_cat',['family','thrill','kids'])->default('family');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('rides', function (Blueprint $table) {
            //
        });
    }
};
