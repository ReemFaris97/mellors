<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('games', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description')->nullable();
            $table->foreignId('park_id')->nullable()->constrained('parks');
            $table->integer('capacity')->nullable();
            $table->integer('cycle_duration_per_second')->nullable();
            $table->integer('cycle_duration_load_unload_minutes')->nullable();
            $table->boolean('is_flow')->default(0)->default(1);
            $table->decimal('price')->nullable();
            $table->decimal('price_vip')->nullable();
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
        Schema::dropIfExists('games');
    }
}
