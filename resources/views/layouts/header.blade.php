<div class="header">
    <nav class="navbar justify-content-between">
        <ul class="nav-menu">
            <li class="nav-item">
                <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" href="{{ url('/') }}">Accueil</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->is('carte') ? 'active' : '' }}" href="{{ url('/carte') }}">Carte</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->is('contact') ? 'active' : '' }}" href="{{ url('/contact') }}">Contact</a>
            </li>
        </ul>
        @auth()
            <a href="{{ route('login.logout') }}">Deconnexion</a>
        @endauth
    </nav>
</div>
