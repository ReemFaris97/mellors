<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePreopeningListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('preopening_lists', function (Blueprint $table) {
            $table->id();
            $table->string('inspection_list');
            $table->foreignId('ride_id')->nullable()->constrained('rides');
            $table->foreignId('zone_id')->nullable()->constrained('zones');
            $table->foreignId('user_id')->nullable()->constrained('users');
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
        Schema::dropIfExists('preopening_lists');
    }
}