@extends('layouts.app', ['bodyClass' => 'error'])

@section('title', 'Ошибка. Страница не найдена.')

@section('content')

<section class="error-404" style="">
    <div class="container">
        <div class="row justify-content-center flex-column">
            <img src="/images/sleeping-kitten.gif" class="fourohfour-gif m-auto">
            <p class="milli text-center">Страница не найдена. В можете вернуться <a href="/">на главную</a> страницу.</p>
        </div>
    </div>
</section>
@endsection

@section('scripts')
    <script>


    </script>

@endsection
