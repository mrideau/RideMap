@extends('layouts.app')

@section('content')
    <div class="container grid">
        <h1>Dashboard</h1>
        <nav class="navbar">
            <ul class="nav-menu">
                <li class="nav-item">
                    <a href="{{ route('admin.dashboard') }}" class="nav-link">Accueil</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('skate-parcs.index') }}" class="nav-link">Skate Parcs</a>
                </li>
            </ul>
        </nav>
        @hasSection('dashboard-content')
            @yield('dashboard-content')
        @else

        @endif
    </div>
@endsection
