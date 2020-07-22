<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event as Events;
use App\Page as Pages;
use Jenssegers\Date\Date;

class GetEventsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */


     public $daterange;
     public $tags;
     public $filter;

    public function __construct()
    {
        //$this->middleware('auth');
    }


    public function index($slug) {
        $event = Events::where('slug', $slug)
        ->firstOrFail();
        $bodyClass = 'event';
        $similiarEvents = $this->getSimiliarEvents($slug);
        return view('event', compact('event', 'bodyClass', 'similiarEvents'));
    }

    public function showEventsByFilter(Request $request) {
        $events = $this->getEventsByFilter($request);
        $from = Date::parse($this->daterange[0])->format('d F');
        $to = Date::parse($this->daterange[1])->format('d F');
        $dateTitle = '';
        if ($from == $to) {
            $dateTitle = Date::parse($from)->format('j F');
        }
        else {
            if (Date::parse($this->daterange[0])->format('F') == Date::parse($this->daterange[1])->format('F')) {
                $dateTitle = Date::parse($from)->format('j').' – '.Date::parse($to)->format('j F');
            }
            else {
                $dateTitle = Date::parse($from)->format('j F').' – '.Date::parse($to)->format('j F');
            }
        }
        $bodyClass = 'filter';

        return view('filter', compact('events', 'from', 'to', 'dateTitle', 'bodyClass'));
    }

    public function getEventsByFilter(Request $request) {


        $this->filter = Events::where('status', 'PUBLISHED');

        if ($request->has('from')) {
            $this->daterange = [$request->input('from'), $request->input('to')];
            $this->filter = $this->filter
            ->whereHas('schedules', function($query) {
                $query->whereBetween('date', $this->daterange);
            });
        }

        if ($request->has('tags')) {
            $this->tags = $request->input('tags');
            $this->filter = $this->filter
            ->whereHas('tags', function($query) {
                $query->whereIn('title', $this->tags);
            });
        }

        return $this->filter->get();
    }

    public function getSimiliarEvents($slug) {
        return Events::where('slug', '!=', $slug)
            ->whereHas('schedules', function($query) {
                $query->where('date', '>', date("Y-m-d"));
            })->take(6)->get();
    }
}
