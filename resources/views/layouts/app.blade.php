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
                        <a href="/" class="logo" title="Афиша городских мероприятий г. Муравленко">
                            @include('assets.logo')
                        </a>
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
                        <div class="header-top-icons dropdown show">
                            <a href="/wishlist" class="icon wishlist-icon" title="Список избранных событий">@include('assets.wishlist') 0</a>
                            <a class="icon profile-icon dropdown-toggle" title="Войти или зарегистрироваться" id="profileMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">@include('assets.profile')</a>
                            <div class="dropdown-menu" aria-labelledby="profileMenuLink">
                                @if(!Auth::check())
                                <a class="dropdown-item" href="{{ route('login') }}">Войти</a>
                                <a class="dropdown-item" href="{{ route('register') }}">Зарегистрироваться</a>
                                @else
                                <a class="dropdown-item" href="#">Моя афиша</a>
                                <a class="dropdown-item" href="#">Мои билеты</a>
                                <a class="dropdown-item" href="#">Управление аккаунтом</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{ route('logout') }}">Выход</a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="menu-wrapper row">
                <ul class="nav main-menu d-flex justify-content-start">
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
            @yield('filter')
        </div>
    </header>
    <div class="main-content">
        @yield('content')
    </div>
    <footer>
        <div class="container">
            <div class="row">
                <div class="logo col-12">
                    <div class="row">
                        @include('assets.logo')
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="row">
                        <ul class="footer-menu">
                            <li><a href="">О проекте</a></li>
                            <li><a href="">Помощь</a></li>
                            <li><a href="">Пользовательские соглашения</a></li>
                            <li><a href="">Подарочные сертификаты</a></li>
                            <li><a href="">Билеты в подарок</a></li>
                            <li><a href="">Возврат билета</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="row">
                        <ul class="footer-menu">
                            <li><a href="">Партнерам и организаторам</a></li>
                            <li><a href="">Корпоративным клиентам</a></li>
                            <li><a href="">Контакты</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="row">
                        <div class="subscribe-block">
                            <p>Подпишись на новости об акциях и предстоящих событиях</p>
                            <div class="input-group">
                                <input type="text" placeholder="Введите ваш Email" class="subscribe-input form-control" />
                                <div class="input-group-prepend">
                                    <div class="input-group-text btn-blue">Подписаться</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    @yield('scripts')
</body>
</html>
