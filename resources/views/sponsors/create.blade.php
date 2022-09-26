@extends('admin.dashboard')

@section('dashboard-content')
    <p>Le logo du partenaire doit impérativement être de couleur blanche !</p>
    <form
        action="{{route('sponsors.store')}}"
        method="post"
        enctype="multipart/form-data"
    >
        @csrf

        <label for="name">Nom</label>
        <input
            type="text"
            name="name"
            id="name"
            value="{{ $sponsor->name ?? old('name') }}"
        >

        <label for="website_url">Site</label>
        <input
            type="text"
            name="website_url"
            id="website_url"
            value="{{ $sponsor->website_url ?? old('website_url') }}"
        >

        <label for="logo">Logo<span>*</span></label>
        <input
            type="file"
            name="logo"
            id="logo"
        >

        <input
            type="submit"
            value="Valider"
        >
    </form>
@endsection
