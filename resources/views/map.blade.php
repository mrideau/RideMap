@extends('layouts.app')

@push('head')
{{--    <!-- Leaflet -->--}}
{{--    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.8.0/dist/leaflet.css"--}}
{{--          integrity="sha512-hoalWLoI8r4UszCkZ5kL8vayOGVae1oxXe/2A4AO6J9+580uKHDO3JdHb7NzwwzK5xr/Fs0W40kiNHxM9vyTtQ=="--}}
{{--          crossorigin=""/>--}}
@endpush

@push('scripts')
    <script>
        const skateparks = @json($skateparks);
    </script>
    <script type="text/javascript" src="{{ asset('js/map.js') }}" defer></script>
@endpush

@section('content')
    <div class="map-container">
        <div class='map-popup'>
            <button class="map-popup-close" role="button">×</button>
            <img class="map-popup-image" src="/images/placeholder.jpg" alt="Photo du skatepark">
            <div class="map-popup-content">
                <h2 class="map-popup-content-title">Titre</h2>
                <p class="map-popup-content-description">Description</p>
                <a href="" class="map-popup-content-link btn btn-primary">Voir</a>
            </div>
        </div>
        <x-map></x-map>
    </div>
@endsection
