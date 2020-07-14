<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use TCG\Voyager\Traits\Resizable;

class Event extends Model
{
    use Resizable;
    /**
     * Таблица, связанная с моделью.
     *
     * @var string
     */
    protected $table = 'events';


    /**
     * Определяет необходимость отметок времени для модели.
     *
     * @var bool
     */
    public $timestamps = true;


    /**
     * Определяет имя категории.
     *
     * @var string
     */
    public $categoryName = '';


    /**
     * Можно сохранить все поля.
     *
     * @var array
     */
    protected $guarded = [];


    /**
     * Получить категории.
     */
    public function categories()
    {
        return $this->belongsToMany('App\Category', 'category_event');
    }


    /**
     * Получить теги.
     */
    public function tags()
    {
        return $this->belongsToMany('App\Tag', 'tag_event');
    }


    /**
     * Получить теги.
     */
    public function pages()
    {
        return $this->belongsToMany('App\Page', 'page_event');
    }


    /**
     * Получить расписание.
     */
    public function schedules()
    {
        return $this->morphMany('App\Schedule', 'scheduleable')->orderBy('date', 'asc');
    }


    /**
     * Получить заказы.
     */
    public function orders()
    {
        return $this->hasMany('App\Order');
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


    /**
     * Фильтр событий по названию категории.
     */
    public function getItemsByCategoryName($name) {
        $this->categoryName = $name;
        $items = $this::whereHas('categories', function ($query) {
            $query->where('name', $this->categoryName);
        })->whereHas('schedules', function($query) {
            $query->where('date', '>', date("Y-m-d"));
        })->get();
        return $items;
    }
}
