@extends('layouts.app')

@section('content')

<section id="events">
    <div class="section-title text-center">
        <h2>Моя афиша</h2>
    </div>
    <div class="items-list">
        <div class="container">
            <div class="row">
                <div class="fake-row">
                    @foreach (Auth::user()->getWishlist() as $event)
                    @include('modules.events', array('event' => $event))
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
