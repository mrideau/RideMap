@extends('admin.dashboard')

@section('dashboard-content')
    <div>
        <a class="btn btn-primary" href="{{ route('sponsors.create') }}">Ajouter un Partenaire</a>
    </div>
    <div class="grid">
    @foreach($sponsors as $sponsor)
            <a class="" href="{{ route('sponsors.edit', $sponsor) }}">
{{--                <img src="{{ $sponsor->getFirstMediaUrl('logo') }}" alt="Logo {{ $sponsor->name }}">--}}
                {{ $sponsor->name }}
            </a>
    @endforeach
    </div>
@endsection
