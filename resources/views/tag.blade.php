@extends('layouts.app')

@section('title', 'Главная')

@section('content')

<section class="similiar-events">
    <div class="items-list">
        <div class="container">
            <div class="row">
                <h2>Все события по хештегу #{{$tag}}</h2>
                <div class="fake-row">

                @foreach ($events as $event)
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
