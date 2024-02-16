@extends('layouts.landing.app')

@section('title')
<title>Pembayaran - HIMTI Store</title>
@endsection

@section('content')
<!-- Banner Start -->
<section class="page-banner">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <span class="round-shape"></span>
                <h2 class="banner-title">Pembayaran</h2>
                <div class="bread-crumb"><a href="{{ route('landing.index') }}">Home</a> / Pembayaran</div>
            </div>
        </div>
    </div>
</section>
<!-- Banner End -->

<form method="POST" enctype="multipart/form-data">
    @csrf
    <!-- Checkout Section Start -->
    <section class="checkout-section">
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <div class="woocommerce-billing-fields">
                        <h3>Billing Info</h3>
                        <div class="row">
                            <p class="col-lg-12">
                                <label>Nama Lengkap</label>
                                <input value="{{ auth()->user()->name }}" name="name" type="text" readonly>
                                <input value="{{ auth()->user()->id }}" name="user_id" type="hidden" readonly>
                            </p>
                            <p class="col-lg-12">
                                <label>Email</label>
                                <input value="{{ auth()->user()->email }}" name="email" type="text" readonly>
                            </p>
                            <p class="col-lg-12" id="proof_of_payment">
                                <label>Bukti Pembayaran</label>
                                <input placeholder="" class="form-control" id="proof_of_payment_input" name="proof_of_payment" type="file" required>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="woocommerce-checkout-review-order" id="order_review">
                        <h3>Your Order</h3>
                        <table class="check-table woocommerce-checkout-review-order-table">
                            <thead>
                                <tr>
                                    <th class="product-total"></th>
                                    <th class="product-total"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($carts as $cart)
                                    <input value="{{ $cart->product->id }}" name="product_id" type="hidden" readonly>
                                    <tr class="cart-item">
                                        <td class="product-name">{{ $cart->product->name }} : {{ $cart->quantity }}</td>
                                        <td class="product-total">
                                            <div class="product-price clearfix">
                                                <span class="price">
                                                    <span>{{ "Rp".number_format($cart->price_total, 2, ',', '.') }}</span>
                                                </span>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr class="order-total">
                                    <th>Total</th>
                                    <td>
                                        <div class="product-price clearfix">
                                            <span class="price">
                                                <span>{{ "Rp".number_format($price_total, 2, ',', '.') }}</span>
                                            </span>
                                        </div>
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                        <div class="woocommerce-checkout-payment" id="payment">
                            <ul class="wc_payment_methods payment_methods methods">
                                <li class="wc_payment_method payment_method_bacs">
                                    <input checked="checked" value="transfer-bank" name="payment_method" class="input-radio" id="payment_method_bacs" type="radio">
                                    <label for="payment_method_bacs">Transfer Bank <i class="twi-building"></i></label>
                                    <div class="payment_box payment_method_bacs visibales">
                                        <p>
                                            BCA : 7158128383 a.n. Muhammad Hendi
                                        </p>
                                    </div>
                                </li>
                                <li class="wc_payment_method payment_method_cod">
                                    <input value="e-wallet" name="payment_method" class="input-radio" id="payment_method_cod" type="radio">
                                    <label for="payment_method_cod">E-Wallet <i class="twi-credit-card"></i></label>
                                    <div class="payment_box payment_method_cod">
                                        <p>
                                            DANA : 08383742383 a.n. Muhammad Hendi
                                        </p>
                                    </div>
                                </li>
                                <li class="wc_payment_method payment_method_paypal">
                                    <input value="cod" name="payment_method" class="input-radio" id="payment_method_paypal" type="radio">
                                    <label for="payment_method_paypal">COD <i class="twi-shipping-fast"></i></label>
                                    <div class="payment_box payment_method_paypal">
                                        <p>
                                            Bayar ditempat yang telah dibuat perjanjian sebelumnya.
                                        </p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="place-order">
                            <button type="submit" class="button">Place Order</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Checkout Section End -->
</form>
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script>
    $(document).ready(function(){
        $('input[type=radio][name=payment_method]').change(function(){
            if($(this).val() == "cod"){
                console.log('cod');
                $("#proof_of_payment_input").removeAttr('required');
                $('#proof_of_payment').hide();
            }else{
                $('#proof_of_payment_input').attr('required', 'required');
                $('#proof_of_payment').show();
            }
        });
    });
</script>
@endsection
