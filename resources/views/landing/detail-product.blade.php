@extends('layouts.landing.app')

@section('title')
    <title>{{ $product->name }} - HIMTI Store</title>
@endsection

@section('content')
<!-- Banner Start -->
<section class="page-banner">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <span class="round-shape"></span>
                <h2 class="banner-title">{{ $product->name }}</h2>
                <div class="bread-crumb"><a href="{{ route('landing.index') }}">Home</a> / <a href="{{ route('landing.category', ['slug' => $product->category->slug]) }}">{{ $product->category->name }}</a> / {{ $product->name }}</div>
            </div>
        </div>
    </div>
</section>
<!-- Banner End -->

<!-- Shop Section Start -->
<section class="single-product-section">
    <form action="{{ route('landing.cart.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-12">
                <div class="ps-img">
                    <img src="{{ asset('storage/'. old('image', $product->image)) }}" alt="{{ $product->name }}" width="400">
                </div>
            </div>
            <div class="col-lg-6 col-md-12 d-flex align-items-center">
                <div class="sin-product-details">
                    <h3>{{ $product->name }}</h3>
                    <div class="product-price clearfix">
                        <span class="price">
                            <span>{{ "Rp".number_format($product->price,2,',','.') }}</span>
                        </span>
                    </div>
                    <div class="pro-excerp">
                        <p>
                            {!! Str::limit(strip_tags($product->description), 200) !!}
                        </p>
                    </div>
                    <div class="product-cart-qty">
                        <div class="quantityd clearfix">
                            <button class="qtyBtn btnMinus"><span>-</span></button>
                            <input name="quantity" value="1" title="Qty" class="input-text qty text carqty" type="text">
                            <button class="qtyBtn btnPlus">+</button>
                            <input name="product_id" value="{{ $product->id }}" type="hidden">
                        </div>
                        @auth
                            <button type="submit" class="add-to-cart-btn">Add To Cart</button>
                        @else
                            <a href="{{ route('login') }}" class="add-to-cart-btn">Add To Cart</a>
                        @endauth
                    </div>
                </div>
            </div>
        </div>

        <div class="row"><div class="col-lg-12"><div class="divider"></div></div></div>
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="product-tabarea">
                    <ul class="nav nav-tabs productTabs" id="productTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="descriptions-tab" data-toggle="tab" href="#descriptions" role="tab" aria-controls="descriptions" aria-selected="true">Deskripsi</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="productTabContent">
                        <div class="tab-pane fade show active" id="descriptions" role="tabpanel" aria-labelledby="descriptions-tab">
                            <div class="descriptionContent">
                                {!! $product->description !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Shop Section End -->
@endsection
