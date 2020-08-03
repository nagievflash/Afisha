@extends('layouts.app')

@section('title', 'Главная')

@section('header')

<!-- Put this script tag to the <head> of your page -->
<script type="text/javascript" src="https://vk.com/js/api/openapi.js?168"></script>

<script type="text/javascript">
  VK.init({apiId: 7557739, onlyWidgets: true});
</script>

@endsection

@section('content')

<section id="event_header" style="background-image:url({!! !empty($event->promo_image) ? Voyager::image($event->promo_image) : '' !!})">
    <div class="container">
        <div class="row">
            <div class="promo-header">
                <div class="event__age-restriction"><span>12</span></div>
                <div class="event__type"><span>{!! $event->categories()->first()->icons !!}</span> {{$event->categories()->first()->name}}</div>
                @if ($event->accessible_for_disabled_people)<div class="event__people_disabled">@include('assets.people_disabled') <span>Доступно для инвалидов</span></div>@endif
                <div class="event__tags">
                    @foreach ($event->tags as $tag)
                    <a class="item-tag" href="/tags/{{ $tag->slug}}">#{{$tag->title}}</a>
                    @endforeach
                </div>
            </div>
            <div class="promo-content">
                <div class="event__title"><h2>{{$event->title}}</h2></div>
                <div class="event__description"><p>{{$event->excerpt}}</p></div>
                <div class="event__organisator">Организатор: <a href="/organisations/{{$event->organisation->slug}}" class="organisation-link">{{$event->organisation->title}}</a></div>
            </div>
            <div class="promo-footer">
                <div class="col">
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <div class="row">
                                <a href="#schedule" class="event__accept">
                                    <span class="event-accept">Пойти</span>
                                    <span class="event-angle">@include('assets.angle')</span>
                                </a>
                                <div class="event__add-wishlist">@include('modules.add-to-wishlist', array('event_id' => $event->id))</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="content">
    <div class="container">
        <div class="row">
            <h2>О событии</h2>
            <div class="event-description col-12">
                <div class="row">
                    {!! $event->body !!}
                </div>
            </div>
        </div>
    </div>
</section>
<section class="schedule" id="schedule">
    <div class="container">
        <div class="row">
            <h2>Расписание</h2>
            @foreach ($event->schedules as $schedule)
            <div class="schedule-wrapper col-12">
                <div class="row align-items-center justify-content-between">
                    <div class="schedule-item d-flex align-items-end">
                        <div class="date">
                            {!!Date::parse($schedule->date)->format('\<\s\p\a\n \c\l\a\s\s\=\"\d\a\y\"\>d\<\/\s\p\a\n\> \<\s\p\a\n \c\l\a\s\s\=\"\m\o\n\t\h\"\>F\<\/\s\p\a\n\>')!!}
                            <span class="weekday">{{Date::parse($schedule->date)->format('l')}}</span>
                        </div>
                    </div>
                    <div class="schedule-item time-item">
                        <div class="time">
                            <span>{{Date::parse($schedule->time)->format('H:s')}}</span>
                        </div>
                    </div>
                    <div class="schedule-item location-item">
                        <div class="location">
                            <span class="icon-location">@include('assets.location')</span>{{$event->location}}
                        </div>
                    </div>
                    <div class="schedule-item ticket-item">
                        <div class="ticket">
                            <a href="ticket-buy">@php if ($schedule->price == 0) echo 'Бесплатно'; else echo $schedule->price.' рублей'; @endphp</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>


<section class="comments">
    <div class="container">
        <div class="row">
            <h2>Комментарии</h2>
        </div>
        <div class="row">
            <!--Comments block will be -->
            <div id="vk_comments">

            </div>

            <script type="text/javascript">
                VK.Widgets.Comments("vk_comments", {limit: 10, attach: "*"});
            </script>
        </div>
    </div>
</section>

<section class="similiar-events">
    <div class="items-list">
        <div class="container">
            <div class="row">
                <h2>Смотрите также</h2>
                <div class="fake-row">

                @foreach ($similiarEvents as $event)
                @include('modules.events', array('event' => $event))
                @endforeach
            </div>
        </div>
    </div>
</section>
@endsection

@section('scripts')
    <script>


    </script>

@endsection
