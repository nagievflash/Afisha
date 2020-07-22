@extends('layouts.app')

@section('title', $page->title.' в г. Муравленко ')

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
    <section id="concert">
        <div class="section-title text-center">
            <h2>{{$page->title}}</h2>
        </div>
        <div class="items-list">
            <div class="container">
                <div class="row">
                    @if (!$events->isEmpty())
                        <div class="fake-row">
                        @foreach ($events as $event)
                        @include('modules.events', array('event' => $event))
                        @endforeach
                        </div>

                    @else
                        <div class="fake-row no-items">
                            <p class="text-center w-100">Нет предстоящих событий</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>

    @isset($promo)
    @include('modules.promo', array('promo' => $promo))
    @endisset
    <section id="events">
        <div class="section-title text-center">
            <h2>Ближайшие события</h2>
        </div>
        <div class="items-list">
            <div class="container">
                <div class="row">
                    <div class="fake-row">
                        @foreach ($nearest as $event)
                        @include('modules.events', array('event' => $event))
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
    <script>

    </script>
@endsection
