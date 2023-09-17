@extends('layouts.landing.app')

@section('title')
<title>Keranjang - HIMTI Store</title>
@endsection

@section('content')
<!-- Banner Start -->
<section class="page-banner">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <span class="round-shape"></span>
                <h2 class="banner-title">Keranjang</h2>
                <div class="bread-crumb"><a href="{{ route('landing.index') }}">Home</a> / Keranjang</div>
            </div>
        </div>
    </div>
</section>
<!-- Banner End -->

<form class="woocommerce-cart-form" action="{{ route('landing.cart.clear', ['id' => auth()->user()->id]) }}"
    method="POST" id="clear-form">
    @method("delete")
    @csrf
</form>

<section class="cart-section">
    <form class="woocommerce-cart-form" action="#">
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <table class="cart-table">
                        <thead>
                            <tr>
                                <th class="product-name-thumbnail">Nama Produk</th>
                                <th class="product-price">Harga</th>
                                <th class="product-quantity">Jumlah</th>
                                <th class="product-total">Total</th>
                                <th class="product-remove">&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($carts as $cart)
                            <tr class="cart-item">
                                <td class="product-unit-price">
                                    <a class="price" href="#">{{ $cart->product->name }}</a>
                                </td>
                                <td class="product-unit-price">
                                    <div class="product-price clearfix">
                                        <span class="price">
                                            <span><span
                                                    class="woocommerce-Price-currencySymbol">{{ "Rp".number_format($cart->product->price,2,',','.') }}</span>
                                            </span>
                                    </div>
                                </td>
                                <td class="product-quantity clearfix">
                                    <div class="product-price clearfix">
                                        <span class="price">
                                            <span><span
                                                    class="woocommerce-Price-currencySymbol">{{ $cart->quantity }}</span>
                                            </span>
                                    </div>
                                </td>
                                <td class="product-total">
                                    <div class="product-price clearfix">
                                        <span class="price">
                                            <span><span
                                                    class="woocommerce-Price-currencySymbol">{{ "Rp".number_format($cart->price_total, 2, ',', '.') }}
                                                </span>
                                            </span>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                            <tr>
                                <td colspan="6" class="actions">
                                    <button type="submit" form="clear-form" class="button clear-cart">Clear Shopping
                                        Cart</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-md-5">
                    <div class="cart-totals">
                        <h2>Detail</h2>
                        <table class="shop-table">
                            <tbody>
                                <tr class="order-total">
                                    <th>Total Pembayaran</th>
                                    <td data-title="Subtotal">
                                        <span class="woocommerce-Price-amount amount"><span
                                                class="woocommerce-Price-currencySymbol">{{ "Rp".number_format($price_total, 2, ',', '.') }}</span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="wc-proceed-to-checkout">
                            <a href="{{ route('landing.checkout') }}" class="checkout-button">Proceed to checkout</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</section>
@endsection
