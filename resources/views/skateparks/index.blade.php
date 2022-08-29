@extends('admin.dashboard')

@section('dashboard-content')
    @if(session()->has('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
    @endif
    <div>
        <a class="btn btn-primary" href="{{ route('skateparks.create') }}">Ajouter un Skate Parc</a>
    </div>
    <div class="grid grid-3">
        @foreach($skateparks as $skatepark)
            <a class="card-small flex-column column-3 column-md-1"
{{--               style="background-image: url('{{ asset($skatepark->getFirstMediaUrl('image')) }}')"--}}
               href="{{ route('skateparks.edit', $skatepark) }}">
                <div class="card-header h-50" style="background-image: url('{{ asset($skatepark->getFirstMediaUrl('image')) }}')"></div>
                <div class="card-body p-7 d-flex align-items-center h-50">
                    <span class="text-center">{{ $skatepark->title }}</span>
{{--                    <button class="btn btn-primary">Editer</button>--}}
                </div>
            </a>
        @endforeach
    </div>
@endsection
