<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
     /**
     * 作成者を取得
     */
    public function author()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * 属する飲料を取得
     */
    public function beverage()
    {
        return $this->belongsTo(Beverage::class);
    }

    /**
     * 所有する画像を取得
     */
    public function images()
    {
        return $this->morphMany('App\Image', 'image_target');
    }

    /**
     * 所有する投票を取得
     */
    public function votes()
    {
        return $this->morphMany('App\Vote', 'vote_target');
    }

    /**
     * 関係するモデルの件数を読み込む
     */
    public function loadRelationshipCounts()
    {
        $this->loadCount('votes');
    }
}