@extends('layouts.app')

@section('title', 'Новости | Афиша городских мероприятий')

@section('content')

<section class="content">
    <div class="container">
        <div class="row">
            <h2 class="text-center news-section-title">Новости</h2>
        </div>
        @if (!empty($tags))
        <div class="row news__tags justify-content-center">
            @foreach ($tags as $tag)
            <a class="news-tag" href="/tags/{{ $tag->slug}}">#{{$tag->title}}</a>
            @endforeach
        </div>
        @endif
    </div>
</section>

<section class="news-list">
    <div class="container">
        <div class="row news-item">
            @if (!empty($news))
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
            @endif
        </div>
    </div>
</section>
@endsection

@section('scripts')
    <script>


    </script>

@endsection
