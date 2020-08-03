@extends('layouts.app')

@section('title', $item->title.' - карточка организации | Афиша городских мероприятий')

@section('content')

<section class="content">
    <div class="container">
        <div class="row">
            @if(session()->has('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
            @endif
            <h1>{{$item->title}}</h1>
        </div>

    </div>
</section>
<section class="company-description">
    <div class="container">
        <div class="row">
            <h2>Описание организации</h2>
            <div class="col-12">
                <div class="row">
                    {!! $item->description !!}
                </div>
            </div>
        </div>
    </div>
</section>
<section class="company-property">
    <div class="container">
        <div class="row">
            <h2>Реквизиты и другая информация</h2>
            <div class="col-12">
                <div class="row">
                    {!! $item->property !!}
                </div>
            </div>
        </div>
    </div>
</section>
<section class="company-location">
    <style>
        #map {
            height: 550px;
            width: 100%;
        }
    </style>

    <script type="application/javascript">
        function initMap() {
            @forelse($item->getCoordinates() as $point)
                var center = {lat: {{ $point['lat'] }}, lng: {{ $point['lng'] }}};
            @empty
                var center = {lat: {{ config('voyager.googlemaps.center.lat') }}, lng: {{ config('voyager.googlemaps.center.lng') }}};
            @endforelse
            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: {{ config('voyager.googlemaps.zoom') }},
                center: center
            });
            var markers = [];
            @foreach($item->getCoordinates() as $point)
                var marker = new google.maps.Marker({
                        position: {lat: {{ $point['lat'] }}, lng: {{ $point['lng'] }}},
                        map: map
                    });
                markers.push(marker);
            @endforeach
        }
    </script>
    <div id="map"/>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key={{ config('voyager.googlemaps.key') }}&callback=initMap"></script>
</section>
<section class="contact-form">
    <div class="container">
        <div class="row justify-content-start authenticate" >
            <h2>Есть вопросы? Напишите компании {{$item->title}}</h2>
            <form method="POST" action="/organisations/{{$item->slug}}" class="organisation-form row">
            <div class="contact-form-message"></div>
                @csrf
                <div class="col-md-5 col-sm-12">
                    <div class="input-group">
                        <label for="name" class="label">Ваше имя</label>
                        <input type="text" class="form-control " name="name" placeholder="Ваше имя" value="" required>
                    </div>

                    <div class="input-group">
                        <label for="tel" class="label">Номер телефона</label>
                        <input type="tel" class="form-control " name="tel" placeholder="Введите ваш номер телефона для связи" value="" required>
                    </div>
                </div>
                <div class="col-md-1 col-sm-12"></div>

                <div class="col-md-6 col-sm-12">
                    <div class="input-group">
                        <label for="message" class="label">Сообщение</label>
                        <textarea class="form-control" rows="6" name="message" placeholder="Введите текст сообщения" value="" required ></textarea>
                    </div>
                </div>


                <div class="col-12">
                    <div class="input-group mb-0">
                        <button type="submit" class="btn btn-yellow">
                            Отправить
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection

@section('scripts')
    <script>

    </script>

@endsection
