<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event as Events;
use App\Tag as Tags;
use App\News as News;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public $tag;
    public function index($tag)
    {
        $this->tag = Tags::select('title')->where('slug', $tag)->get()->first()->title;
        $tag = $this->tag;
        $bodyClass = 'tags';
        $events = Events::where('status', 'PUBLISHED')->whereHas('tags', function($query) {
            $query->where('title', $this->tag);
        })->get();
        $news = News::whereHas('tags', function($query) {
            $query->where('title', $this->tag);
        })->get();
        return view('tag', compact('tag', 'events', 'bodyClass', 'news'));
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
    public function show(Request $request)
    {
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
