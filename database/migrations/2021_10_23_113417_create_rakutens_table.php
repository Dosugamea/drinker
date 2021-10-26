<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRakutensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rakutens', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->string('title')->comment('商品名');
            $table->string('body')->comment('商品説明');
            $table->string('url')->comment('商品URL');
            $table->unsignedBigInteger('beverage_id')->comment('利用先の飲み物ID');
            $table->foreign('beverage_id')->references('id')->on('beverages')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rakutens');
    }
}
