<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * 所有するレビューを取得
     */
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    /**
     * 所有する購入記録を取得
     */
    public function logs()
    {
        return $this->hasMany(Log::class);
    }

    /**
     * 所有する投票を取得
     */
    public function votes()
    {
        return $this->hasMany(Vote::class);
    }

    /**
     * 関係するモデルの件数を読み込む
     */
    public function loadRelationshipCounts()
    {
        $this->loadCount('reviews', 'logs', 'votes');
    }
}
