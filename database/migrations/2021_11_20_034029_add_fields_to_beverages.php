<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsToBeverages extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('beverages', function (Blueprint $table) {
            $table->float('ratingAverage', 3, 2)->comment('平均評価');
            $table->integer('ratingCount')->comment('評価者数');
            $table->string('company')->comment('製造業者');
            $table->integer('volume')->comment('内容量');
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
            $table->dropColumn('ratingAverage');
            $table->dropColumn('ratingCount');
            $table->dropColumn('company');
            $table->dropColumn('volume');
        });
    }
}
