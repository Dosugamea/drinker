<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('votes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->tinyInteger('votes')->comment('UP(1)またはDOWN(-1)の投票');
            $table->unsignedBigInteger('user_id')->comment('登録者のユーザーID');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('CASCADE');
            $table->unsignedBigInteger('review_id')->comment('投票先のレビューID');
            $table->foreign('review_id')->references('id')->on('reviews')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('votes');
    }
}
