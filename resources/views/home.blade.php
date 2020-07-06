@extends('layouts.app')

@section('title', 'Главная')

@section('filter')

<div class="row justify-content-stretch top-filter">
    <div class="form-group search-calendar">
        <div class="col row no-gutter">
            <div class="d-flex justify-content-start filter-wrapper">
                <div class="input-group">
                    <input type="text" name="range" value="" placeholder="Выберите дату" class="form-control range-input" />
                    <div class="input-group-prepend">
                        <div class="input-group-text">@include('assets.calendar')</div>
                    </div>
                </div>
                <div class="filter-button">
                    <a data-range="today">Сегодня</a>
                </div>
                <div class="filter-button">
                    <a data-range="tomorrow">Завтра</a>
                </div>
                <div class="filter-button">
                    <a data-range="weekend">В выходные</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('content')
    <div class="slider-wall">
        <img src="/css/icons/wall.png" alt="">
    </div>

    <div class="hero-slider">

        <div id="slider">
            <div class="slider-inner">
                <div id="slider-content">
                    @foreach ($slider->events as $event)
                    @php
                        $schedule = $event->schedules()->get();
                        if ($schedule->first()) {
                            $date = Date::parse($schedule->first()->date)->format('d F').' '.Date::parse($schedule->first()->time)->format('H:i');
                        }
                    @endphp
                     @if ($loop->first)
                    <div id="slide">
                        <div class="slide-header">
                            <div class="event__age-restriction"><span>{{$event->age}}</span></div>
                            <div class="event__type"><span>@include('assets.melodic')</span> Мюзикл</div>
                            <div class="event__tags">
                                @foreach ($event->tags as $tag)
                                <a href="/tags/{{ $tag->slug}}" class="event__tag">#{{$tag->title}}</a>
                                @endforeach
                            </div>
                        </div>
                        <div class="slide-content">
                            <div class="event__title"><h2>{{$event->title}}</h2></div>
                            <div class="event__description"><p>{{$event->excerpt}}</p></div>
                        </div>
                        <div class="slide-footer">
                            <div class="col">
                                <div class="row align-items-center">
                                    <div class="col-md-6">
                                        <div class="row">

                                            <div class="event__date"><span class="icon-calendar">@include('assets.calendar')</span>{{ $date }}</div>
                                            <div class="event__location"><span class="icon-location">@include('assets.location')</span>{{$event->location}}</div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="row">
                                            <a href="/events/{{$event->slug}}" class="event__accept ml-auto">
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
                    @endif
                    <div data-slide-content="{{$loop->index}}">
                        <div class="slide-header">
                            <div class="event__age-restriction"><span>{{$event->age}}</span></div>
                            <div class="event__type"><span>@include('assets.melodic')</span> Мюзикл</div>
                            <div class="event__tags">
                                @foreach ($event->tags as $tag)
                                <a href="/tags/{{ $tag->slug}}" class="event__tag">#{{$tag->title}}</a>
                                @endforeach
                            </div>
                        </div>
                        <div class="slide-content">
                            <div class="event__title"><h2>{{$event->title}}</h2></div>
                            <div class="event__description"><p>{{$event->excerpt}}</p></div>
                        </div>
                        <div class="slide-footer">
                            <div class="col">
                                <div class="row align-items-center">
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="event__date"><span class="icon-calendar">@include('assets.calendar')</span>{{$date}}</div>
                                            <div class="event__location"><span class="icon-location">@include('assets.location')</span>{{$event->location}}</div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="row">
                                            <a href="/events/{{$event->slug}}" class="event__accept ml-auto">
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
                    @endforeach

                </div>
            </div>

            @foreach ($slider->events as $event)
                <img src="{{Voyager::image( $event->slider_image )}}" />
            @endforeach

            <div id="pagination">
            @foreach ($slider->events as $event)
                @if ($loop->first)
                <button class="active" data-slide="0"></button>
                @else
                <button data-slide="{{$loop->index}}"></button>
                @endif
            @endforeach
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
                    <div class="fake-row">
                        @foreach ($concerts as $concert)
                        @php
                            $schedule = $concert->schedules()->get();
                            if ($schedule->first()):
                                $date = Date::parse($schedule->first()->date)->format('d F').' '.Date::parse($schedule->first()->time)->format('H:i');
                                $price = $schedule->first()->price;
                                if ($price && $price != 0) {
                                    $price .= ' Рублей';
                                }
                                else $price = false;
                        @endphp
                        <div class="col-md-4 item">
                            @if ($price)
                            <a href="/events/{{ $concert->slug }}" class="item-price">{{ $price }}</a>
                            @else
                            <a href="/events/{{ $concert->slug }}" class="item-price d-none"></a>
                            @endif
                            <div class="item-wrapper">
                                <div class="item-background" style="background-image:url({{ Voyager::image( $concert->image ) }})"></div>
                                <div class="item-image">
                                    <div class="item-header d-flex justify-content-between">
                                        <div class="item-tags">
                                            @foreach ($concert->tags as $tag)
                                            <a class="item-tag" href="/tags/{{ $tag->slug}}">#{{$tag->title}}</a>
                                            @endforeach
                                        </div>
                                        <div class="item-wishlist">@include('assets.wishlist-outline')</div>
                                    </div>
                                </div>
                                <div class="item-content">
                                    <h3 class="item-title">{{ $concert->title }}</h3>
                                    <div class="item-info d-flex justify-content-between">
                                        <div class="item-date">@include('assets.calendar')<span>{{ $date }}</span></div>
                                        <div class="item-location">@include('assets.location')<span>{{ $concert->location }}</span></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                        @endforeach
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
                    <div class="fake-row">
                        @foreach ($events as $event)
                        @php
                            $schedule = $event->schedules()->get();
                            if ($schedule->first()):
                                $date = Date::parse($schedule->first()->date)->format('d F').' '.Date::parse($schedule->first()->time)->format('H:i');
                        @endphp
                        <div class="col-md-4 item">
                            <a href="/events/{{$event->slug}}" class="item-price d-none"></a>

                            <div class="item-wrapper">
                                <div class="item-background" style="background-image:url({{ Voyager::image($event->image)}})"></div>
                                <div class="item-image">
                                    <div class="item-header d-flex justify-content-between">
                                        <div class="item-tags">
                                            @foreach ($event->tags as $tag)
                                            <a class="item-tag" href="/tags/{{ $tag->slug}}">#{{$tag->title}}</a>
                                            @endforeach
                                        </div>
                                        <div class="item-wishlist">@include('assets.wishlist-outline')</div>
                                    </div>
                                </div>
                                <div class="item-content">
                                    <h3 class="item-title">{{$event->title}}</h3>
                                    <div class="item-info d-flex justify-content-between">

                                        <div class="item-date">@include('assets.calendar')<span>{{ $date }}</span></div>
                                        <div class="item-location">@include('assets.location')<span>{{ $event->location }}</span></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                        @endforeach
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4"></div>
                    <div class="col-md-4 d-flex">
                        <a data-post="{{route('events_loadmore', 0)}}" id="readmore" class="readmore" data-offset="6" onclick="eventReadmore(this);">Загрузить еще</a>
                    </div>
                    <div class="col-md-4"></div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
    <script>
        var items = document.getElementsByClassName('item');
        Array.prototype.forEach.call(items, function (timestamp) {
            timestamp.addEventListener("click", function(){
                this.getElementsByClassName('item-price')[0].click();
            })
        });

        function eventReadmore(e) {
            post = e.dataset.post;
            offset = e.dataset.offset;
            var xhr = new XMLHttpRequest();
            xhr.open("POST", post, true);
        }
    </script>
@endsection
