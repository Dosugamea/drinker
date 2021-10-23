<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->string('title')->comment('レビュータイトル');
            $table->float('star', 2, 1)->comment('評価(0.5単位)');
            $table->string('body')->comment('レビュー本文');
            $table->unsignedBigInteger('user_id')->comment('登録者のユーザーID');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('RESTRICT');
            $table->unsignedBigInteger('beverage_id')->comment('レビュー対象の飲み物ID');
            $table->foreign('beverage_id')->references('id')->on('beverages')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reviews');
    }
}
