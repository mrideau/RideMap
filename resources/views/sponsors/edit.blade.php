@extends('admin.dashboard')

@section('dashboard-content')
    <h2>{{ $sponsor->name }}</h2>
    <img src="{{ $sponsor->getFirstMediaUrl('logo') }}" alt="">
    <form
        action="{{ route('sponsors.destroy', $sponsor) }}"
        method="post"
        enctype="multipart/form-data"
    >
        @method('DELETE')
        @csrf

        <input
            class="btn btn-primary"
            type="submit"
            value="Supprimer"
        >
    </form>
@endsection
