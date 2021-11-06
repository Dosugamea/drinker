<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    protected $fillable = ['body', 'price', 'count', 'user_id', 'beverage_id'];

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
}
