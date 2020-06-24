<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <header>
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-4">
                    <div class="row">
                        <div class="logo">
                            @include('assets.logo')
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="row">
                        <div class="search">
                            <form method="POST" action="search">
                                <div>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="search-input" placeholder="Поиск по предстоящим событиям">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">@include('assets.search')</div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="row justify-content-end">
                        <div class="header-top-icons">
                            <a href="/wishlist" class="icon wishlist-icon" title="Список избранных событий">@include('assets.wishlist')</a>
                            <a href="/profile" class="icon profile-icon" title="Войти или зарегистрироваться">@include('assets.profile')</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <ul class="nav main-menu">
                    <li><a href="">Кино</a></li>
                    <li><a href="">Концерты</a></li>
                    <li><a href="">Спорт</a></li>
                    <li><a href="">Детям</a></li>
                    <li><a href="">Шоу</a></li>
                    <li><a href="">Скидки</a></li>
                    <li><a href="">Новости</a></li>
                    <li><a href="">Контакты</a></li>
                </ul>
            </div>
            <div class="row justify-content-stretch top-filter">
                <div class="form-group search-calendar">
                    <div class="row no-gutter">
                        <div class="col">
                            <div class="input-group">
                                <input type="text" name="range" value="" placeholder="Выберите дату" class="form-control range-input" />
                                <div class="input-group-prepend">
                                    <div class="input-group-text">@include('assets.calendar')</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="main-content">
        @yield('content')
    </div>

</body>
</html>
