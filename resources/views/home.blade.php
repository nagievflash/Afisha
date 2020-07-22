@extends('layouts.app')

@section('title', 'Афиша городских мероприятий города Муравленко')

@php
    $todayLink = "filter?from=" . Date::parse('today')->format('Y-m-d') . "&to=" . Date::parse('today')->format('Y-m-d');
    $tomorrowLink = "filter?from=" . Date::parse('now')->add('1 day')->format('Y-m-d') . "&to=" . Date::parse('now')->add('1 day')->format('Y-m-d');

    $weekday = Date::parse('now')->format('N');
    $weekendLink = '';
    if ($weekday < 6) {
        $weekendLink = "filter?from=" . Date::parse('now')->add((6 - $weekday).' day')->format('Y-m-d') . "&to=" . Date::parse('now')->add((7 - $weekday).' day')->format('Y-m-d');
    }
    elseif ($weekday == 6) {
        $weekendLink = "filter?from=" . Date::parse('now')->format('Y-m-d') . "&to=" . Date::parse('now')->add((7 - $weekday).' day')->format('Y-m-d');
    }
    else {
        $weekendLink = $todayLink;
    }

@endphp

@section('filter')


<div class="row justify-content-stretch top-filter">
    <div class="form-group search-calendar">
        <div class="col row no-gutter">
            <div class="d-flex justify-content-start filter-wrapper">
                <div class="input-group">
                    <input type="text" name="range" value="Дата" placeholder="Выберите дату" class="form-control range-input" />
                    <div class="input-group-prepend">
                        <div class="input-group-text">@include('assets.calendar')</div>
                    </div>
                </div>
                <div class="filter-button">
                    <a data-range="today" href="{{$todayLink}}">Сегодня</a>
                </div>
                <div class="filter-button">
                    <a data-range="tomorrow" href="{{$tomorrowLink}}">Завтра</a>
                </div>
                <div class="filter-button">
                    <a data-range="weekend" href="{{$weekendLink}}">В выходные</a>
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
        @include('modules.slider', array('slider' => $slider))
    </div>
    <section id="concert">
        <div class="section-title text-center">
            <h2>Концерты</h2>
        </div>
        <div class="items-list">
            <div class="container">
                <div class="row">
                    <div class="fake-row">
                        @foreach ($concerts as $event)
                        @include('modules.events', array('event' => $event))
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--
    @if (null)
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
                                    @include('modules.add-to-wishlist', array('event_id' => $event->id))
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
                                    @include('modules.add-to-wishlist', array('event_id' => $event->id))
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
                                    @include('modules.add-to-wishlist', array('event_id' => $event->id))
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
                                    @include('modules.add-to-wishlist', array('event_id' => $event->id))
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
                                    @include('modules.add-to-wishlist', array('event_id' => $event->id))
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
                                    @include('modules.add-to-wishlist', array('event_id' => $event->id))
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
    @endif
-->
    @isset($event)
    @include('modules.promo', array('promo' => $promo))
    <section id="events">
        <div class="section-title text-center">
            <h2>Ближайшие события</h2>
        </div>
        <div class="items-list">
            <div class="container">
                <div class="row">
                    <div class="fake-row">
                        @foreach ($events as $event)
                        @include('modules.events', array('event' => $event))
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
    @endisset
@endsection

@section('scripts')
    <script>

        function eventReadmore(e) {
            post = e.dataset.post;
            offset = e.dataset.offset;
            var xhr = new XMLHttpRequest();
            xhr.open("POST", post, true);
        }
    </script>
@endsection
