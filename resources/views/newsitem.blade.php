@extends('layouts.app', ['bodyClass' => 'newsitem'])

@section('title', $item->title)

@section('content')

<section id="event_header" style="background-image:url({!! !empty($item->image_detail) ? Voyager::image($item->image_detail) : '' !!})">
    <div class="container">
        <div class="row">
            <div class="promo-header">
                <div class="event__type"><a href="{{route('news')}}">Все новости</a></div>

            </div>
            <div class="promo-content">
                <div class="event__title"><h2>{{$item->title}}</h2></div>
                <div class="news__tags">
                    @foreach ($item->tags as $tag)
                    <a class="news-tag" href="/tags/{{ $tag->slug}}">#{{$tag->title}}</a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
<section class="content">
    <div class="container">
        <div class="row">
            <div class="event-description col-12">
                <div class="row">
                    {!! $item->body !!}
                </div>
            </div>
        </div>
    </div>
</section>

<section class="similiar-events">
    <div class="items-list">
        <div class="container">
            <div class="row">
                <h2>Смотрите также</h2>
                <div class="fake-row">


            </div>
        </div>
    </div>
</section>
@endsection

@section('scripts')
    <script>


    </script>

@endsection
