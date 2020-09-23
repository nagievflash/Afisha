<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Spatial;

class Organisation extends Model
{

    use Spatial;

    /**
     * Определяет необходимость отметок времени для модели.
     *
     * @var bool
     */
    public $timestamps = true;

    /**
     * Атрибуты, для которых запрещено массовое назначение.
     *
     * @var array
     */
    protected $guarded = [];

    protected $spatial = ['location'];

    /**
     * Получить теги.
     */
    public function users()
    {
        return $this->belongsToMany('App\User', 'user_organisation');
    }

    public function scopeActive($query)
    {
        return $query->roles()->where('name', 'moderator');
    }
}
