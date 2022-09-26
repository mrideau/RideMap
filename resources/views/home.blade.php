@extends('layouts.app')

@section('content')

    <div class="container-full">
        <section class="home_container hero_video">
            <video autoplay muted loop id="home_video" poster="/images/video_poster.jpg">
                <source src="videos/home.mp4" type="video/mp4">
            </video>
            <div class="overlay"></div>
            <div class="content">
                <h1 class="color-white">RIDE<span class="color-primary">MAP</span></h1>
                <p class="color-white">La carte qui référence les skates parcs en France.</p>
            </div>
        </section>

        <section class="home_container" id="comment-ça-fonctionne">
            <h2 class="section-title">Comment ça fonctionne ?</h2>
            <p class="section-description">Rends toi sur <a href="/carte" class="color-primary text-underline">la carte</a>, clique sur les différentes icônes en forme de rampe pour apercevoir le skate parc.</p>
            <div class="grid grid-md-1 grid-lg-2">
                <div class="column-1">
                    <img
                        class="card w-100 hover-zoom"
                        src="{{ url('/images/tutos/tuto_1.jpg') }}"
                        alt="Tuto ridemap 1"
                    />
                </div>
                <div class="column-1">
                    <img
                        class="card w-100 hover-zoom"
                        src="{{ url('/images/tutos/tuto_2.jpg') }}"
                        alt="Tuto ridemap 2"
                    />
                </div>
            </div>
        </section>

        <section class="home_container">
            <h2 class="section-title">Partenaires</h2>
            <p class="section-description">Ils nous soutiennent pour permettre de vous proposer la meilleure expérience
                possible.</p>
            <div class="sponsor-container bg-color-black">
                @foreach($sponsors as $sponsor)
                    <a class="sponsor-link" href="{{ $sponsor->website_url }}" target="_blank">
                        <img class="sponsor-logo hover-zoom" src="{{ $sponsor->getFirstMediaUrl('logo') }}"
                             alt="Logo {{ $sponsor->name }}">
                    </a>
                @endforeach
            </div>
        </section>
    </div>
@endsection
