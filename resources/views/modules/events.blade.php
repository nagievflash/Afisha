@php
    $schedule = $event->schedules()->get();
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
    <a href="/events/{{ $event->slug }}" class="item-price">{{ $price }}</a>
    @endif
    <div class="item-wrapper">
        <a href="/events/{{ $event->slug }}" class="item-link"><div class="item-background" style="background-image:url({{ Voyager::image( $event->image ) }})"></div></a>
        <div class="item-image">
            <div class="item-header d-flex justify-content-between">
                <div class="item-tags">
                    @foreach ($event->tags as $tag)
                    <a class="item-tag" href="/tags/{{ $tag->slug}}">#{{$tag->title}}</a>
                    @endforeach
                </div>
                <div class="item-wishlist">@include('modules.add-to-wishlist', array('event_id' => $event->id))</div>
            </div>
        </div>
        <div class="item-content">
            <h3 class="item-title">{{ $event->title }}</h3>
            <div class="item-info d-flex justify-content-between">
                <div class="item-date">@include('assets.calendar')<span>{{ $date }}</span></div>
                <div class="item-location">@include('assets.location')<span>{{ $event->location }}</span></div>
            </div>
        </div>
    </div>
</div>
@endif
