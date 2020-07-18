<header>
    <div class="container">
        <div class="row align-items-center top-wrapper">
            <div class="col-lg-4 logo-wrapper">
                <div class="row">
                    <a href="/" class="logo" title="Афиша городских мероприятий г. Муравленко">
                        @include('assets.logo')
                    </a>
                </div>
            </div>
            <div class="col-lg-4 search-wrapper">
                <div class="row">
                    <div class="search">
                        <form method="POST" action="search" id="searchform">
                            <div>
                                <div class="input-group">
                                    <input  name="search" autocomplete="off" spellcheck="false" autocorrect="off" type="search" class="form-control" id="search-input" placeholder="Поиск по предстоящим событиям">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">@include('assets.search', ['search' => "search"])</div>
                                    </div>
                                    <div id="search-results">

                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 top-menu-wrapper">
                <div class="row justify-content-end">
                    <div class="header-top-icons dropdown show">
                        <a href="{{route('wishlist')}}" class="icon wishlist-icon" title="Список избранных событий">@include('assets.wishlist', ['wishlist' => "wishlist"])<span>
                        @guest
                        0
                        @endguest
                        @auth
                        {{Auth::user()->getWishlist()->count()}}
                        @endauth
                        </span>
                        </a>
                        <a class="icon profile-icon dropdown-toggle" title="Войти или зарегистрироваться" id="profileMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">@include('assets.profile', ['profile' => "profile"])</a>
                        <div class="dropdown-menu" aria-labelledby="profileMenuLink">
                            @if(!Auth::check())
                            <a class="dropdown-item" href="{{ route('login') }}">Войти</a>
                            <a class="dropdown-item" href="{{ route('register') }}">Зарегистрироваться</a>
                            @else
                            <a class="dropdown-item" href="{{route('wishlist')}}">Моя афиша</a>
                            <a class="dropdown-item" href="#">Мои билеты</a>
                            <a class="dropdown-item" href="{{route('profile')}}">Управление аккаунтом</a>
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
