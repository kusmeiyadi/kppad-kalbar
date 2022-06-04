<header>
    <div class="container-menu-desktop bg0">
        <div class="topbar">
            <div class="content-topbar container h-100">
                <div class="left-topbar">
                    <a href="#" class="left-topbar-item">
                        {{-- Komisioner --}}
                    </a>
                </div>
                <div class="right-topbar">
                    <a href="#"><span class="fab fa-facebook-f"></span></a>
                    <a href="#"><span class="fab fa-instagram"></span></a>
                    <a href="#"><span class="fab fa-twitter"></span></a>
                    <a href="#"><span class="fab fa-youtube"></span></a>
                </div>
            </div>
        </div>
        <div class="wrap-header-mobile">
            <div class="logo-mobile">
                <a href="index.html"><img src="{{ asset('magnews2/images/icons/logo-04.png') }}" alt="IMG-LOGO"></a>
            </div>
            <div class="btn-show-menu-mobile hamburger hamburger--squeeze m-r--8">
                <span class="hamburger-box">
                    <span class="hamburger-inner"></span>
                </span>
            </div>
        </div>
        <div class="menu-mobile">
            <ul class="topbar-mobile">
                <li class="left-topbar">
                    <span class="left-topbar-item flex-wr-s-c">
                        <span>
                            Pontianak, Indonesia
                        </span>

                        <img class="m-b-1 m-rl-8" src="{{ asset('magnews2/images/icons/icon-night.png') }}" alt="IMG">

                        <span>
                            HI 58° LO 56°
                        </span>
                    </span>
                </li>
                <li class="left-topbar">
                    <a href="#" class="left-topbar-item">
                        About
                    </a>
                    <a href="#" class="left-topbar-item">
                        Contact
                    </a>
                    <a href="#" class="left-topbar-item">
                        Sing up
                    </a>
                    <a href="#" class="left-topbar-item">
                        Log in
                    </a>
                </li>
                <li class="right-topbar">
                    <a href="#">
                        <span class="fab fa-facebook-f"></span>
                    </a>
                    <a href="#">
                        <span class="fab fa-twitter"></span>
                    </a>
                    <a href="#">
                        <span class="fab fa-pinterest-p"></span>
                    </a>
                    <a href="#">
                        <span class="fab fa-vimeo-v"></span>
                    </a>
                    <a href="#">
                        <span class="fab fa-youtube"></span>
                    </a>
                </li>
            </ul>
            <ul class="main-menu-m">
                <li>
                    <a href="{{ route('user.beranda') }}">Beranda</a>
                </li>
                <li>
                    <a href="#">Pengaduan</a>
                    <ul class="sub-menu-m">
                        <li><a href="{{ route('user.pengaduan-online') }}">Pengaduan Online</a></li>
                        <li><a href="{{ route('user.tracking-pengaduan') }}">Monitoring Pengaduan</a></li>
                    </ul>
                    <span class="arrow-main-menu-m">
                        <i class="fa fa-angle-right" aria-hidden="true"></i>
                    </span>
                </li>
                <li>
                    <a href="#">Data</a>
                    <ul class="sub-menu-m">
                        <li><a href="{{ route('tabulasi-data') }}">Data Perlindungan Anak</a></li>
                        <li><a href="{{ route('regulasi-anak') }}">Regulasi</a></li>
                    </ul>
                    <span class="arrow-main-menu-m">
                        <i class="fa fa-angle-right" aria-hidden="true"></i>
                    </span>
                </li>
                <li>
                    <a href="{{ route('user.hubungi-kami') }}">Hubungi Kami</a>
                </li>
            </ul>
        </div>
        <div class="wrap-logo container">
            <div class="logo">
                <a href="index.html"><img src="{{ asset('magnews2/images/icons/logo-04.png') }}" alt="LOGO"></a>
            </div>
        </div>
        <div class="wrap-main-nav">
            <div class="main-nav">
                <nav class="menu-desktop">
                    <a class="logo-stick" href="index.html">
                        <img src="{{ asset('magnews2/images/icons/logo-04.png') }}" alt="LOGO">
                    </a>
                    <ul class="main-menu">
                        <li class="none {{ (request()->routeIs('user.beranda')) ? 'main-menu-active' : '' }}">
                            <a href="{{ route('user.beranda') }}">Beranda</a>
                        </li>
                        <li
                            class="none {{ (request()->routeIs('user.pengaduan-online','track-online.index')) ? 'main-menu-active' : '' }}">
                            <a href="#">Pengaduan</a>
                            <ul class="sub-menu">
                                <li><a href="{{ route('user.pengaduan-online') }}">Pengaduan Online</a></li>
                                <li><a href="{{ route('user.tracking-pengaduan') }}">Monitoring Pengaduan</a></li>
                            </ul>
                        </li>
                        <li
                            class="none {{ (request()->routeIs('tabulasi-data','regulasi-anak')) ? 'main-menu-active' : '' }}">
                            <a href="#">Data</a>
                            <ul class="sub-menu">
                                <li><a href="{{ route('tabulasi-data') }}">Data Perlindungan Anak</a></li>
                                <li><a href="{{ route('regulasi-anak') }}">Regulasi</a></li>
                            </ul>
                        </li>
                        <li class="none {{ (request()->routeIs('user.hubungi-kami')) ? 'main-menu-active' : '' }}">
                            <a href="{{ route('user.hubungi-kami') }}">Hubungi Kami</a>
                        </li>
                        @if(Auth::check())
                        <li class="none">
                            <a href="#">
                                {{ Auth::user()->name }}
                            </a>
                        </li>
                        <li class="none">
                            <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                                {{ __('Log Out') }}
                            </a>
                        </li>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                        @endif
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</header>