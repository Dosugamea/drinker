<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rakuten extends Model
{
    protected $fillable = ['title', 'body', 'url', 'shopName', 'price', 'beverage_id'];

    /**
     * 属する飲料を取得
     */
    public function beverage()
    {
        return $this->belongsTo(Beverage::class);
    }
}
