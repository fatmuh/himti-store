<!DOCTYPE html>
<html lang="en">

<head>
    @yield('title')
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width">

    <!-- Include All CSS -->
    <link rel="stylesheet" href="{{ asset('asset/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('asset/css/themewar-icons.css') }}" />
    <link rel="stylesheet" href="{{ asset('asset/css/flaticon.css') }}" />
    <link rel="stylesheet" href="{{ asset('asset/css/animate.css') }}" />
    <link rel="stylesheet" href="{{ asset('asset/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/css/settings.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/css/lightcase.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/css/preset.css') }}" />
    <link rel="stylesheet" href="{{ asset('asset/css/ignore_in_wp.css') }}" />
    <link rel="stylesheet" href="{{ asset('asset/css/theme.css') }}" />
    <link rel="stylesheet" href="{{ asset('asset/css/responsive.css') }}" />
    <!-- End Include All CSS -->

    <!-- Favicon Icon -->
    <link rel="icon" type="image/png" href="{{ asset('asset/images/himti.png') }}">
    <!-- Favicon Icon -->
</head>

<body>
    <!-- Preloader Start -->
    <div class="preloader" id="preloader">
        <div class="la-ball-scale-multiple la-2x">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>
    <!-- Preloader End -->

    <!-- Header Start -->
    <header class="header-01 {{ Request::routeIs('landing.index') ? 'fix-header' : 'inner-header fix-header' }}">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-2 col-md-2">
                    <div class="logo">
                        <a href="{{ route('landing.index') }}">
                            <img src="{{ asset('asset/images/himti.png') }}" alt="HIMTI Store" />
                        </a>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <nav class="mainmenu mobile-menu">
                        <div class="mobile-btn">
                            <a href="javascript: void(0);"><span>Menu</span><i class="twi-bars"></i></a>
                        </div>
                        <ul>
                            <li class="active">
                                <a href="{{ route('landing.index') }}">Home</a>
                            </li>
                            <li><a href="{{ route('landing.index') }}#kategori">Kategori</a></li>
                            <li><a href="contact.html">Produk</a></li>
                            <li><a href="contact.html">Tentang</a></li>
                            <li><a href="contact.html">Kontak</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-4 col-md-4">
                    <div class="header-cogs">
                        {{-- <a class="search search-toggles" href="javascript:void(0);"><i class="twi-search"></i></a> --}}
                        @guest
                        @if (Route::has('login'))
                        <a class="user-login" href="{{ route('login') }}"><i
                                class="twi-sign-in"></i><span>Masuk</span></a>
                        @endif
                        @else
                        @if (auth()->user()->role == "Admin")
                        <a class="user-login" href="{{ route('admin') }}"><i
                            class="twi-home"></i><span>Admin Menu</span></a>
                        @else
                        <a class="user-login" href="javascript:void(0);"><i
                            class="twi-user-circle"></i><span>{{ auth()->user()->name }}</span></a>
                        @endif
                        <a class="user-login" href="{{ route('logout') }}" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();"><i
                            class="twi-sign-out"></i><span>Keluar</span></a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>

                        <a class="carts" href="javascript:void(0);"><span>4</span><img src="{{ asset('asset/images/cart.png') }}"
                                alt=""></a>
                        @endguest
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Header End -->

    {{-- <!-- Popup Search -->
    <section class="popup-search-sec">
        <div class="popup-search-overlay"></div>
        <div class="overlay-popup">
            <a href="javascript:void(0);" class="search-closer">x</a><!-- Close Popup Btn -->
            <div class="middle-search">
                <div class="popup-search-form"><!-- Search Form Start -->
                    <form method="get" action="#">
                        <input type="search" name="s" id="s" placeholder="Search...">
                        <button type="submit"><i class="twi-search"></i></button>
                    </form><!-- Search Form End -->
                </div>
            </div>
        </div>
    </section>
    <!-- Popup Search --> --}}

    @yield('content')

    <!-- Footer Start -->
    <footer class="footer-01">
        <div class="container">
            <div class="text-center row">
                <div class="col-lg-12 col-md-4">
                    <aside class="widget about-widget">
                        <div class="foo-logo">
                            <a href="{{ route('landing.index') }}"><img src="{{ asset('asset/images/himti.png') }}" alt="HIMTI Store"
                                    width="150px" /></a>
                        </div>
                        <p>
                            HIMTI Store adalah tempat dimana para mahasiswa atau orang umum dapat membeli atau mendaftar
                            acara maupun kegiatan yang akan dilaksanakan oleh Himpunan Mahasiswa Teknik Informatika
                            Universitas Gunadarma
                        </p>
                        <div class="ab-social">
                            <a href="#"><i class="twi-facebook"></i></a>
                            <a href="#"><i class="twi-twitter"></i></a>
                            <a href="#"><i class="twi-instagram"></i></a>
                            <a href="#"><i class="twi-linkedin"></i></a>
                        </div>
                    </aside>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Ened -->

    <!-- Coryight Start -->
    <section class="copyright-section">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 col-md-5">
                    <ul class="menu-link">
                        <li><a href="#">Privacy Policy</a></li> |
                        <li><a href="#">Terms of Service</a></li>
                    </ul>
                </div>
                <div class="col-lg-6 col-md-7">
                    <div class="copys-text"><i class="twi-copyright"></i>Copyright HIMTI Store {{ date('Y') }} |
                        All Rights
                        Reserved</div>
                </div>
            </div>
        </div>
    </section>
    <!-- Coryight End -->

    <!-- Back To Top -->
    <a href="#" id="backtotop"><i class="twi-angle-double-up2"></i></a>

    @include('sweetalert::alert')

    <!-- Include All JS -->
    <script src="{{ asset('asset/js/jquery.js') }}"></script>
    <script src="{{ asset('asset/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('asset/js/modernizr.custom.js') }}"></script>
    <script src="{{ asset('asset/js/jquery.appear.js') }}"></script>
    <script src="{{ asset('asset/js/jquery-ui.js') }}"></script>
    <script src="{{ asset('asset/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('asset/js/jquery.shuffle.min.js') }}"></script>
    <script src="{{ asset('asset/js/lightcase.js') }}"></script>
    <script src="{{ asset('asset/js/jquery.easing.1.3.js') }}"></script>
    <script src="{{ asset('asset/js/jquery.plugin.min.js') }}"></script>
    <script src="{{ asset('asset/js/jquery.countdown.min.js') }}"></script>
    <script src="{{ asset('asset/js/tweenmax.min.js') }}"></script>

    <script src="{{ asset('asset/js/jquery.themepunch.tools.min.js') }}"></script>
    <script src="{{ asset('asset/js/jquery.themepunch.revolution.min.js') }}"></script>

    <!-- Rev slider Add on Start -->
    <script src="{{ asset('asset/js/extensions/revolution.extension.actions.min.js') }}"></script>
    <script src="{{ asset('asset/js/extensions/revolution.extension.carousel.min.js') }}"></script>
    <script src="{{ asset('asset/js/extensions/revolution.extension.kenburn.min.js') }}"></script>
    <script src="{{ asset('asset/js/extensions/revolution.extension.layeranimation.min.js') }}"></script>
    <script src="{{ asset('asset/js/extensions/revolution.extension.migration.min.js') }}"></script>
    <script src="{{ asset('asset/js/extensions/revolution.extension.navigation.min.js') }}"></script>
    <script src="{{ asset('asset/js/extensions/revolution.extension.parallax.min.js') }}"></script>
    <script src="{{ asset('asset/js/extensions/revolution.extension.slideanims.min.js') }}"></script>
    <script src="{{ asset('asset/js/extensions/revolution.extension.video.min.js') }}"></script>
    <!-- Rev slider Add on End -->

    <script src="{{ asset('asset/js/theme.js') }}"></script>
</body>

</html>
