@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center authenticate">
        <div class="col-md-12">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="row">
                        <h2 class="auth-title">Изменить пароль</h2>
                    </div>
                    <div class="register-form">
                        <form method="POST" action="{{ route('password.update') }}">
                            <div class="row">
                                <div class="col-md-12">
                                @csrf

                                    <input type="hidden" name="token" value="{{ $token }}">

                                    <div class="input-group row">
                                        <label for="email" class="col-md-4 col-form-label text-md-right">Введите E-mail</label>

                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="input-group row">
                                        <label for="password" class="col-md-4 col-form-label text-md-right">Пароль</label>

                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="input-group row">
                                        <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Подтвердите пароль</label>

                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">

                                    </div>

                                    <div class="input-group row mb-0">
                                        <button type="submit" class="btn btn-primary">
                                            Сбросить пароль
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
