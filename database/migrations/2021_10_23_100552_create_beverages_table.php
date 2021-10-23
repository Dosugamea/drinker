<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBeveragesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('beverages', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->string('title')->comment('名称');
            $table->string('description')->nullable()->comment('説明文(管理者設定)');
            $table->date('sell_start_at')->nullable()->comment('発売日(おおよその日付)');
            $table->date('sell_end_at')->nullable()->comment('終売日(おおよその日付)');
            $table->integer('jan_code')->comment('JANコード');
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
        Schema::dropIfExists('beverages');
    }
}
