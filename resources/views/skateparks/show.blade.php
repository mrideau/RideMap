@extends('layouts.app')

@section('title', config('app.name') . ' - ' . $skatepark->title)

@push('scripts')
    <script>
        const skateparkCoords = '{{$skatepark->coordinates}}';
    </script>
    <script type="text/javascript" src="/js/skatepark_show.js"></script>
@endpush

@section('content')
    <div class="jumbotron">
        <h1>Skate Parc</h1>
    </div>
    <div class="container">
        <div class="grid">
{{--            <div class="container-full card" style="background-image: url('/images/placeholder.jpg')">--}}
            <div class="container-full card" style="background-image: url('{{ $skatepark->getFirstMediaUrl('image') }}'); height: 300px">
                <div class="overlay"></div>
                <h2 class="">{{ $skatepark->city }}</h2>
                <h3 class="bg-color-black color-white p-3 px-6">{{ $skatepark->title }}</h3>
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
                <div class="card-small" style="background-image: url('/images/placeholder.jpg'); height: 300px">
                    <x-map class="border-small"></x-map>
                </div>
                <div>
                    <h3>Accès</h3>
                    <p>{{ $skatepark->address }}</p>
                    <p>{{ $skatepark->postcode }} {{ $skatepark->city }}</p>
                    <p>Coordonnées: {{ $skatepark->coordinates }}</p>
                </div>
            </div>
            <hr class="spacer">
            <p>Un erreur ? Une suggestion ? <a class="link" href="{{ route('contact') }}">Contactez-nous !</a></p>
        </div>
    </div>
@endsection
