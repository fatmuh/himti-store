@extends('layouts.landing.app')

@section('title')
    <title>Kategori - HIMTI Store</title>
@endsection

@section('content')
<!-- Banner Start -->
<section class="page-banner shop-full-banner">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <span class="round-shape"></span>
                <h2 class="banner-title">Acara HIMTI - {{ $category->name }}</h2>
                <div class="bread-crumb"><a href="{{ route('landing.index') }}">Home</a> <a href="#"> / Kategori</a> /
                    {{ $category->name }}</div>
                <div class="banner-img">
                    <img src="{{ asset('asset/images/himti.png') }}" alt="" width="190">
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Banner End -->

<!-- Shop Section Start -->
<section class="shop-fullwidth">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-7">
                <div class="product-cate">
                    <h5>Acara HIMTI</h5>
                </div>
            </div>
        </div>
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
</section>
<!-- Shop Section End -->
@endsection
