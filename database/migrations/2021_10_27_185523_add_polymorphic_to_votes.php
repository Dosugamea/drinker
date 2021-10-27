<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPolymorphicToVotes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('votes', function (Blueprint $table) {
            $table->dropForeign('votes_review_id_foreign');
            $table->dropColumn('review_id');
            $table->string('vote_target_type')->comment('投票の付与対象のテーブル');
            $table->integer('vote_target_id')->comment('投票の付与対象のID');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('votes', function (Blueprint $table) {
            $table->unsignedBigInteger('review_id')->comment('投票先のレビューID');
            $table->foreign('review_id')->references('id')->on('reviews')->onDelete('CASCADE');
            $table->dropColumn('vote_target_type');
            $table->dropColumn('vote_target_id');
        });
    }
}
