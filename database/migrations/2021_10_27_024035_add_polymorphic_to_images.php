<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPolymorphicToImages extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('images', function (Blueprint $table) {
            $table->dropForeign('images_review_id_foreign');
            $table->dropColumn('review_id');
            $table->string('image_target_type')->comment('画像の付与対象のテーブル');
            $table->integer('image_target_id')->comment('画像の付与対象のID');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('images', function (Blueprint $table) {
            $table->unsignedBigInteger('review_id')->comment('添付先のレビューID');
            $table->foreign('review_id')->references('id')->on('reviews')->onDelete('RESTRICT');
            $table->dropColumn('image_target_type');
            $table->dropColumn('image_target_id');
        });
    }
}
