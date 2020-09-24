<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends \TCG\Voyager\Models\User
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'phone', 'birthday'
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
     * Получить теги.
     */
    public function wishlist()
    {
        return $this->belongsToMany('App\Event', 'user_event');
    }

    /**
     * Список желаний.
     */
    public function getWishlist()
    {
        return $this->wishlist()->whereHas('schedules', function($query) {
            $query->where('date', '>', date("Y-m-d"));
        })->get();
    }


    public function scopeModerator($query)
    {
        return $query->whereIn('role_id', [1, 3]);
    }
}
