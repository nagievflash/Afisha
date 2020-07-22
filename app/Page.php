<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Page extends Model
{
    /**
     * Таблица, связанная с моделью.
     *
     * @var string
     */
    protected $table = 'pages';


    /**
     * Определяет необходимость отметок времени для модели.
     *
     * @var bool
     */
    public $timestamps = true;


    /**
     * Можно сохранить все поля.
     *
     * @var array
     */
    protected $guarded = [];


    /**
     * Получить категории.
     */
    public function events()
    {
        return $this->belongsToMany('App\Event', 'page_event', 'page_id', 'event_id');
    }


    /**
     * Получить промо-блок.
     */
    public function promo()
    {
        return $this->belongsTo('App\Event', 'promo_id');
    }


    /**
     * Событие перед сохранением события Voyager.
     */
    public function save(array $options = [])
    {
        // If no author has been assigned, assign the current user's id as the author of the post
        if (!$this->author_id && Auth::user()) {
            $this->author_id = Auth::user()->getKey();
        }

        return parent::save();
    }


    /**
     * Получить ID автора статьи.
     */
    public function authorId()
    {
        return $this->belongsTo('App\User', 'author_id', 'id');
    }

}
