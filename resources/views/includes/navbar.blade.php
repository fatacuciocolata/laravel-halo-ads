<div class="navbar">
    <div class="container">
        <ul class="nav-left">
            <li class="nav-item">
                <a class="nav-link logo" href="{{ url('/') }}">Halo ads</a>
            </li>
        </ul>
        <ul class="nav-right">
            @guest
            <li class="nav-item">
                <a class="nav-link" href="{{ route('login') }}">Login</a>
            </li>
            @if (Route::has('register'))
            <li class="nav-item">
                <a class="nav-link" href="{{ route('register') }}">Register</a>
            </li>
            @endif
            @else
            <li class="nav-item add">
                <a class="nav-link" href="{{ url('/ads/create') }}">
                    Adauga anunt nou
                </a>
            </li>
            <li class="dropdown nav-item">
                <a class="dropbtn nav-link dropdown-toggle" href="#" data-toggle="dropdown">Contul meu</a>
                <ul class="dropdown-content">
                    <li class="nav-item"><a class="nav-link"href="{{ url('/ads') }}">Anunturile mele</a></li>
                    <li class="nav-item"><a class="nav-link"href="{{ route('profile') }}">Profil</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('logout') }}">Logout</a></li>
                </ul>
            </li>
            @endguest
        </ul>
</div>

</div>