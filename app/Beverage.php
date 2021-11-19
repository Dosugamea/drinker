<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Beverage extends Model
{
    protected $fillable = ['title', 'description', 'jan_code', 'user_id'];

    /**
     * 作成者を取得
    */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * 楽天上の商品を取得
    */
    public function rakuten_products()
    {
        return $this->hasMany('App\Rakuten');
    }

    /**
     * 試飲記録を取得
    */
    public function reviews()
    {
        return $this->hasMany('App\Review');
    }

    /**
     * 購買記録を取得
    */
    public function logs()
    {
        return $this->hasMany('App\Log');
    }

    /**
     * タグ一覧を取得
    */
    public function tags()
    {
        return $this->belongsToMany('App\Tag', 'beverages_tags', 'beverage_id', 'tag_id')->withTimestamps();
    }

    /**
     * 関係するモデルの件数を読み込む
     */
    public function loadRelationshipCounts()
    {
        $this->loadCount('reviews', 'votes');
    }

    /**
     * 所有する画像を取得
     */
    public function images()
    {
        return $this->morphMany('App\Image', 'image_target');
    }
}
