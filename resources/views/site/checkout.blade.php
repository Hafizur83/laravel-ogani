@extends('site.master')

@section('title')
Checkout Page
@endsection
@section('style')
<style>
.is-invalid, .was-validated .input:invalid {
    border-color: #dc3545 !important;
    padding-right: calc(1.5em + .75rem);
}
</style>
@endsection

@section('main_content')



@include('site.hero')
 <!-- Breadcrumb Section Begin -->
 <section class="breadcrumb-section set-bg" data-setbg="{{asset('public/site/images/breadcrumb.jpg')}}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Checkout</h2>
                        <div class="breadcrumb__option">
                            <a href="./index.html">Home</a>
                            <span>Checkout</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Checkout Section Begin -->
    <section class="checkout spad">
        <div class="container">
            <div class="checkout__form">
                <h4>Billing Details</h4>
                <form action="{{url('/place/order')}}" method="POST">
                @csrf
                    <div class="row">
                        <div class="col-lg-8 col-md-6">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Fist Name<span>*</span></p>
                                        <input type="text" name="shipping_firstName" class="input @error('shipping_firstName') is-invalid @enderror" value="{{ Auth::user()->name ?? ''}}">
                                        @error('shipping_firstName')
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                            @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Last Name<span>*</span></p>
                                        <input type="text" name="shipping_lastName">
                                        @error('shipping_lastName')
                                        <span style="font-size: 80%" class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                            @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="checkout__input">
                                <p>Address<span>*</span></p>
                                <input type="text" name="address"  placeholder="Street Address" class="checkout__input__add">
                            
                            </div>
                            <div class="checkout__input">
                                <p>District<span>*</span></p>
                                <input type="text" name="district">
                            </div>
                            <div class="checkout__input">
                                <p>Postcode / ZIP<span>*</span></p>
                                <input type="text" name="post_code">
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Phone<span>*</span></p>
                                        <input type="text" name="shipping_phone">
                                        @error('shipping_phone')
                                        <span style="font-size: 80%" class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                            @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Email<span>*</span></p>
                                        <input type="text" name="shipping_email" value="{{ Auth::user()->email ?? ''}}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="checkout__order">
                                <h4>Your Order</h4>
                                <div class="checkout__order__products">Products <span>Total</span></div>
                                <ul>
                                @foreach($carts as $cart)
                                    <li>{{$cart->product->product_name}} <span>${{ $cart->qty * $cart->price }}</span></li>
                                @endforeach
                                </ul>
                                @if(Session::has('coupon_name'))
                                <div class="checkout__order__subtotal">Subtotal <span>${{$subtotal}}</span></div>
                                <div class="checkout__order__subtotal">Discount <span>${{$discount_percentage = Session()->get('coupon_name')['discount']}} ($ {{$discount = $subtotal * $discount_percentage / 100}})</span></div>
                                <div class="checkout__order__total">Total <span>${{$subtotal - $discount}}</span></div>
                                <input type="hidden" name="coupon_discount" value="{{$discount = $subtotal * $discount_percentage / 100}}">
                                <input type="hidden" name="subtotal" value="{{$subtotal}}">
                                <input type="hidden" name="total" value="{{$subtotal - $discount}}">
                                @else
                                <div class="checkout__order__subtotal">Subtotal <span>${{$subtotal}}</span></div>
                                <div class="checkout__order__total">Total <span>${{$subtotal}}</span></div>
                                <input type="hidden" name="subtotal" value="{{$subtotal}}">
                                <input type="hidden" name="total" value="{{$subtotal}}">
                                @endif
                                <div class="checkout__input__checkbox">
                                    <label for="paypal">
                                        Paypal
                                        <input type="checkbox" id="paypal" name="payment_type" value="paypal">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <div class="checkout__input__checkbox">
                                    <label for="handcash">
                                    HandCash
                                        <input type="checkbox" id="handcash" name="payment_type" value="handcash">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                @error('payment_type')
                                <span style="font-size: 80%" class="text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                    @enderror
                                <button type="submit" class="site-btn">PLACE ORDER</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!-- Checkout Section End -->
@endsection