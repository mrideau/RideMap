@extends('admin.dashboard')

@section('dashboard-content')
    <div>
        <a class="btn btn-primary" href="{{ route('skate-parcs.create') }}">Ajouter un Skate Parc</a>
    </div>
    <div class="grid grid-3">
        @foreach($skateparcs as $skateparc)
            <a class="card-small justify-content-center align-items-center" style="background-image: url('{{ asset('storage/skate_parcs/' . $skateparc->image_url) }}')" href="{{ route('skate-parcs.edit', $skateparc) }}">
                <span>{{ $skateparc->title }}</span>
            </a>
        @endforeach
    </div>
@endsection
