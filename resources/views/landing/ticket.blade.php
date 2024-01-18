@extends('layouts.landing.app')

@section('title')
<title>Ticket - HIMTI Store</title>
@endsection

@section('content')
<!-- Banner Start -->
<section class="page-banner">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <span class="round-shape"></span>
                <h2 class="banner-title">Own Ticket</h2>
                <div class="bread-crumb"><a href="{{ route('landing.index') }}">Home</a> / Ticket</div>
            </div>
        </div>
    </div>
</section>
<!-- Banner End -->


<section class="cart-section">
    <form class="woocommerce-cart-form" action="#">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <table class="cart-table">
                        <thead>
                            <tr>
                                <th class="product-name-thumbnail">Invoice Number</th>
                                <th class="product-total">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
@foreach($tickets as $ticket)                            
                            <tr class="cart-item">
                                <td class="product-unit-price" style="width: 80%">
                                    <a class="price" style="font-size: 2em; font-weight:bold" href="#">{{ $ticket->uniq }}</a>
                                </td>
                                <td class="product-quantity clearfix">
                                    <div class="product-price clearfix">
                                        
                                        <a href="{{ route('landing.ticket.detail',$ticket->uniq) }}" class="add-to-cart-btn">Detail</a>
                                    </div>
                                </td>
                            </tr>
@endforeach                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </form>
</section>
@endsection
