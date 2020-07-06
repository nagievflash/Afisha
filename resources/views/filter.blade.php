@extends('layouts.app')

@section('title', 'Главная')

@section('filter')

<div class="row justify-content-stretch top-filter">
    <div class="form-group search-calendar">
        <div class="col row no-gutter">
            <div class="d-flex justify-content-start filter-wrapper">
                <div class="input-group">
                    <input type="text" name="range" value="{{$from}} - {{$to}}" placeholder="Выберите дату" class="form-control range-input" />
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

    <section id="events">
        <div class="section-title text-center">
            <h2>Афиша событий {{ $dateTitle }}</h2>
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
    </script>
@endsection
