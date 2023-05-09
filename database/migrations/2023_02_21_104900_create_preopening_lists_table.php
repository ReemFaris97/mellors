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
        Schema::create('preopening_lists', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ride_id')->nullable()->constrained('rides');
            $table->foreignId('inspection_list_id')->nullable()->constrained('inspection_lists');
            $table->enum('list_type',['preopening','maintenance'])->default('preopening');
            $table->enum('status',['yes','no'])->default('yes');
            $table->longText('comment')->nullable();
            $table->foreignId('created_by_id')->nullable()->constrained('users');

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
};
