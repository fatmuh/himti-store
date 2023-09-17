@extends('layouts.landing.app')

@section('title')
    <title>HIMTI Store</title>
@endsection

@section('content')
    <!-- Slider Start -->
    <section class="slider-01">

        <!-- Scroll Btn -->
        <div class="scroll-down"><a href="#coupone">scroll to explore</a><img src="{{ asset('asset/images/home/scroll.png') }}"
                alt=""></div>
        <!-- Scroll Btn -->

        <!-- Counting Item -->
        <div class="slider-counter">
            <span class="current-item">02</span>
            <span class="bar"></span>
            <span class="total-item">04</span>
        </div>
        <!-- Counting Item -->

        <div class="rev_slider_wrapper">
            <div id="rev_slider_1" class="rev_slider fullwidthabanner" style="display:none;" data-version="5.4.1">
                <ul>
                    <li class="rev-slidebg">
                        <div class="tp-caption tp-resizeme textRes title-1" data-x="['left','left','center','center']"
                            data-hoffset="['0']" data-y="['middle']" data-voffset="['-132','-110','-60','-70']"
                            data-fontsize="['60','45','40','36']" data-fontweight="700"
                            data-lineheight="['72','50','52','46']" data-width="['570','500','500','100%']"
                            data-height="['auto']" data-whitesapce="['normal']" data-color="['#000000']" data-type="text"
                            data-responsive_offset="on"
                            data-frames='[{"delay":1500,"speed":2000,"frame":"0","from":"y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;","to":"o:1;","ease":"Power4.easeInOut"},
                                 {"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]'
                            data-textAlign="['left','left','center','center']" data-paddingtop="[0,0,0,0]"
                            data-paddingright="[0,0,0,20]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,20]"
                            style="z-index: 5;  white-space: normal; text-transform: none;">HIMTI Store</div>
                        <div class="tp-caption tp-resizeme textRes" data-x="['left','left','center','center']"
                            data-hoffset="['0']" data-y="['middle']" data-voffset="['17','17','50','40']"
                            data-fontsize="['24','20','18','18']" data-fontweight="400"
                            data-lineheight="['36','32','30','28']" data-width="['570','500','500','100%']"
                            data-height="['auto']" data-whitesapce="['normal']" data-color="['#666666']" data-type="text"
                            data-responsive_offset="off"
                            data-frames='[{"delay":2000,"speed":2000,"frame":"0","from":"y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;","to":"o:1;","ease":"Power4.easeInOut"},
                                 {"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]'
                            data-textAlign="['left','left','center','center']" data-paddingtop="[0,0,0,0]"
                            data-paddingright="[0,0,0,20]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,20]"
                            style="z-index: 5; white-space: normal; text-transform: none;">Pesan tiket acara HIMTI Gunadarma disini, kami memberikan pelayanan dengan cepat dan legal.
                        </div>
                        <div class="tp-caption tp-resizeme textRes" data-x="['left','left','center','center']"
                            data-hoffset="['0']" data-y="['middle']" data-voffset="['145','145','150','145']"
                            data-fontsize="14" data-fontweight="700" data-lineheight=".8" data-width="['auto']"
                            data-height="['auto']" data-whitesapce="['normal']" data-color="['#FFF']" data-type="text"
                            data-responsive_offset="off"
                            data-frames='[{"delay":2500,"speed":2000,"frame":"0","from":"y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;","to":"o:1;","ease":"Power4.easeInOut"},
                                 {"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]'
                            data-textAlign="center" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,20]"
                            data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,20]" style="z-index: 5;"><a
                                href="#" class="goru-btn">view collection</a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </section>
    <!-- Slider End -->

    <!-- Categories Section Start -->
    <section class="categorie-section">

        <!-- Section Heading -->
        <div class="sec-heading rotate-rl">Kategori <span> Acara</span></div>
        <!-- Section Heading -->

        <div class="container">
            <div class="row">
                <div class="col-lg-12" id="kategori">
                    <h2 class="sec-title">Kategori Acara</h2>
                    <p class="sec-desc">
                        Lihat berbagai macam produk berdasarkan<br />
                        kategori yang tersedia pada HIMTI Store.
                    </p>
                </div>
            </div>
            <div class="row">
                @foreach ($categories as $kategori)
                    <div class="col-lg-2 col-md-4">
                        <a href="{{ route('landing.category', ['slug' => $kategori->slug]) }}" class="single-cate">
                            <h5>{{ $kategori->name }}</h5>
                            <img src="{{ asset('storage/'. old('image', $kategori->image)) }}" width="50px" class="m-3">
                        </a>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- shpage -->
        <div class="cate-shage"><img src="{{ asset('asset/images/home/shape1.png') }}" alt=""></div>
    </section>
    <!-- Categories Section End -->

    <!-- Service Section Start -->
    <section class="service-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="single-service">
                        <img src="{{ asset('asset/images/component/trust.png') }}" alt="">
                        <h4>100% Terpercaya</h4>
                        <p>Kami memberikan layanan yang terpercaya dikarenakan terdapat legalitas dari organisasi HIMTI Gunadarma.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single-service">
                        <img src="{{ asset('asset/images/component/customer-service.png') }}" alt="">
                        <h4>24/7 Support</h4>
                        <p>Admin kami akan memberikan pelayanan dan menjawab semua pertanyaan Anda dengan cepat.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single-service">
                        <img src="{{ asset('asset/images/component/save-money.png') }}" alt="">
                        <h4>30 Day Return</h4>
                        <p>Jika Anda tidak menerima pesanan tiket dalam jangka 3 hari, maka dana akan dikembalikan sepenuhnya.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Service Section End -->

    <!-- Popular Section Start -->
    <section class="popular-section">

        <!-- Shape Round -->
        <div class="shape-round">
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
        </div>
        <!-- Shape Round -->

        <!-- Section Heading -->
        <div class="sec-heading rotate-rl">Acara <span> HIMTI</span></div>
        <!-- Section Heading -->

        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="mb-5 sec-title">Acara HIMTI</h2>
                    <div class="row">
                        @foreach ($products as $produk)
                            <div class="col-lg-3 col-md-6">
                                <div class="single-shop-product">
                                    <div class="sp-thumb">
                                        <img src="{{ asset('storage/'. old('image', $produk->image)) }}" alt="" class="">
                                        <div class="pro-badge">
                                            <p class="sale">{{ $produk->category->name }}</p>
                                        </div>
                                    </div>
                                    <div class="sp-details">
                                        <h4>{{ $produk->name }}</h4>
                                        <div class="clearfix product-price">
                                            <span class="price">
                                                <ins><span>{{ "Rp".number_format($produk->price,2,',','.') }}</span></ins>
                                            </span>
                                        </div>
                                        <div class="sp-details-hover">
                                            <a class="sp-cart" href="{{ route('landing.product', ['slug' => $produk->slug]) }}"><i class="twi-cart-plus"></i><span>Detail Produk</span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
    <!-- Popular Section End -->

    <!-- Client Section Start -->
    <section class="client-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="client-logo owl-carousel">
                        <a href="#"><img src="assets/images/home/client-logo/1.png" alt=""></a>
                        <a href="#"><img src="assets/images/home/client-logo/2.png" alt=""></a>
                        <a href="#"><img src="assets/images/home/client-logo/3.png" alt=""></a>
                        <a href="#"><img src="assets/images/home/client-logo/4.png" alt=""></a>
                        <a href="#"><img src="assets/images/home/client-logo/5.png" alt=""></a>
                        <a href="#"><img src="assets/images/home/client-logo/1.png" alt=""></a>
                        <a href="#"><img src="assets/images/home/client-logo/2.png" alt=""></a>
                        <a href="#"><img src="assets/images/home/client-logo/3.png" alt=""></a>
                        <a href="#"><img src="assets/images/home/client-logo/4.png" alt=""></a>
                        <a href="#"><img src="assets/images/home/client-logo/5.png" alt=""></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Client Section End -->
@endsection
