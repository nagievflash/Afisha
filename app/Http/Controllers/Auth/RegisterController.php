<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'regex:/^[a-zA-Z а-яё А-ЯЁ ]+$/u', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
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
            'phone.digits_between'  => 'Введите от 9 до 11 цифр',
            'birthday.required'  => 'Введите дату рождения',
            'password.required'  => 'Пароль не может быть пустым',
            'password.confirmed'  => 'Пароли не совпадают',
            'password.min'   => 'Пароль должен быть длинее 8 символов'
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'birthday' => $data['birthday'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
