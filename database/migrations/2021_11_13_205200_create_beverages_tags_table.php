<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBeveragesTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('beverages_tags', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->unsignedBigInteger('beverage_id')->comment('飲み物ID');
            $table->foreign('beverage_id')->references('id')->on('beverages')->onDelete('RESTRICT');
            $table->unsignedBigInteger('tag_id')->comment('タグID');
            $table->foreign('tag_id')->references('id')->on('tags')->onDelete('RESTRICT');
            $table->unsignedBigInteger('user_id')->comment('登録者のユーザーID');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('beverages_tags');
    }
}
