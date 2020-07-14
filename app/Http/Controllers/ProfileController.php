<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User as User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bodyClass = 'profile';
        return view('auth.profile')->with('bodyClass', $bodyClass);
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
    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'regex:/^[a-zA-Z а-яё А-ЯЁ ]+$/u', 'max:255'],
            'birthday' => ['required'],
            'phone' => ['required', 'numeric', 'digits_between:9,12'],
        ],
        [
            'name.required' => 'Введите имя',
            'name.regex' => 'Имя должно состоять только из русских букв',
            'name.max' => 'Имя не может быть длинее 256 символов',
            'email.required'  => 'Введите Email',
            'email.unique'  => 'Этот Email уже используется',
            'email.string'  => 'Не верный формат электронной почты',
            'email.email'  => 'Не верный формат электронной почты',
            'phone.required'  => 'Введите Телефон',
            'phone.numeric'  => 'Не верный номер телефона',
            'phone.digits_between'  => 'Введите от 9 до 11 цифр номера без восьмерки',
            'birthday.required'  => 'Введите дату рождения',
        ]);
        if ($validator->fails()) {
            return redirect('profile')
                        ->withErrors($validator)
                        ->withInput();
        }
        else {
            $user = User::where('id', Auth::user()->id)->first();
            $user->name = $request->input('name');
            $user->phone = $request->input('phone');
            $user->birthday = $request->input('birthday');
            $user->save();
            return redirect('profile')->with('success', 'Данные профиля успешно обновлены.');
        }
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
