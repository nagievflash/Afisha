@extends('layouts.app')

@section('title', 'Поиск событий в г. Муравленко')


@section('content')

    <section id="search-results">
        @if (count($events) > 0)
        <div class="section-title text-center">
            <h2>События</h2>
        </div>
        <div class="items-list">
            <div class="container">
                <div class="row">
                    <div class="fake-row">
                        @foreach ($events as $event)
                        @include('modules.events', array('event' => $event))
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        @else
        <div class="section-title text-center">
            <h2>По вашему запросу ничего не найдено</h2>
        </div>
        @endif
    </section>
@endsection

@section('scripts')
    <script>

    </script>
@endsection
