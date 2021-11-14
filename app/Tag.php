<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = ['name', 'name_en', 'type', 'user_id', 'beverage_id'];

    /**
     * 作成者を取得
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * 属する飲料を取得
     */
    public function beverages()
    {
        return $this->belongsToMany('App\Beverage', 'beverages_tags', 'tag_id', 'beverage_id');
    }
}
