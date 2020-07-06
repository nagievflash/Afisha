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
     * Получить теги.
     */
    public function tags()
    {
        return $this->belongsToMany('App\Tag', 'tag_event');
    }
}
