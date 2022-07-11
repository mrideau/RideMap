@extends('admin.dashboard')

@section('dashboard-content')
    <h2>Ajouter un Skate Parc</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if(isset($skateparc))
        <form class="grid grid-4" action="{{ route('skate-parcs.update', $skateparc) }}" method="POST" enctype="multipart/form-data">
        @method('PUT')
    @else
        <form class="grid grid-4" action="{{ route('skate-parcs.store') }}" method="POST" enctype="multipart/form-data">
    @endif

        @csrf
        <div class="column-4">
            <label class="form-label" for="title">Nom<span class="color-primary">*</span></label>
            <input class="form-input" type="text" name="title" id="title" placeholder="Nom" value="{{ isset($skateparc->title) ? $skateparc->title : old('title') }}">
        </div>
        <div class="column-4">
            <label class="form-label" for="image">Image</label>
            <input type="file" id="image" name="image">
        </div>
            <div class="column-4">
                <label class="form-label" for="gallery">Gallerie</label>
{{--                <input type="file" id="gallery" name="gallery">--}}
                <button class="btn btn-small btn-primary">Ajouter une image</button>
                <div class="grid grid-5">
                    <div class="column-1">
                        <img src="/images/placeholder.jpg" alt="" style="width: 100%">
{{--                        <button>x</button>--}}
                    </div>
                </div>
            </div>
        <div class="column-4">
            <label class="form-label" for="description">Description<span class="color-primary">*</span></label>
            <textarea class="form-input" type="text" name="description" id="description" placeholder="Description">{{ isset($skateparc->description) ? $skateparc->description : old('title') }}</textarea>
        </div>
        <div class="column-4 column-sm-2">
            <label class="form-label" for="address">Adresse<span class="color-primary">*</span></label>
            <div class="input-list">
{{--                <span class="spinner"></span>--}}
                <input class="form-input" type="text" name="address" id="address" placeholder="Adresse" value="{{ isset($skateparc->address) ? $skateparc->address : old('title') }}">
                <ul id="address_autocomplete" class="autocomplete d-none">
                </ul>
            </div>
        </div>
        <div class="column-4 column-sm-1">
            <label class="form-label" for="city">Ville<span class="color-primary">*</span></label>
            <input class="form-input" type="text" name="city" id="city" placeholder="Ville" value="{{ isset($skateparc->city) ? $skateparc->city : old('title') }}">
        </div>
        <div class="column-4 column-sm-1">
            <label class="form-label" for="postcode">Code Postal<span class="color-primary">*</span></label>
            <input class="form-input" type="text" name="postcode" id="postcode" placeholder="Code Postal" value="{{ isset($skateparc->postcode) ? $skateparc->postcode : old('postcode') }}">
        </div>
        <div class="column-3">
            <label class="form-label" for="coordinates">Localisation<span class="color-primary">*</span></label>
            <x-map name="location-selector" script="none"></x-map>
            <input type="hidden" name="coordinates" id="coordinates" value="{{ isset($skateparc->coordinates) ? $skateparc->coordinates : old('coordinates') }}">
        </div>
{{--        <div class="column-3">--}}
{{--            <h3>Optionnel</h3>--}}
{{--        </div>--}}
        <div class="column-3 column-sm-1">
            <label class="form-label" for="phone_number">Telephone</label>
            <input class="form-input" type="text" name="phone_number" id="phone_number" placeholder="Telephone" value="{{ isset($skateparc->phone_number) ? $skateparc->phone_number : old('title') }}">
        </div>
{{--        <div class="column-3 column-sm-1">--}}
{{--            <label class="form-label" for="email">Adresse Email</label>--}}
{{--            <input class="form-input" type="email" name="email" id="email" placeholder="Adresse Email">--}}
{{--        </div>--}}
        <div class="column-3 column-sm-1">
            <label class="form-label" for="date">Date de création</label>
            <input class="form-input" type="date" name="date" id="date" placeholder="" value="{{ isset($skateparc->date) ? $skateparc->date : old('title') }}">
        </div>
        <div class="column-3 column-sm-1">
            <label class="form-label" for="date">Tarif</label>
            <input class="form-input" type="text" name="date" id="date" placeholder="Tarif" value="{{ isset($skateparc->price) ? $skateparc->price : old('title') }}">
        </div>
        <div class="column-3">
            <a href="{{ route('skate-parcs.index') }}" class="btn" type="submit">Annuler</a>
            @if(isset($skateparc))
                <button class="btn btn-primary" type="submit">Mettre à jour</button>
                <form action="{{ route('skate-parcs.destroy', $skateparc) }}" enctype="multipart/form-data">
                    @method('DELETE')
                    <button class="btn btn-primary" type="submit">Supprimer</button>
                </form>
            @else
                <button class="btn btn-primary" type="submit">Ajouter</button>
            @endif
        </div>
    </form>
@endsection

@push('scripts')
    <script src="{{ asset('js/map-selector.js') }}"></script>
@endpush
