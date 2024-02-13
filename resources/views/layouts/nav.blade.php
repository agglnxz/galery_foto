<header class="header-section">
    <div class="header-close">
        <i class="fa fa-times"></i>
    </div>
    <div class="header-warp">
        <a href="" class="site-logo">
            <img src="./img/logo.png" alt="">
        </a>
        <img src="img/menu-icon.png" alt="" class="menu-icon">
        <ul class="main-menu">
            <li class="{{request()->is('/') ? 'active' : ''}}"><a href="{{route('dashboard')}}">Home</a></li>
            <li class="{{request()->is('photo.index') ? 'active' : ''}}"><a href="{{route('photo.index')}}">Gallery</a></li>

            @if(auth()->check())
            <!-- Jika pengguna sudah login -->
            <li class="{{ request()->is('profile.index') ? 'active' : '' }}"><a href="{{ route('profile.index') }}">Profile</a></li>
            <li><a href="{{ route('logout') }}">Logout</a></li>
        @else
            <!-- Jika pengguna belum login -->
            <li class="{{ request()->is('login') ? 'active' : '' }}"><a href="{{ route('login') }}">Login</a></li>
        @endif
        </ul>
        {{-- <div class="social-links-warp">
            <div class="social-links">
                <a href=""><i class="fa fa-behance"></i></a>
                <a href=""><i class="fa fa-dribbble"></i></a>
                <a href=""><i class="fa fa-twitter"></i></a>
                <a href=""><i class="fa fa-facebook"></i></a>
                <a href=""><i class="fa fa-pinterest"></i></a>
            </div>
            <div class="social-text">Find us on</div>
        </div> --}}
    </div>
    <div class="copyright">gall 2024  @ All rights reserved</div>
</header>
