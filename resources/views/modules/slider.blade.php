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
                    @if ($event->accessible_for_disabled_people)<div class="event__people_disabled">@include('assets.people_disabled') <span>Доступно для инвалидов</span></div>@endif
                    <div class="event__type"><span>{!! $event->categories()->first()->icons !!}</span> {{$event->categories()->first()->name}}</div>
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
                                    <div class="event__add-wishlist">@include('modules.add-to-wishlist', array('event_id' => $event->id))</div>
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
                    <div class="event__type"><span>{!! $event->categories()->first()->icons !!}</span> {{$event->categories()->first()->name}}</div>
                    @if ($event->accessible_for_disabled_people)<div class="event__people_disabled">@include('assets.people_disabled') <span>Доступно для инвалидов</span></div>@endif
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
                                    <div class="event__add-wishlist">@include('modules.add-to-wishlist', array('event_id' => $event->id))</div>
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
        <img src="{{Voyager::image( $event->thumbnail('cropped', 'slider_image') )}}" />
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
