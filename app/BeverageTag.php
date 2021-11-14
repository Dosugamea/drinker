<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BeverageTag extends Model
{
    protected $table = 'beverages_tags';

    protected $fillable = ['beverage_id', 'tag_id', 'user_id'];

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
    public function beverage()
    {
        return $this->belongsTo('App\Beverage');
    }

    /**
     * 属するタグを取得
    */
    public function tag()
    {
        return $this->belongsTo('App\Tag');
    }

}
