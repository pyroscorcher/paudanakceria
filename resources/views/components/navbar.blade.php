<!DOCTYPE html>
<html lang="en">

<head>
</head>

<body>

    <div id="navigation" class="navbar-light bg-faded site-navigation border-bottom">
        <div class="container">
            <div class="row">
                <div class="col-20 align-self-center">
                    <div class="site-logo">
                        <a href="{{ route('user.home') }}">
                            <img src="{{ asset('images/all-img/logo-paudanakceria.png') }}" alt="">
                        </a>

                        <div class="site-logo-text">
                            <p>PAUD Anak Ceria</p>
                        </div>
                    </div>
                </div>

                <div class="col d-flex justify-content-center">
                    <nav id="main-menu">
                        <ul>
                            <li><a href="{{ route('user.home')}}">Beranda</a>
                            </li>
                            <li><a href="{{ route('user.info') }}">Info Pendaftaran</a></li>
                            <li><a href="{{ route('user.pengumuman') }}">Pengumuman</a>
                            </li>
                            <li><a href="{{ route('user.daftar') }}">Mulai Daftar</a>
                            </li>
                            <li><a href="{{ route('user.kontak') }}">Kontak Kami</a></li>
                        </ul>
                    </nav>
                </div><!--- END Col -->

                <div class="col-auto d-none d-lg-block text-end align-self-center">
                    <div class="call_to_action">
                        @auth
                            <!-- Renders if the user IS logged in -->
                            <a class="btn_two" href="{{ route('user.dashboard') }}">Dasbor <i class="fa-solid fa-arrow-right"></i></a>
                        @else
                            <!-- Renders if the user is NOT logged in -->
                            <a class="btn_two" href="{{ route('user.login') }}">Masuk <i class="fa-solid fa-arrow-right"></i></a>
                        @endauth
                    </div><!--- END SOCIAL PROFILE -->
                </div><!--- END Col -->

                <ul class="mobile_menu">
                    <li><a href="{{ route('user.home') }}">Beranda</a></li>
                    <li><a href="{{ route('user.info') }}">Info Pendaftaran</a></li>
                    <li><a href="{{ route('user.pengumuman') }}">Pengumuman</a>
                    </li>
                    <li><a href="{{ route('user.daftar') }}">Mulai Daftar</a>
                    </li>
                    <li><a href="{{ route('user.kontak') }}">Kontak Kami</a></li>
                    <li><a href="{{ route('user.login') }}">Masuk</a></li>
                </ul>
            </div><!--- END ROW -->
        </div><!--- END CONTAINER -->
    </div>
</body>
