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
                    <a href="{{ route('skateparks.index') }}" class="nav-link">Skate Parks</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('sponsors.index') }}" class="nav-link">Partenaires</a>
                </li>
            </ul>
        </nav>
        @hasSection('dashboard-content')
            @yield('dashboard-content')
        @else
            <span>Bonjour {{ auth()->user()->name }} !</span>
            <div>
                <a class="btn btn-primary" href="{{ route('login.logout') }}">Deconnexion</a>
            </div>
        @endif
    </div>
@endsection
