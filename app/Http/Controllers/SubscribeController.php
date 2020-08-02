<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Subscribe as Subscribe;

class SubscribeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($request)
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $email = $request->input('email');
        $this->validate($request, [
           'email' => 'required|email|unique:subscribes'
        ],
        [
           'email.required' => 'Вы не ввели адрес электронной почты',
           'email.email'    => 'Вы ввели некорректный адрес электронной почты',
           'email.unique'   => 'Вы уже подписаны на нашу рассылку'
        ]);
        try {
            $subscribe = new Subscribe;
            $subscribe->email = $email;
            $subscribe->save();
            return "Вы успешно подписались на рассылку";
        }
        catch(Exception $e) {
            return "При попытке подписаться на рассылку произошла ошибка. Попробуйте позже.";
        }
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
