<header class="header">
    <a class="nav-brand" href="{{ route('home') }}"><span>Ride</span><span class="color-primary">Map</span></a>
    <div class="burger-menu">
        <span class="bar"></span>
        <span class="bar"></span>
        <span class="bar"></span>
    </div>
    <nav class="navbar">
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
    </nav>
</header>
<script>
    document.querySelector('.burger-menu').addEventListener('click', () => {
        document.querySelector('.navbar').classList.toggle('active');
        document.querySelector('.burger-menu').classList.toggle('active');
    });
</script>
