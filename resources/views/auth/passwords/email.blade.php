@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center authenticate">
        <div class="col-md-12">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="row">
                        <h2 class="auth-title">Изменить пароль</h2>
                        <p>Не переживайте. Просто введите свою эл. почту или логин, и мы вышлем инструкцию по восстановлению</p>
                    </div>
                    <div class="register-form">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                        <form method="POST" action="{{ route('password.email') }}">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="input-group row">
                                        <label for="email" class="label">Введите E-mail адрес, указанный при регистрации</label>

                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Ваш E-mail адрес">

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="input-group row mb-0">
                                        <button type="submit" class="btn btn-yellow">
                                            Отправить ссылку на восстановление пароля
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
