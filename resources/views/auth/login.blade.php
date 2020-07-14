@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center authenticate">
        <div class="col-md-4">
            <div class="row justify-content-start">
                <h2 class="auth-title">Войти на портал</h2>

                <div class="login-form">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="input-group">
                            <label for="email" class="label">Имя пользователя</label>

                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Введите Email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="input-group">
                            <label for="password"  class="label">{{ __('Пароль') }}</label>

                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Введите пароль"  required autocomplete="current-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="input-group d-none">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" checked>

                                <label class="form-check-label" for="remember">
                                    {{ __('Запомнить меня') }}
                                </label>
                            </div>
                        </div>
                        <div class="input-group mb-0">
                            <button type="submit" class="btn btn-yellow">
                                {{ __('Войти') }}
                            </button>

                            @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Восстановить пароль?') }}
                                </a>
                            @endif
                            <a class="btn btn-link" href="{{ route('register') }}">
                                Зарегистрироваться
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
