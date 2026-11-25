@php
    $isFeature = request()->is('comics/feature');
    $isFilter  = request()->is('comics/filter*');
    $isComics  = request()->is('comics', 'comics/*') && !$isFeature && !$isFilter;
@endphp

<nav class="navbar navbar-expand-lg bg-dark" data-bs-theme="dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('home') }}">ComicVault</a>

        <button class="navbar-toggler" type="button"
                data-bs-toggle="collapse" data-bs-target="#mainNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="mainNav">
            {{-- Left side --}}
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}"
                       href="{{ route('home') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('comics.*') ? 'active' : '' }}"
                       href="{{ route('comics.index') }}">Comics</a>
                </li>
            </ul>

            {{-- Right side --}}
            <ul class="navbar-nav ms-auto">
                @guest
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('login') ? 'active' : '' }}"
                           href="{{ route('login') }}">Log in</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('register') ? 'active' : '' }}"
                           href="{{ route('register') }}">Register</a>
                    </li>
                @endguest

                @auth
                    <li class="nav-item">
                        <span class="nav-link">{{ Auth::user()->name }}</span>
                    </li>
                    <li class="nav-item">
                        <form method="POST" action="{{ route('logout') }}" class="d-inline">
                            @csrf
                            <button class="nav-link btn btn-link">Log out</button>
                        </form>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>