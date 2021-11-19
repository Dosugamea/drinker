<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    protected $fillable = ['votes', 'user_id'];

    /**
     * 作成者を取得
    */
    public function author()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * この投票モデルを持っているインスタンス(レビューまたは質問回答)の取得
     */
    public function target()
    {
        return $this->morphTo();
    }
}
