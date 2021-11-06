<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = ['path', 'order', 'user_id'];

    /**
     * 作成者を取得
    */
    public function author()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * この画像モデルを持っているインスタンス(楽天商品またはレビュー)の取得
     */
    public function target()
    {
        return $this->morphTo();
    }
}
