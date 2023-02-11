<nav class="navbar navbar-expand-lg bg-light sticky-top">
    <div class="container-fluid">
        <a class="navbar-brand" href=""><i class="fa-solid fa-shop fs-1"></i></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-between" id="navbarNavDropdown">
            <ul class="navbar-nav text-center">
                <li class="nav-item"><a href="{{ route('home') }}" class="nav-link {{ $current == 'Home' ? $slot : '' }}">Home</a></li>
                <li class="nav-item"><a href="{{ route('about') }}" class="nav-link {{ $current == 'About' ? $slot : '' }}" >about</a></li>
                <li class="nav-item"><a href="{{ route('gallery') }}" class="nav-link {{ $current == 'Gallery' ? $slot : '' }}" >gallery</a></li>
                @can('admin')
                    <li class="nav-item"><a class="nav-link {{ $current == 'Pesanan' ? $slot : '' }}"  href="{{ route('pesananIndex') }}">pesanan</a></li>
                    <li class="nav-item"><a class="nav-link {{ $current == 'Stock' ? $slot : '' }}" href="{{ route('stock.index') }}">stock</a></li>
                @endcan
            </ul>
            @auth
                <ul class="navbar-nav text-center dropdon">
                    <li class="nav-item"><a href="{{ route('userDetail', Auth::user()->email ?? 0) }}" class="fs-5 nav-link {{ $current == 'User' ? $slot : '' }}"><i class="fa-regular fa-user"></i> {{ Auth::user()->nama ?? 'tidak ada nama' }}</a></li>
                </ul>
            @endauth
            @guest
                <ul class="navbar-nav text-center">
                    <li class="nav-item"><i class="fa-regular fa-address-card nav-link fs-2"></i></li>
                    <li class="nav-item"><a href="{{ route('login') }}" class="nav-link link-auth fs-5 {{ $current == 'Login' ? $slot : '' }}">Login</a></li>
                    <li class="nav-item"><a href="{{ route('register') }}" class="nav-link link-auth fs-5 {{ $current == 'Register' ? $slot : '' }}">Daftar</a></li>
                </ul>
            @endguest
        </div>
    </div>
</nav>
