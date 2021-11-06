<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('logs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->string('body')->comment('メモ(任意)')->nullable();
            $table->integer('price')->comment('購入単価');
            $table->integer('count')->comment('購入本数');
            $table->unsignedBigInteger('user_id')->comment('登録者のユーザーID');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('RESTRICT');
            $table->unsignedBigInteger('beverage_id')->comment('レビュー対象の飲み物ID');
            $table->foreign('beverage_id')->references('id')->on('beverages')->onDelete('RESTRICT');
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('logs');
    }
}
