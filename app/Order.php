<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    /**
     * Таблица, связанная с моделью.
     *
     * @var string
     */
    protected $table = 'orders';

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
     * Получить событие.
     */
    public function events()
    {
        return $this->belongsTo('App\Event');
    }

    /**
     * Получить пользоветеля.
     */
    public function users()
    {
        return $this->belongsTo('App\User');
    }
}
