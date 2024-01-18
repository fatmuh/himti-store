@extends('layouts.landing.app')

@section('title')
<title>{{ $ticket->uniq }} - Ticket - HIMTI Store</title>
@endsection

@section('content')
<!-- Banner Start -->
<section class="page-banner">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <span class="round-shape"></span>
                <h2 class="banner-title">{{ $ticket->uniq }}</h2>
                <div class="bread-crumb"><a href="{{ route('landing.index') }}">Home</a> / <a href="{{ route('landing.ticket') }}">Ticket</a> / {{ $ticket->uniq }}</div>
            </div>
        </div>
    </div>
</section>
<!-- Banner End -->


<section class="cart-section">
    <form class="woocommerce-cart-form" action="#">
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <table class="cart-table">
                        <thead>
                            <tr>
                                <th class="product-name-thumbnail">Nama Ticket</th>
                                <th class="product-price">Harga</th>
                                <th class="product-quantity">Jumlah</th>
                                <th class="product-total">Total</th>
                                <th class="product-remove">&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
@foreach($ticket->detail as $detail)                            
                            <tr class="cart-item">
                                <td class="product-unit-price">
                                    <a class="price" href="#">{{ $detail->product->name }}</a>
                                </td>
                                <td class="product-unit-price">
                                    <div class="product-price clearfix">
                                        <span class="price">
                                            <span><span
                                                    class="woocommerce-Price-currencySymbol">Rp {{ number_format($detail->base_price) }}</span>
                                            </span>
                                    </div>
                                </td>
                                <td class="product-quantity clearfix">
                                    <div class="product-price clearfix">
                                        <span class="price">
                                            <span><span
                                                    class="woocommerce-Price-currencySymbol">{{ $detail->qty }}</span>
                                            </span>
                                    </div>
                                </td>
                                <td class="product-total">
                                    <div class="product-price clearfix">
                                        <span class="price">
                                            <span><span
                                                    class="woocommerce-Price-currencySymbol">Rp {{ number_format($detail->base_total) }}
                                                </span>
                                            </span>
                                    </div>
                                </td>
                            </tr>
@endforeach                            
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
                                                class="woocommerce-Price-currencySymbol">Rp {{ number_format($ticket->price_total) }}</span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="wc-proceed-to-checkout">
@if($ticket->status != "Pending" && $ticket->status != "Reject")                            
                            <a href="{{ route('landing.checkout') }}" class="checkout-button">Print Ticket</a>
@else
                            <a href="#" class="checkout-button">Menunggu Konfirmasi Admin!</a>
@endif                        
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</section>
@endsection
