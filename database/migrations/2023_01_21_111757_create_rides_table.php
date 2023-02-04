<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRidesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rides', function (Blueprint $table) {
            $table->id();
            $table->foreignId('game_id')->nullable()->constrained('games');
            $table->string('name')->nullable();
            $table->text('description')->nullable();
            $table->integer('capacity_one_cycle')->nullable();
            $table->integer('one_cycle_duration_seconds')->nullable();
            $table->integer('ride_cycle_mins')->nullable();
            $table->boolean('is_flow')->default(false);
            $table->decimal('ride_price')->nullable();
            $table->decimal('ride_price_vip')->nullable();
            $table->text('ride_category')->nullable();
            $table->foreignId('game_cat_id')->nullable()->constrained('game_categories');
            $table->foreignId('zone_id')->nullable()->constrained('zones');
            $table->foreignId('park_id')->nullable()->constrained('parks');
            $table->date('date')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('rides');
    }
}
