@extends('layouts.app')

@section('title', 'Connexion')

@section('content')

<div class="container">
    <div class="grid">
        <h1>Connexion</h1>
        <p>Cette page est dédié aux administrateur du site. <br> Si vous êtes arrivé ici par erreur veuillez retourner sur la <a class="link" href="{{ url('/') }}">page d'accueil</a>.</p>
        <form class="grid" action="{{ route('login.store')  }}" method="POST">
            @csrf
            <div class="column">
                <label class="form-label" for="email">Adresse Email</label>
                <input class="form-input" type="email" name="email" id="email" placeholder="Adresse email" value="{{ old('email')  }}">
                @error('email')
                    <span class="color-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="column">
                <label class="form-label" for="password">Mot de passe</label>
                <input class="form-input" type="password" name="password" id="password" placeholder="Mot de passe">
                @error('password')
                    <span class="color-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="column">
                <label for="stay_logged">Rester connecté ?</label>
                <input type="checkbox" name="stay_logged" id="stay_logged">
            </div>
            <button class="btn btn-primary" type="submit">Connexion</button>
        </form>
        @error('login')
            <span class="color-danger">{{ $message }}</span>
        @enderror
    </div>
</div>

@endsection
