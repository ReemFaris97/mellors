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
        Schema::create('ride_stoppages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ride_id')->nullable()->constrained('rides');
            $table->integer('number_of_seats')->nullable();
            $table->string('operator_number')->nullable();
            $table->string('operator_name')->nullable();
            $table->enum('ride_status',['stopped','active']);
            $table->foreignId('stopage_sub_category_id')->nullable()->constrained('stopage_sub_categories');
            $table->text('ride_notes')->nullable();
            $table->date('date')->nullable();
            $table->time('time')->nullable();
            $table->date('opened_date')->nullable();
            $table->timestamp('date_time')->nullable();
            $table->integer('down_minutes')->nullable();
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
        Schema::dropIfExists('ride_stoppages');
    }
};
