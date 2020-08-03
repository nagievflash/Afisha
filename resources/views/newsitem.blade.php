@extends('layouts.app', ['bodyClass' => 'newsitem'])

@section('title', $item->title)

@section('header')

<!-- Put this script tag to the <head> of your page -->
<script type="text/javascript" src="https://vk.com/js/api/openapi.js?168"></script>

<script type="text/javascript">
  VK.init({apiId: 7557739, onlyWidgets: true});
</script>

@endsection

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



<section class="comments" style="margin-top:75px">
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


            </div>
        </div>
    </div>
</section>
@endsection

@section('scripts')
    <script>


    </script>

@endsection
