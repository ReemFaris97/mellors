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
        Schema::table('preopening_lists', function (Blueprint $table) {
            $table->dropColumn('inspection_list');
            $table->foreignId('inspection_list_id')->after('ride_id')->constrained('inspection_lists');
            $table->boolean('checked')->after('inspection_list_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
