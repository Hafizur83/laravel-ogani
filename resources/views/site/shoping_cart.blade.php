@extends('site.master')

@section('title')
Cart Page
@endsection

@section('main_content')
@include('site.hero')
<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-section set-bg" data-setbg="{{asset('public/site/images/breadcrumb.jpg')}}">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Shopping Cart</h2>
                    <div class="breadcrumb__option">
                        <a href="{{url('/')}}">Home</a>
                        <span>Shopping Cart</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<!-- Shoping Cart Section Begin -->
<section class="shoping-cart spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="shoping__cart__table">
                    <table id="dataTables">
                        <thead>
                            <tr>
                                <th class="shoping__product">Products</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($carts as $cart)
                            <tr>
                                <td class="shoping__cart__item">
                                    <img width="100px" src="{{asset('public/site/images/products/'.$cart->product->product_img)}}" alt="Product">
                                    <h5>{{$cart->product->product_name}}</h5>
                                </td>
                                <td class="shoping__cart__price">
                                    <input type="hidden" value="{{$cart->price}}" id="priceval">
                                    ${{$cart->price}}.00
                                </td>
                                <td class="shoping__cart__quantity">
                                    <div class="quantity">
                                        <input type="hidden" name="cart_id" value="{{$cart->id}}" id="cart_id">
                                            <div class="pro-qty">
                                                <input type="text" name="qty" value="{{$cart->qty}}" id="qtyval">
                                            </div>
                                    </div>

                                </td>
                                <td class="shoping__cart__total">
                                    $ <span id="s_total">{{$cart->qty * $cart->price}}</span>.00
                                </td>
                                <td class="shoping__cart__item__close">
                                    <button data-id="{{ $cart->id }}" type="button" id="cart_destroy" class="btn btn-sm btn-destroy"><span class="icon_close"></span></button>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="4">No Data Available </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="shoping__cart__btns">
                    <a href="{{url('/')}}" class="primary-btn cart-btn">CONTINUE SHOPPING</a>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="shoping__continue">
                    @if(Session::has('coupon_name'))
                    @else
                    <div class="shoping__discount">
                        <h5>Discount Codes</h5>
                        <form action="" method="post">
                            <input type="text" name="coupon_code" placeholder="Enter your coupon code" id="coupon_code">
                            <button type="submit" class="site-btn" id="applycoupon">APPLY COUPON</button>
                        </form>
                    </div>
                    @endif
                </div>
            </div>
            <div class="col-lg-6">
                <div class="shoping__checkout">
                    <h5>Cart Total</h5>
                    <ul>
                        <li>Subtotal <span id="subtotal">${{$subtotal}}</span></li>
                        <input type="hidden" value="{{$subtotal}}" id="subtotalval">
                        @if(Session::has('coupon_name'))
                        <li>Coupon <span class="float-let">{{Session()->get('coupon_name')['coupon_name']}}</span>
                            <a href="{{url('/coupon/destroy')}}"><span class="icon_close"></span></a>
                        </li>
                        <li>Discount <span>{{$discount_percentage = Session()->get('coupon_name')['discount']}} % ($ {{$discount = $subtotal * $discount_percentage / 100}})</span></li>
                        <li>Total <span id="total">${{$subtotal - $discount}}</span></li>
                        <input type="hidden" value="{{$subtotal - $discount}}" id="totalval">
                        @else
                        <li>Total <span id="total">${{$subtotal}}</span></li>
                        <input type="hidden" value="{{$subtotal}}" id="totalval">
                        @endif
                    </ul>
                    <a href="{{url('checkout')}}" class="primary-btn">PROCEED TO CHECKOUT</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Shoping Cart Section End -->

@endsection

@section('script')
<script>

    $.ajaxSetup({
            headers: {'X-CSRF-Token' : '{{csrf_token()}}'}
        })


    //     getData()
    // function  getData(){
    //     $.ajax({
    //         url: '{{ route('cart.data') }}',
    //         method: 'GET',
    //         success: function (data){
    //             $('#dataTables tbody').html(data)
    //         },
    //         error: function (error){
    //             console.log(error)
    //         }
    //     })
    // }

    $(document).on('click','#cart_destroy',function(e){
        e.preventDefault();
        var id = $(this).attr('data-id')
        var url = '{{ route('cart.delete') }}'
        $.ajax({
            url: url,
            method: 'POST',
            data: { id: id},
            success: function (data){
                // console.log(data)
                location.reload()
            },
            error: function (error){
                console.log(error)
            }
        })
    })


    $(document).on('click','.qtybtn',function(e){
        e.preventDefault();
        var id = $(this).parent().parent().parent().find('#cart_id').val()
        var qty = $(this).parent().parent().parent().find('#qtyval').val()
        var url = '{{ route('cart.update') }}'
        $.ajax({
            url: url,
            method: 'POST',
            data: { id: id, qty:qty},
            success: function (data){
                // $('#s_total').text(data.s_total)
                // console.log(data)
                window.location.reload()
            },
            error: function (error){
                console.log(error)
            }
        })
    })

    $(document).on('click','#applycoupon',function(e){
        e.preventDefault();
        var coupon_code = $('#coupon_code').val()
        var url = '{{ url('coupon/apply') }}'
        $.ajax({
            url: url,
            method: 'POST',
            data: { coupon_code: coupon_code},
            success: function (data){
                // console.log(data)
                window.location.reload()
                if(data == ''){
                    Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Coupon is  Invalid !!',
                    showConfirmButton: false,
                    timer: 1500
                    })
                }else{
                    Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Coupon Apply Successfully !!!',
                    showConfirmButton: false,
                    timer: 1500
                    })
                }
            },
            error: function (error){
                console.log(error)
            }
        })
    })



    
</script>
@endsection