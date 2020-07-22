<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Page as Pages;
use App\Event as Events;
use App\Category as Categories;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public $slug;
    public $category;

    public function index($slug)
    {
        $this->slug = $slug;
        $bodyClass = 'page';

        $page = Pages::where('slug', $this->slug)->firstOrFail();
        $items = new Events;


        $category = Categories::where('slug', $this->slug)->first();
        $this->category = $category;
        if ($this->category) {
            $promo = $page->promo()->first();
            if ($promo) {
                $events = $items->getItemsByCategoryName($this->category->name)
                ->where('status', 'PUBLISHED')
                ->where('title', '!=', $promo->title);
            }
            else {
                $events = $items->getItemsByCategoryName($this->category->name)
                ->where('status', 'PUBLISHED');
                $bodyClass .= ' nopromo';
            }
            $nearest = Events::limit(6)
            ->whereHas('schedules', function($query) {
                $query->where('date', '>', date("Y-m-d"));
            })
            ->whereDoesntHave('categories', function($query) {
                $query->where('name', $this->category->name);
            })->where('status', 'PUBLISHED')->get();

            return view('category', compact('events', 'nearest', 'bodyClass', 'promo', 'page'));
        }
        else {
            return view('page', compact('bodyClass', 'page'));
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
