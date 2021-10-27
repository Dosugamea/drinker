<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rakuten extends Model
{
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
}
