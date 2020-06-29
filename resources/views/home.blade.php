@extends('layouts.app')

@section('title', 'Главная')

@section('content')
    <div class="slider-wall">
        <img src="/css/icons/wall.png" alt="">
    </div>

    <div class="hero-slider">
        <div id="slider">
            <div class="slider-inner">
                <div id="slider-content">
                    <div id="slide">
                        <div class="slide-header">
                            <div class="event__age-restriction"><span>12</span></div>
                            <div class="event__type"><span>@include('assets.melodic')</span> Мюзикл</div>
                            <div class="event__tags">
                                <a href="#" class="event__tag">#Мюзикл</a>
                                <a href="#" class="event__tag">#Представление</a>
                                <a href="#" class="event__tag">#Спектакль</a>
                                <a href="#" class="event__tag">#Театр</a>
                            </div>
                        </div>
                        <div class="slide-content">
                            <div class="event__title"><h2>Анна Каренина</h2></div>
                            <div class="event__description"><p>Современный итальянский балет «Анна Каренина» представляет вашему вниманию трагическую историю любви замужней дамы Анны Карениной и блестящего офицера...</p></div>
                        </div>
                        <div class="slide-footer">
                            <div class="col">
                                <div class="row align-items-center">
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="event__date"><span class="icon-calendar">@include('assets.calendar')</span>10 Апреля, 19:00</div>
                                            <div class="event__location"><span class="icon-location">@include('assets.location')</span>МБОУ ГДК «Украина»</div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="row">
                                            <a href="#" class="event__accept ml-auto">
                                                <span class="event-accept">Пойти</span>
                                                <span class="event-angle">@include('assets.angle')</span>
                                            </a>
                                            <div class="event__add-wishlist"><a href="#" class="add-to-wishlist" title="Добавить в избранное">@include('assets.wishlist-outline')</a></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div data-slide-content="0">
                        <div class="slide-header">
                            <div class="event__age-restriction"><span>12</span></div>
                            <div class="event__type"><span>@include('assets.melodic')</span> Мюзикл</div>
                            <div class="event__tags">
                                <a href="#" class="event__tag">#Мюзикл</a>
                                <a href="#" class="event__tag">#Представление</a>
                                <a href="#" class="event__tag">#Спектакль</a>
                                <a href="#" class="event__tag">#Театр</a>
                            </div>
                        </div>
                        <div class="slide-content">
                            <div class="event__title"><h2>Анна Каренина</h2></div>
                            <div class="event__description"><p>Современный итальянский балет «Анна Каренина» представляет вашему вниманию трагическую историю любви замужней дамы Анны Карениной и блестящего офицера...</p></div>
                        </div>
                        <div class="slide-footer">
                            <div class="col">
                                <div class="row align-items-center">
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="event__date"><span class="icon-calendar">@include('assets.calendar')</span>10 Апреля, 19:00</div>
                                            <div class="event__location"><span class="icon-location">@include('assets.location')</span>МБОУ ГДК «Украина»</div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="row">
                                            <a href="#" class="event__accept ml-auto">
                                                <span class="event-accept">Пойти</span>
                                                <span class="event-angle">@include('assets.angle')</span>
                                            </a>
                                            <div class="event__add-wishlist"><a href="#" class="add-to-wishlist" title="Добавить в избранное">@include('assets.wishlist-outline')</a></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div data-slide-content="1">
                        <div class="slide-header">
                            <div class="event__age-restriction"><span>12</span></div>
                            <div class="event__type"><span>@include('assets.melodic')</span> Концерт</div>
                            <div class="event__tags">
                                <a href="#" class="event__tag">#Фестиваль</a>
                                <a href="#" class="event__tag">#Опера</a>
                                <a href="#" class="event__tag">#Музыка</a>
                                <a href="#" class="event__tag">#Рок</a>
                                <a href="#" class="event__tag">#Поп</a>
                            </div>
                        </div>
                        <div class="slide-content">
                            <div class="event__title"><h2>Weekend в Парке</h2></div>
                            <div class="event__description"><p>Не имеющий аналогов во всей стране фестиваль Театральный Weekend в Усадьбе состоится 25-26 июля 2020 года в старинном и известном музее-усадьбе «Архангельское»</p></div>
                        </div>
                        <div class="slide-footer">
                            <div class="col">
                                <div class="row align-items-center">
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="event__date"><span class="icon-calendar">@include('assets.calendar')</span>25 Июля, 19:00</div>
                                            <div class="event__location"><span class="icon-location">@include('assets.location')</span>Парк Культуры и Отдыха</div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="row">
                                            <a href="#" class="event__accept ml-auto">
                                                <span class="event-accept">Пойти</span>
                                                <span class="event-angle">@include('assets.angle')</span>
                                            </a>
                                            <div class="event__add-wishlist"><a href="#" class="add-to-wishlist" title="Добавить в избранное">@include('assets.wishlist-outline')</a></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div data-slide-content="2">
                        <div class="slide-header">
                            <div class="event__age-restriction"><span>12</span></div>
                            <div class="event__type"><span>@include('assets.melodic')</span> Мюзикл</div>
                            <div class="event__tags">
                                <a href="#" class="event__tag">#Мюзикл</a>
                                <a href="#" class="event__tag">#Представление</a>
                                <a href="#" class="event__tag">#Спектакль</a>
                                <a href="#" class="event__tag">#Театр</a>
                            </div>
                        </div>
                        <div class="slide-content">
                            <div class="event__title"><h2>Прайм-тайм</h2></div>
                            <div class="event__description"><p>У каждой девушки, желающей покорить Москву, есть мечта. И даже не одна. Анна хочет выиграть в главном вокальном телевизионном конкурсе страны.</p></div>
                        </div>
                        <div class="slide-footer">
                            <div class="col">
                                <div class="row align-items-center">
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="event__date"><span class="icon-calendar">@include('assets.calendar')</span>9 Сентября, 19:00</div>
                                            <div class="event__location"><span class="icon-location">@include('assets.location')</span>МБОУ ГДК «Украина»</div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="row">
                                            <a href="#" class="event__accept ml-auto">
                                                <span class="event-accept">Пойти</span>
                                                <span class="event-angle">@include('assets.angle')</span>
                                            </a>
                                            <div class="event__add-wishlist"><a href="#" class="add-to-wishlist" title="Добавить в избранное">@include('assets.wishlist-outline')</a></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div data-slide-content="3">
                        <div class="slide-header">
                            <div class="event__age-restriction"><span>16</span></div>
                            <div class="event__type"><span>@include('assets.melodic')</span> Концерт</div>
                            <div class="event__tags">
                                <a href="#" class="event__tag">#Музыка</a>
                                <a href="#" class="event__tag">#Концерт</a>
                                <a href="#" class="event__tag">#Фестиваль</a>
                                <a href="#" class="event__tag">#Деньгорода</a>
                            </div>
                        </div>
                        <div class="slide-content">
                            <div class="event__title"><h2>Jazz Trio London</h2></div>
                            <div class="event__description">
                                <p>Джазовый коллектив объединяет любовь к настоящей музыке и  в джазовой импровизации, экспериментального джаза, кавер исполнения популярных музыкальных композиций.</p>
                            </div>
                        </div>
                        <div class="slide-footer">
                            <div class="col">
                                <div class="row align-items-center">
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="event__date"><span class="icon-calendar">@include('assets.calendar')</span>30 Сентября, 20:00</div>
                                            <div class="event__location"><span class="icon-location">@include('assets.location')</span>МБОУ ГДК «Украина»</div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="row">
                                            <a href="#" class="event__accept ml-auto">
                                                <span class="event-accept">Пойти</span>
                                                <span class="event-angle">@include('assets.angle')</span>
                                            </a>
                                            <div class="event__add-wishlist"><a href="#" class="add-to-wishlist" title="Добавить в избранное">@include('assets.wishlist-outline')</a></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <img src="/images/karenina.jpg" />
            <img src="/images/usadba.jpg" />
            <img src="/images/live-fest.webp" />
            <img src="/images/lebed.webp" />

            <div id="pagination">
                <button class="active" data-slide="0"></button>
                <button data-slide="1"></button>
                <button data-slide="2"></button>
                <button data-slide="3"></button>
            </div>
        </div>
    </div>
    <section id="concert">
        <div class="section-title text-center">
            <h2>Концерты</h2>
        </div>
        <div class="items-list">
            <div class="container">
                <div class="row">

                    <div class="col-md-4 item">
                        <a href="" class="item-price">500 Рублей</a>

                        <div class="item-wrapper">
                            <div class="item-background" style="background-image:url(/images/Khruangbin-1.jpg)"></div>
                            <div class="item-image">
                                <div class="item-header d-flex justify-content-between">
                                    <div class="item-tags">
                                        <a class="item-tag" href="#">#Коцерт</a>
                                        <a class="item-tag" href="#">#Музыка</a>
                                        <a class="item-tag" href="#">#Джаз</a>
                                    </div>
                                    <div class="item-wishlist">@include('assets.wishlist-outline')</div>
                                </div>
                            </div>
                            <div class="item-content">
                                <h3 class="item-title">KHRUANGBIN</h3>
                                <div class="item-info d-flex justify-content-between">
                                    <div class="item-date">@include('assets.calendar')<span>30 сентября 20:00</span></div>
                                    <div class="item-location">@include('assets.location')<span>ГДК «Украина»</span></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 item">
                        <a href="" class="item-price">500 Рублей</a>

                        <div class="item-wrapper">
                            <div class="item-background" style="background-image:url(/images/Khruangbin-1.jpg)"></div>
                            <div class="item-image">
                                <div class="item-header d-flex justify-content-between">
                                    <div class="item-tags">
                                        <a class="item-tag" href="#">#Коцерт</a>
                                        <a class="item-tag" href="#">#Музыка</a>
                                        <a class="item-tag" href="#">#Джаз</a>
                                    </div>
                                    <div class="item-wishlist">@include('assets.wishlist-outline')</div>
                                </div>
                            </div>
                            <div class="item-content">
                                <h3 class="item-title">KHRUANGBIN</h3>
                                <div class="item-info d-flex justify-content-between">
                                    <div class="item-date">@include('assets.calendar')<span>30 сентября 20:00</span></div>
                                    <div class="item-location">@include('assets.location')<span>ГДК «Украина»</span></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 item">
                        <a href="" class="item-price">500 Рублей</a>

                        <div class="item-wrapper">
                            <div class="item-background" style="background-image:url(/images/Khruangbin-1.jpg)"></div>
                            <div class="item-image">
                                <div class="item-header d-flex justify-content-between">
                                    <div class="item-tags">
                                        <a class="item-tag" href="#">#Коцерт</a>
                                        <a class="item-tag" href="#">#Музыка</a>
                                        <a class="item-tag" href="#">#Джаз</a>
                                    </div>
                                    <div class="item-wishlist">@include('assets.wishlist-outline')</div>
                                </div>
                            </div>
                            <div class="item-content">
                                <h3 class="item-title">KHRUANGBIN</h3>
                                <div class="item-info d-flex justify-content-between">
                                    <div class="item-date">@include('assets.calendar')<span>30 сентября 20:00</span></div>
                                    <div class="item-location">@include('assets.location')<span>ГДК «Украина»</span></div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <section id="movies">
        <div class="section-title text-center">
            <h2>Сегодня в кино</h2>
        </div>
        <div class="slideset">

            <div class="slides-container">
                <div class="slides-inner">
                    <div class="slide">
                        <div class="item-wrapper">
                            <div class="item-background" style="background-image:url(/images/x1000.webp)"></div>
                            <div class="item-image">
                                <div class="item-header d-flex justify-content-end">
                                    <div class="item-wishlist">@include('assets.wishlist-outline')</div>
                                </div>
                            </div>
                            <div class="item-content">
                                <h3 class="item-title">KHRUANGBIN</h3>
                                <div class="item-info d-flex justify-content-between">
                                    <div class="item-date">@include('assets.calendar')<span>c 30 сентября</span></div>
                                    <div class="item-location">@include('assets.location')<span>ГДК «Украина»</span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="slide">
                        <div class="item-wrapper">
                            <div class="item-background" style="background-image:url(/images/likvidators.webp)"></div>
                            <div class="item-image">
                                <div class="item-header d-flex justify-content-end">
                                    <div class="item-wishlist">@include('assets.wishlist-outline')</div>
                                </div>
                            </div>
                            <div class="item-content">
                                <h3 class="item-title">KHRUANGBIN</h3>
                                <div class="item-info d-flex justify-content-between">
                                    <div class="item-date">@include('assets.calendar')<span>c 30 сентября</span></div>
                                    <div class="item-location">@include('assets.location')<span>ГДК «Украина»</span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="slide">
                        <div class="item-wrapper">
                            <div class="item-background" style="background-image:url(/images/portie.webp)"></div>
                            <div class="item-image">
                                <div class="item-header d-flex justify-content-end">
                                    <div class="item-wishlist">@include('assets.wishlist-outline')</div>
                                </div>
                            </div>
                            <div class="item-content">
                                <h3 class="item-title">KHRUANGBIN</h3>
                                <div class="item-info d-flex justify-content-between">
                                    <div class="item-date">@include('assets.calendar')<span>c 30 сентября</span></div>
                                    <div class="item-location">@include('assets.location')<span>ГДК «Украина»</span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="slide">
                        <div class="item-wrapper">
                            <div class="item-background" style="background-image:url(/images/nimani.webp)"></div>
                            <div class="item-image">
                                <div class="item-header d-flex justify-content-end">
                                    <div class="item-wishlist">@include('assets.wishlist-outline')</div>
                                </div>
                            </div>
                            <div class="item-content">
                                <h3 class="item-title">KHRUANGBIN</h3>
                                <div class="item-info d-flex justify-content-between">
                                    <div class="item-date">@include('assets.calendar')<span>c 30 сентября</span></div>
                                    <div class="item-location">@include('assets.location')<span>ГДК «Украина»</span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="slide">
                        <div class="item-wrapper">
                            <div class="item-background" style="background-image:url(/images/bilal.webp)"></div>
                            <div class="item-image">
                                <div class="item-header d-flex justify-content-end">
                                    <div class="item-wishlist">@include('assets.wishlist-outline')</div>
                                </div>
                            </div>
                            <div class="item-content">
                                <h3 class="item-title">KHRUANGBIN</h3>
                                <div class="item-info d-flex justify-content-between">
                                    <div class="item-date">@include('assets.calendar')<span>c 30 сентября</span></div>
                                    <div class="item-location">@include('assets.location')<span>ГДК «Украина»</span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <section id="promo" style="background-image:url(/images/karenina.webp)">
        <div class="container">
            <div class="promo-header">
                <div class="event__age-restriction"><span>12</span></div>
                <div class="event__type"><span>@include('assets.melodic')</span> Мюзикл</div>
                <div class="event__tags">
                    <a href="#" class="event__tag">#Мюзикл</a>
                    <a href="#" class="event__tag">#Представление</a>
                    <a href="#" class="event__tag">#Спектакль</a>
                    <a href="#" class="event__tag">#Театр</a>
                </div>
            </div>
            <div class="promo-content">
                <div class="event__title"><h2>Анна Каренина</h2></div>
                <div class="event__description"><p>Современный итальянский балет «Анна Каренина» представляет вашему вниманию трагическую историю любви замужней дамы Анны Карениной и блестящего офицера...</p></div>
            </div>
            <div class="promo-footer">
                <div class="col">
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <div class="row">
                                <div class="event__date"><span class="icon-calendar">@include('assets.calendar')</span>10 Апреля, 19:00</div>
                                <div class="event__location"><span class="icon-location">@include('assets.location')</span>МБОУ ГДК «Украина»</div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <a href="#" class="event__accept ml-auto">
                                    <span class="event-accept">Пойти</span>
                                    <span class="event-angle">@include('assets.angle')</span>
                                </a>
                                <div class="event__add-wishlist"><a href="#" class="add-to-wishlist" title="Добавить в избранное">@include('assets.wishlist-outline')</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="events">
        <div class="section-title text-center">
            <h2>Ближайшие события</h2>
        </div>
        <div class="items-list">
            <div class="container">
                <div class="row">

                    <div class="col-md-4 item">
                        <a href="" class="item-price">ДК «Украина»</a>

                        <div class="item-wrapper">
                            <div class="item-background" style="background-image:url(/images/Khruangbin-1.jpg)"></div>
                            <div class="item-image">
                                <div class="item-header d-flex justify-content-between">
                                    <div class="item-tags">
                                        <a class="item-tag" href="#">#Коцерт</a>
                                        <a class="item-tag" href="#">#Музыка</a>
                                        <a class="item-tag" href="#">#Джаз</a>
                                    </div>
                                    <div class="item-wishlist">@include('assets.wishlist-outline')</div>
                                </div>
                            </div>
                            <div class="item-content">
                                <h3 class="item-title">KHRUANGBIN</h3>
                                <div class="item-info d-flex justify-content-between">
                                    <div class="item-date">@include('assets.calendar')<span>30 сентября 20:00</span></div>
                                    <div class="item-location">@include('assets.location')<span>ГДК «Украина»</span></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 item">
                        <a href="" class="item-price">Лира</a>

                        <div class="item-wrapper">
                            <div class="item-background" style="background-image:url(/images/Khruangbin-1.jpg)"></div>
                            <div class="item-image">
                                <div class="item-header d-flex justify-content-between">
                                    <div class="item-tags">
                                        <a class="item-tag" href="#">#Коцерт</a>
                                        <a class="item-tag" href="#">#Музыка</a>
                                        <a class="item-tag" href="#">#Джаз</a>
                                    </div>
                                    <div class="item-wishlist">@include('assets.wishlist-outline')</div>
                                </div>
                            </div>
                            <div class="item-content">
                                <h3 class="item-title">KHRUANGBIN</h3>
                                <div class="item-info d-flex justify-content-between">
                                    <div class="item-date">@include('assets.calendar')<span>30 сентября 20:00</span></div>
                                    <div class="item-location">@include('assets.location')<span>ГДК «Украина»</span></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 item">
                        <a href="" class="item-price">Парк Культуры и Отдыха</a>

                        <div class="item-wrapper">
                            <div class="item-background" style="background-image:url(/images/Khruangbin-1.jpg)"></div>
                            <div class="item-image">
                                <div class="item-header d-flex justify-content-between">
                                    <div class="item-tags">
                                        <a class="item-tag" href="#">#Коцерт</a>
                                        <a class="item-tag" href="#">#Музыка</a>
                                        <a class="item-tag" href="#">#Джаз</a>
                                    </div>
                                    <div class="item-wishlist">@include('assets.wishlist-outline')</div>
                                </div>
                            </div>
                            <div class="item-content">
                                <h3 class="item-title">KHRUANGBIN</h3>
                                <div class="item-info d-flex justify-content-between">
                                    <div class="item-date">@include('assets.calendar')<span>30 сентября 20:00</span></div>
                                    <div class="item-location">@include('assets.location')<span>ГДК «Украина»</span></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 item">
                        <a href="" class="item-price">ДЮЦ Радуга</a>

                        <div class="item-wrapper">
                            <div class="item-background" style="background-image:url(/images/Khruangbin-1.jpg)"></div>
                            <div class="item-image">
                                <div class="item-header d-flex justify-content-between">
                                    <div class="item-tags">
                                        <a class="item-tag" href="#">#Коцерт</a>
                                        <a class="item-tag" href="#">#Музыка</a>
                                        <a class="item-tag" href="#">#Джаз</a>
                                    </div>
                                    <div class="item-wishlist">@include('assets.wishlist-outline')</div>
                                </div>
                            </div>
                            <div class="item-content">
                                <h3 class="item-title">KHRUANGBIN</h3>
                                <div class="item-info d-flex justify-content-between">
                                    <div class="item-date">@include('assets.calendar')<span>30 сентября 20:00</span></div>
                                    <div class="item-location">@include('assets.location')<span>ГДК «Украина»</span></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 item">
                        <a href="" class="item-price">Атриум 7й школы</a>

                        <div class="item-wrapper">
                            <div class="item-background" style="background-image:url(/images/Khruangbin-1.jpg)"></div>
                            <div class="item-image">
                                <div class="item-header d-flex justify-content-between">
                                    <div class="item-tags">
                                        <a class="item-tag" href="#">#Коцерт</a>
                                        <a class="item-tag" href="#">#Музыка</a>
                                        <a class="item-tag" href="#">#Джаз</a>
                                    </div>
                                    <div class="item-wishlist">@include('assets.wishlist-outline')</div>
                                </div>
                            </div>
                            <div class="item-content">
                                <h3 class="item-title">KHRUANGBIN</h3>
                                <div class="item-info d-flex justify-content-between">
                                    <div class="item-date">@include('assets.calendar')<span>30 сентября 20:00</span></div>
                                    <div class="item-location">@include('assets.location')<span>ГДК «Украина»</span></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 item">
                        <a href="" class="item-price">Городской Музей</a>

                        <div class="item-wrapper">
                            <div class="item-background" style="background-image:url(/images/Khruangbin-1.jpg)"></div>
                            <div class="item-image">
                                <div class="item-header d-flex justify-content-between">
                                    <div class="item-tags">
                                        <a class="item-tag" href="#">#Коцерт</a>
                                        <a class="item-tag" href="#">#Музыка</a>
                                        <a class="item-tag" href="#">#Джаз</a>
                                    </div>
                                    <div class="item-wishlist">@include('assets.wishlist-outline')</div>
                                </div>
                            </div>
                            <div class="item-content">
                                <h3 class="item-title">KHRUANGBIN</h3>
                                <div class="item-info d-flex justify-content-between">
                                    <div class="item-date">@include('assets.calendar')<span>30 сентября 20:00</span></div>
                                    <div class="item-location">@include('assets.location')<span>ГДК «Украина»</span></div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col-md-4"></div>
                    <div class="col-md-4 d-flex">
                        <a href="" class="readmore">Загрузить еще</a>
                    </div>
                    <div class="col-md-4"></div>
                </div>
            </div>
        </div>
    </section>
@endsection
