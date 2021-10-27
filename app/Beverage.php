<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Beverage extends Model
{
    /**
     * 作成者を取得
    */
    public function author()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * 楽天上の商品を取得
    */
    public function rakuten_products()
    {
        return $this->hasMany(Rakuten::class);
    }

    /**
     * レビューを取得
    */
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    /**
     * 関係するモデルの件数を読み込む
     */
    public function loadRelationshipCounts()
    {
        $this->loadCount('reviews', 'votes');
    }
}