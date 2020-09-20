@php
    $schedule = $promo->schedules()->get();
    if ($shcedule->count() > 0):
        if ($schedule->first()):
            $date = Date::parse($schedule->first()->date)->format('d F').' '.Date::parse($schedule->first()->time)->format('H:i');
            $price = $schedule->first()->price;
            if ($price && $price != 0) {
                $price .= ' Рублей';
            }
            else $price = false;
@endphp

<section id="promo" style="background-image:url({{ Voyager::image( $promo->promo_image ) }})">
    <div class="container">
        <div class="promo-header">
            <div class="event__age-restriction"><span>{{$promo->age}}</span></div>
            <div class="event__type"><span>{!! $promo->categories()->first()->icons !!}</span> {{$promo->categories()->first()->name}}</div>
            @if ($promo->accessible_for_disabled_people)<div class="event__people_disabled">@include('assets.people_disabled') <span>Доступно для инвалидов</span></div>@endif
            <div class="event__tags">
                @foreach ($promo->tags as $tag)
                <a class="event__tag" href="/tags/{{ $tag->slug}}">#{{$tag->title}}</a>
                @endforeach
            </div>
        </div>
        <div class="promo-content">
            <div class="event__title"><h2>{{$promo->title}}</h2></div>
            <div class="event__description"><p>{{$promo->excerpt}}...</p></div>
        </div>
        <div class="promo-footer">
            <div class="col">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <div class="row">
                            <div class="event__date"><span class="icon-calendar">@include('assets.calendar')</span>{{ $date }}</div>
                            <div class="event__location"><span class="icon-location">@include('assets.location')</span>{{ $promo->location }}</div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="row">
                            <a href="/events/{{$promo->slug}}" class="event__accept ml-auto">
                                <span class="event-accept">Пойти</span>
                                <span class="event-angle">@include('assets.angle')</span>
                            </a>
                            <div class="item-wishlist">@include('modules.add-to-wishlist', array('event_id' => $promo->id))</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
    @endif
@endif
