@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="grid">
            <div class="container-full card" style="background-image: url('/images/placeholder.jpg')">
                <span>{{ $skateparc->city }}</span>
                <span>{{ $skateparc->title }}</span>
            </div>
            <div class="grid grid-md-2">
                <div>
                    <h3>Description</h3>
                    <p>{{ $skateparc->description }}</p>
                </div>
                <div class="card-small" style="background-image: url('/images/placeholder.jpg')"></div>
            </div>
            <div class="grid grid-md-2">
                <div class="card-small" style="background-image: url('/images/placeholder.jpg')"></div>
                <h3>Accès</h3>
{{--                <p>{{ $skateparc->description }}</p>--}}
{{--                <h3>Contact</h3>--}}
{{--                <h3>Tarif</h3>--}}
            </div>
            <hr class="spacer">
            <hr class="spacer">
        </div>
    </div>
@endsection
