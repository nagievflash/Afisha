<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Organisation as Organisations;
use Illuminate\Support\Facades\Validator;
use App\Message as Messages;

class OrganisationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public $slug;

    public function index()
    {


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($slug, Request $request)
    {
        $this->slug = $slug;

        $this->validate($request, [
            'name' => ['required', 'regex:/^[a-zA-Z а-яё А-ЯЁ ]+$/u', 'max:255'],
            'tel' => ['required',  'phone'],
            'message' => ['required']
        ],
        [
            'name.required' => 'Введите имя',
            'name.regex' => 'Имя должно состоять только из русских букв',
            'name.max' => 'Имя не может быть длинее 256 символов',
            'email.required'  => 'Введите Email',
            'email.unique'  => 'Этот Email уже используется',
            'email.string'  => 'Не верный формат электронной почты',
            'email.email'  => 'Не верный формат электронной почты',
            'tel.required'  => 'Введите Телефон',
            'tel.phone'  => 'Неверный номер телефона',
            'message.required'  => 'Введите сообщение',
        ]);

        try {
            $message = new Messages;
            $message->name = $request->input('name');
            $message->phone = $request->input('tel');
            $message->message = $request->input('message');
            $message->organisation = Organisations::where('slug', $this->slug)->first()->title;
            $message->save();
            return "Ваше сообщение отправлено. В ближайшее время с вами свяжутся.";
        }
        catch(Exception $e) {
            return "При попытке отправить сообщение произошла ошибка. Попробуйте позже.";
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
    public function show($slug)
    {
        $this->slug = $slug;
        $bodyClass = 'organisation';

        $item = Organisations::where('slug', $this->slug)->firstOrFail();

        return view('organisation', compact('bodyClass', 'item'));
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
