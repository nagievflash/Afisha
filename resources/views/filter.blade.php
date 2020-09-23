@extends('layouts.app')

@section('title', 'Главная')


@php
    $todayLink = "filter?from=" . Date::parse('today')->format('Y-m-d') . "&to=" . Date::parse('today')->format('Y-m-d');
    $tomorrowLink = "filter?from=" . Date::parse('now')->add('1 day')->format('Y-m-d') . "&to=" . Date::parse('now')->add('1 day')->format('Y-m-d');

    $weekday = Date::parse('now')->format('N');
    $weekendLink = '';
    if ($weekday < 6) {
        $weekendLink = "filter?from=" . Date::parse('now')->add((6 - $weekday).' day')->format('Y-m-d') . "&to=" . Date::parse('now')->add((7 - $weekday).' day')->format('Y-m-d');
        $weekendFrom = Date::parse('now')->add((6 - $weekday).' day')->format('Y-m-d');
        $weekendTo = Date::parse('now')->add((7 - $weekday).' day')->format('Y-m-d');
    }
    elseif ($weekday == 6) {
        $weekendLink = "filter?from=" . Date::parse('now')->format('Y-m-d') . "&to=" . Date::parse('now')->add((7 - $weekday).' day')->format('Y-m-d');
        $weekendFrom = Date::parse('now')->format('Y-m-d');
        $weekendTo = Date::parse('now')->add((7 - $weekday).' day')->format('Y-m-d');
    }
    else {
        $weekendLink = $todayLink;
        $weekendFrom = Date::parse('today')->format('Y-m-d');
        $weekendTo = Date::parse('today')->format('Y-m-d');
    }

    $uri_from = Date::parse($from)->format('Y-m-d');
    $uri_to = Date::parse($to)->format('Y-m-d');

    $todayClass = $tomorrowClass = $weekendClass = "";

    if (($uri_from == $uri_to) && ($uri_from == Date::parse('today')->format('Y-m-d'))) {
        $todayClass = "active";
    }

    if (($uri_from == $uri_to) && ($uri_from == Date::parse('now')->add('1 day')->format('Y-m-d'))) {
        $tomorrowClass = "active";
    }
    if (($uri_from == $weekendFrom) && ($uri_to == $weekendTo)) {
        $weekendClass = "active";
    }


@endphp

@section('filter')

<div class="row justify-content-stretch top-filter">
    <div class="form-group search-calendar">
        <div class="col row no-gutter">
            <div class="d-flex justify-content-start filter-wrapper">
                <div class="input-group">
                    <input type="text" name="range" value="@if ($from != $to) {{$from}} - {{$to}} @else {{$from}} @endif" placeholder="Выберите дату" class="form-control range-input" />
                    <div class="input-group-prepend">
                        <div class="input-group-text">@include('assets.calendar')</div>
                    </div>
                </div>
                <div class="filter-button">
                    <a class="{{$todayClass}}" data-range="today" href="{{$todayLink}}">Сегодня</a>
                </div>
                <div class="filter-button">
                    <a class="{{$tomorrowClass}}" data-range="tomorrow" href="{{$tomorrowLink}}">Завтра</a>
                </div>
                <div class="filter-button">
                    <a class="{{$weekendClass}}" data-range="weekend" href="{{$weekendLink}}">В выходные</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('content')

    <section id="events">
        <div class="section-title text-center">
            <h2>Афиша событий {{ $dateTitle }}</h2>
        </div>
        <div class="items-list">
            <div class="container">
                @if($events->count() > 0)
                <div class="row">
                    <div class="fake-row">
                        @foreach ($events as $event)
                        @include('modules.events', array('event' => $event))
                        @endforeach
                    </div>

                </div>
                @else
                <div class="row no-items" style="margin-bottom:50px;">
                    <p class="text-center w-100">Нет предстоящих событий</p>
                </div>
                @endif
            </div>
        </div>
    </section>
@endsection

@section('scripts')
    <script>

    </script>
@endsection
