<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event as Events;
use App\Page as Pages;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $items = new Events;
        $concerts = $items->getItemsByCategoryName('Концерт')
        ->where('status', 'PUBLISHED');

        $sports = $items->getItemsByCategoryName('Спорт')
        ->where('status', 'PUBLISHED');

        $events = Events::limit(6)
        ->whereHas('schedules', function($query) {
            $query->where('date', '>', date("Y-m-d"));
        })->where('status', 'PUBLISHED')->get();

        $slider = Pages::where('slug', '=', 'home')->first();
        $promo = $slider->promo()->first();
        $bodyClass = 'homepage';


        return view('home', compact('events', 'concerts', 'sports', 'slider', 'bodyClass', 'promo'));
    }

    public function loadMore($offset) {
        $items = new Events;
        return Events::skip($offset)->take(3)->get();
    }

    public function getEventsByDate(Request $request) {
        $from = $request->input('from');
        $to = $request->input('to');
        $daterange = [$from, $to];
        $items = Events::where('status', 'PUBLISHED')->whereHas('schedules', function($query) {
            $query->whereBetween('date', ['2020-07-07', '2020-09-20']);
        })->get();
        return $items;

    }

}
