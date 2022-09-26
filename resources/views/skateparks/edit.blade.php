@extends('admin.dashboard')

@section('dashboard-content')
    <h2>Ajouter un Skate Park</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if(isset($skatepark))
        <form action="{{ route('skateparks.destroy', $skatepark) }}" method="POST" enctype="multipart/form-data" id="delete_form">
            @method('DELETE')
            @csrf
        </form>
        <form class="grid grid-4" action="{{ route('skateparks.update', $skatepark) }}" method="POST" enctype="multipart/form-data" id="update_form">
            @method('PATCH')
    @else
        <form class="grid grid-4" action="{{ route('skateparks.store') }}" method="POST" enctype="multipart/form-data" id="create_form">
    @endif
            @csrf
            <div class="column-4">
                <label class="form-label" for="title">Nom<span class="color-primary">*</span></label>
                <input class="form-input" type="text" name="title" id="title" placeholder="Nom"
                       value="{{ $skatepark->title ?? old('title') }}">
            </div>
            <div class="column-4">
                <label class="form-label" for="image">Image</label>
                <button id="set_image" class="btn btn-small btn-primary" type="button">Choisir une image</button>
                <input type="file" id="image" name="image" hidden>
            </div>
            <div class="column-4">
                <img id="image_preview" class="border-small w-100" src="{{ isset($skatepark) ? $skatepark->getFirstMediaUrl('image') : old('image') }}" alt="Image du skate park"/>
            </div>
            <div class="column-4">
                <label class="form-label">Gallerie</label>
                <div id="gallery_preview" class="grid grid-5"></div>
            </div>
            <div class="column-4">
                <button id="add_gallery" class="btn btn-small btn-primary" type="button">Ajouter une image</button>
                <input type="file" name="gallery[]" id="gallery_input" accept="image/*" multiple hidden>
                <input type="hidden" name="galleryDelete[]" id="gallery_delete_container">
            </div>
            <div class="column-4">
                <label class="form-label" for="description">Description<span class="color-primary">*</span></label>
                <textarea class="form-input" type="text" name="description" id="description"
                          placeholder="Description">{{ $skatepark->description ?? old('description') }}</textarea>
            </div>
            <div class="column-4 column-sm-2">
                <label class="form-label" for="address">Adresse<span class="color-primary">*</span></label>
                <div class="input-list">
                    {{--                <span class="spinner"></span>--}}
                    <input class="form-input" type="text" name="address" id="address" placeholder="Adresse"
                           value="{{ $skatepark->address ?? old('address') }}"
                           autocomplete='off'>
                    {{--                <div class="spinner"></div>--}}
                    <ul id="address_autocomplete" class="autocomplete">
                    </ul>
                </div>
            </div>
            <div class="column-4 column-sm-1">
                <label class="form-label" for="city">Ville<span class="color-primary">*</span></label>
                <input class="form-input" type="text" name="city" id="city" placeholder="Ville"
                       value="{{ $skatepark->city ?? old('city') }}">
            </div>
            <div class="column-4 column-sm-1">
                <label class="form-label" for="postcode">Code Postal<span class="color-primary">*</span></label>
                <input class="form-input" type="text" name="postcode" id="postcode" placeholder="Code Postal"
                       value="{{ $skatepark->postcode ?? old('postcode') }}">
            </div>
            <div class="column-4">
                <label class="form-label" for="coordinates">Localisation<span
                        class="color-primary">*</span></label>
                <x-map class="border-small" name="location-selector"></x-map>
                <input type="hidden" name="coordinates" id="coordinates"
                       value="{{ $skatepark->coordinates ?? old('coordinates') }}">
            </div>
            {{--        <div class="column-3">--}}
            {{--            <h3>Optionnel</h3>--}}
            {{--        </div>--}}
{{--                    <div class="column-3 column-sm-1">--}}
{{--                        <label class="form-label" for="phone_number">Telephone</label>--}}
{{--                        <input class="form-input" type="text" name="phone_number" id="phone_number"--}}
{{--                               placeholder="Telephone"--}}
{{--                               value="{{ isset($skatepark->phone_number) ? $skatepark->phone_number : old('title') }}">--}}
{{--                    </div>--}}
            {{--        <div class="column-3 column-sm-1">--}}
            {{--            <label class="form-label" for="email">Adresse Email</label>--}}
            {{--            <input class="form-input" type="email" name="email" id="email" placeholder="Adresse Email">--}}
            {{--        </div>--}}
{{--                    <div class="column-3 column-sm-1">--}}
{{--                        <label class="form-label" for="date">Date de création</label>--}}
{{--                        <input class="form-input" type="date" name="date" id="date" placeholder=""--}}
{{--                               value="{{ isset($skatepark->date) ? $skatepark->date : old('title') }}">--}}
{{--                    </div>--}}
{{--                    <div class="column-3 column-sm-1">--}}
{{--                        <label class="form-label" for="date">Tarif</label>--}}
{{--                        <input class="form-input" type="text" name="date" id="date" placeholder="Tarif"--}}
{{--                               value="{{ isset($skatepark->price) ? $skatepark->price : old('title') }}">--}}
{{--                    </div>--}}
        </form>
        <div class="">
            <a href="{{ route('skateparks.index') }}" class="btn" type="button">Annuler</a>
            @if(isset($skatepark))
                <button class="btn btn-primary" type="submit" form="update_form">Mettre à jour</button>
                <button class="btn btn-primary" type="submit" form="delete_form">Supprimer</button>
            @else
                <button class="btn btn-primary" type="submit" form="create_form">Ajouter</button>
            @endif
        </div>
        @endsection

@push('scripts')
    <script>
        let medias = null;
        @if(isset($skatepark) && $skatepark->getMedia('gallery')->count() > 0)
            medias = @json($skatepark->getMedia('gallery')->toArray());
        @endif
    </script>
    <script src="{{ asset('js/admin/skatepark_edit.js') }}"></script>
@endpush
