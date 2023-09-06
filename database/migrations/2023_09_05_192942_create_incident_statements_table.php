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
        Schema::create('incident_statements', function (Blueprint $table) {
            $table->id();
            $table->date('date')->nullable();
            $table->json('value')->nullable();
            $table->foreignId('created_by_id')->nullable()->constrained('users');
            $table->foreignId('incident_form_id')->nullable()->constrained('general_incidents');
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
        Schema::dropIfExists('incidents_statement');
    }
};
