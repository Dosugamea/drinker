<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('images', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->smallInteger('order')->comment('表示順序');
            $table->string('path')->comment('画像パス');
            $table->string('thumbnail_large_path')->nullable()->comment('サムネイル(大)のパス');
            $table->string('thumbnail_medium_path')->nullable()->comment('サムネイル(中)のパス');
            $table->string('thumbnail_small_path')->nullable()->comment('サムネイル(小)のパス');
            $table->unsignedBigInteger('user_id')->comment('登録者のユーザーID');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('RESTRICT');
            $table->unsignedBigInteger('review_id')->comment('添付先のレビューID');
            $table->foreign('review_id')->references('id')->on('reviews')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('images');
    }
}
