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
            $table->dropColumn('list_type');
            $table->enum('lists_type',['inspection_list','preopening','preclosing']);
            $table->enum('is_checked',['yes','no']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('preopening_lists', function (Blueprint $table) {
            //
        });
    }
};
