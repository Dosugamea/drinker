<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeBeveragesJanCodeToLongInt extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('beverages', function (Blueprint $table) {
            $table->unsignedBigInteger('jan_code')->comment('JANコード')->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('beverages', function (Blueprint $table) {
            $table->integer('jan_code')->comment('JANコード')->change();
        });
    }
}
