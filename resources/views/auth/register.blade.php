@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center authenticate">
        <div class="col-md-12">
            <div class="row justify-content-center">


                <div class="col-lg-8">
                    <div class="row">
                        <h2 class="auth-title">Регистрация</h2>
                    </div>
                    <div class="register-form">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="input-group row">
                                        <label for="name" class="label">Имя</label>

                                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-group row">
                                        <label for="email" class="label">Email</label>

                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-group row">
                                        <label for="password" class="label">Пароль</label>
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-group row">
                                        <label for="password-confirm" class="label">Подтвердить пароль</label>

                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-group row">
                                        <label for="phone" class="label">Телефон</label>

                                        <input id="phone" type="tel" class="form-control" name="phone" required autocomplete="phone">

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-group row">
                                        <label for="birthday" class="label">Дата рождения</label>

                                        <input id="birthday" type="date" class="form-control" name="birthday" required autocomplete="birthday" value="2000-01-01" min="1920-01-01" max="2014-12-31">

                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="input-group row mb-0">
                                        <button type="submit" class="btn btn-yellow">
                                            Зарегистрироваться
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
