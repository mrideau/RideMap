@extends('layouts.app')

@section('content')
    <div class="jumbotron">
        <h1>Skate Parc</h1>
    </div>
    <div class="container">
        <div class="grid">
{{--            <div class="container-full card" style="background-image: url('/images/placeholder.jpg')">--}}
            <div class="container-full card" style="background-image: url('{{ $skatepark->getFirstMediaUrl('image') }}')">
                <h2>{{ $skatepark->city }}</h2>
                <h3 class="bg-color-black color-white">{{ $skatepark->title }}</h3>
            </div>
            <div class="grid grid-md-2">
                <div>
                    <h3>Description</h3>
                    <p>{{ $skatepark->description }}</p>
                </div>
                <div class="card-small" style="background-image: url('/images/placeholder.jpg'); height: auto">
                    <x-carousel>
                        @foreach($skatepark->getMedia('gallery') as $image)
                            <x-carousel-item>
                                {{ $image->img()->attributes(['class' => 'h-100 fit-cover']) }}
{{--                                <img src="" alt="">--}}
                            </x-carousel-item>
                        @endforeach
                    </x-carousel>
                </div>
            </div>
            <div class="grid grid-md-2">
                <div class="card-small" style="background-image: url('/images/placeholder.jpg'); height: auto"></div>
                <div>
                    <h3>Accès</h3>
                    <p>{{ $skatepark->address }}</p>
                    <p>{{ $skatepark->postcode }} {{ $skatepark->city }}</p>
                    <p>Coordonnées: {{ $skatepark->coordinates }}</p>
                    <h3>Contact</h3>
                    <p>Tel. : {{ $skatepark->phone_number }}</p>
                    <p>Site Internet: {{ $skatepark->website_url }}</p>
                    <h3>Tarif</h3>
                    <p>{{ $skatepark->price }}</p>
                </div>
            </div>
            <hr class="spacer">
            <hr class="spacer">
        </div>
    </div>
@endsection
