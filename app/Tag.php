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
}
