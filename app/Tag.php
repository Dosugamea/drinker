<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = ['name', 'name_en', 'type', 'user_id'];

    /**
     * 作成者を取得
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * このタグを使用している飲料一覧を取得
    */
    public function beverages()
    {
        return $this->belongsToMany('App\Beverage', 'beverages_tags', 'tag_id', 'beverage_id');
    }
}
