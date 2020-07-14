@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center authenticate">
        <div class="col-md-12">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    @if(session()->has('success'))
                        <div class="alert alert-success">
                            {{ session()->get('success') }}
                        </div>
                    @endif
                    <h3>Здравствуйте,</h3>
                    <h2 class="auth-title">{{Auth::user()->name}}</h2>

                    <div class="login-form">
                        <form method="POST" action="{{ route('profileUpdate') }}" class="row">
                            @csrf

                            <div class="input-group col-md-6">
                                <label for="name" class="label">Ваше Имя</label>

                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="{{Auth::user()->name}}" value="{{ Auth::user()->name }}" required autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="input-group col-md-6">
                                <label for="email" class="label">Ваш Email</label>

                                <input id="email" type="email" disabled class="form-control @error('email') is-invalid @enderror" name="email" placeholder="{{Auth::user()->email}}" value="{{ Auth::user()->email }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>


                            <div class="input-group col-md-6">
                                <label for="phone"  class="label">Телефон</label>

                                <input id="phone" type="tel" class="form-control @error('phone') is-invalid @enderror" name="phone" placeholder="{{Auth::user()->phone}}" value="{{Auth::user()->phone}}"  required autocomplete="phone">

                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="input-group col-md-6">
                                <label for="birthday"  class="label">Дата рождения</label>

                                <input id="birthday" type="date" class="form-control @error('birthday') is-invalid @enderror" name="birthday" value="{{Auth::user()->birthday}}"  required autocomplete="birthday" onfocus="(this.type='date')">

                                @error('birthday')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="input-group mb-0">
                                <button type="submit" class="btn btn-yellow">
                                    Сохранить
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
