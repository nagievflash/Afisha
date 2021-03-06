<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Tag extends Model
{
    /**
     * Таблица, связанная с моделью.
     *
     * @var string
     */
    protected $table = 'tags';

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

    /**
     * Получить события.
     */
    public function tags()
    {
        return $this->belongsToMany('App\Tag', 'tag_event');
    }


    /**
     * Получить новости.
     */
    public function news()
    {
        return $this->belongsToMany('App\News', 'tag_news');
    }
}
