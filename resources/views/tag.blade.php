@extends('layouts.app')

@section('title', 'Все события по хештегу #'.$tag)

@section('content')

<section class="similiar-events">
    <div class="items-list">
        <div class="container">
            <div class="row">
                <h2>Все события по хештегу #{{$tag}}</h2>
            </div>
            @if($events->count() > 0)
            <div class="row">
                @foreach ($events as $event)
                @include('modules.events', array('event' => $event))
                @endforeach
            </div>
            @else
            <div class="row no-items">
                <p class="text-center w-100">Нет предстоящих событий</p>
            </div>
            @endif
        </div>
    </div>
</section>
@if ($news->count() > 0)
<section class="news-list">
    <div class="container">
        <div class="row"><h2 class="">Все новости по хештегу #{{$tag}}</h2></div>
        <div class="row news-item">

                @foreach ($news as $item)
                    <div class="col-md-4">
                        <div class="row h-100">
                            <div class="news-item__image" style="background-image:url({!! !empty($item->image) ? Voyager::image($item->image) : '/images/news-list_union.png' !!})">
                                <img src="/images/news-list_union.png" />
                            </div>
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="row news-item__content h-100 flex-column">
                            <div class="news-item__created">
                                <p>{{Date::parse($item->created_at)->format('d F Y')}} г.</p>
                            </div>
                            <div class="news-item__title">
                                <h3><a href="/news/{{$item->slug}}">{{$item->title}}</a></h3>
                            </div>
                            <div class="news-item__excerpt">
                                <p>{{$item->excerpt}}</p>
                            </div>
                            <div class="news__tags">
                                @foreach ($item->tags as $tag)
                                <a class="news-tag" href="/tags/{{ $tag->slug}}">#{{$tag->title}}</a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="col-md-1">

                    </div>
                @endforeach
        </div>
    </div>
</section>
@endif
@endsection

@section('scripts')
    <script>


    </script>

@endsection
