@extends('layouts.app')

@section('title', 'Главная')

@section('content')
    <div class="hero-slider">
        <div id="slider">
            <div class="slider-inner">
                <div id="slider-content">
                    <div class="meta">Species</div>
                    <h2 id="slide-title">
                        Amur <br />
                        Leopard
                    </h2>
                    <span data-slide-title="0">
                        Amur <br />
                        Leopard
                    </span>
                    <span data-slide-title="1">
                        Asiatic <br />
                        Lion
                    </span>
                    <span data-slide-title="2">
                        Siberian <br />
                        Tiger
                    </span>
                    <span data-slide-title="3">
                        Brown <br />
                        Bear
                    </span>
                    <div class="meta">Status</div>
                    <div id="slide-status">Critically Endangered</div>
                    <span data-slide-status="0">Critically Endangered</span>
                    <span data-slide-status="1">Endangered</span>
                    <span data-slide-status="2">Endangered</span>
                    <span data-slide-status="3">Least Concern</span>
                </div>
            </div>

            <img src="/images/leopard2.jpg" />
            <img src="/images/lion2.jpg" />
            <img src="/images/tiger2.jpg" />
            <img src="/images/bear2.jpg" />

            <div id="pagination">
                <button class="active" data-slide="0"></button>
                <button data-slide="1"></button>
                <button data-slide="2"></button>
                <button data-slide="3"></button>
            </div>
        </div>
    </div>
@endsection
