@extends('site.master')

@section('title')
shop Page
@endsection

@section('style')
<style>
.featured__item__pic__hover li button {font-size: 16px;color: #1c1c1c;height: 40px;width: 40px;line-height: 40px;text-align: center;border: 1px solid #ebebeb;background: #ffffff;display: block;border-radius: 50%;-webkit-transition: all, 0.5s;-moz-transition: all, 0.5s;-ms-transition: all, 0.5s;-o-transition: all, 0.5s;transition: all, 0.5s;}
.featured__item__pic__hover li:hover button {background: #7fad39;border-color: #7fad39;}
.featured__item__pic__hover li:hover i {color: #ffffff;transform: rotate(360deg);}
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
                    <h2>Organi Shop</h2>
                    <div class="breadcrumb__option">
                        <a href="{{url('/')}}">Home</a>
                        <span>Shop</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->
<!--End Show Message-->
<div class="container mt-2">
    @if(Session::has('order_done'))
    <div class="alert alert-success">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <h2>
            <strong>Success!</strong>
            {{Session::get('order_done')}}
        </h2>
    </div>
    @endif
</div>

    <!-- Product Section Begin -->
    <section class="product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-5">
                    <div class="sidebar">
                        <div class="sidebar__item">
                            <h4>Department</h4>
                            <ul>
                                <?php
                                $catagories = App\Models\Catagory::get();
                                ?>
                            @foreach($catagories as $catagorie)
                                <li><a href="{{url('catagory/'.$catagorie->id)}}">{{$catagorie->cat_name}}</a></li>
                             @endforeach
                            </ul>
                        </div>
                        <div class="sidebar__item">
                            <h4>Price</h4>
                            <div class="price-range-wrap">
                                <div class="price-range ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content"
                                    data-min="10" data-max="540">
                                    <div class="ui-slider-range ui-corner-all ui-widget-header"></div>
                                    <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
                                    <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
                                </div>
                                <div class="range-slider">
                                    <div class="price-input">
                                        <input type="text" id="minamount">
                                        <input type="text" id="maxamount">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="sidebar__item sidebar__item__color--option">
                            <h4>Colors</h4>
                            <div class="sidebar__item__color sidebar__item__color--white">
                                <label for="white">
                                    White
                                    <input type="radio" id="white">
                                </label>
                            </div>
                            <div class="sidebar__item__color sidebar__item__color--gray">
                                <label for="gray">
                                    Gray
                                    <input type="radio" id="gray">
                                </label>
                            </div>
                            <div class="sidebar__item__color sidebar__item__color--red">
                                <label for="red">
                                    Red
                                    <input type="radio" id="red">
                                </label>
                            </div>
                            <div class="sidebar__item__color sidebar__item__color--black">
                                <label for="black">
                                    Black
                                    <input type="radio" id="black">
                                </label>
                            </div>
                            <div class="sidebar__item__color sidebar__item__color--blue">
                                <label for="blue">
                                    Blue
                                    <input type="radio" id="blue">
                                </label>
                            </div>
                            <div class="sidebar__item__color sidebar__item__color--green">
                                <label for="green">
                                    Green
                                    <input type="radio" id="green">
                                </label>
                            </div>
                        </div>
                        <div class="sidebar__item">
                            <h4>Popular Size</h4>
                            <div class="sidebar__item__size">
                                <label for="large">
                                    Large
                                    <input type="radio" id="large">
                                </label>
                            </div>
                            <div class="sidebar__item__size">
                                <label for="medium">
                                    Medium
                                    <input type="radio" id="medium">
                                </label>
                            </div>
                            <div class="sidebar__item__size">
                                <label for="small">
                                    Small
                                    <input type="radio" id="small">
                                </label>
                            </div>
                            <div class="sidebar__item__size">
                                <label for="tiny">
                                    Tiny
                                    <input type="radio" id="tiny">
                                </label>
                            </div>
                        </div>
                        <div class="sidebar__item">
                            <div class="latest-product__text">
                                <h4>Latest Products</h4>
                                <div class="latest-product__slider owl-carousel">
                                    <div class="latest-prdouct__slider__item">
                                    @foreach($lts_products as $lts_product)
                                    <a href="{{url('product_details/'.$lts_product->id)}}" class="latest-product__item">
                                        <div class="latest-product__item__pic">
                                            <img src="{{asset('public/site/images/products/'.$lts_product->product_img)}}" alt="">
                                        </div>
                                        <div class="latest-product__item__text">
                                            <h6>{{$lts_product->product_name}}</h6>
                                            <span>${{$lts_product->price}}</span>
                                        </div>
                                    </a>
                                @endforeach
                                    </div>
                                    <div class="latest-prdouct__slider__item">
                                    @foreach($lts_products as $lts_product)
                                    <a href="{{url('product_details/'.$lts_product->id)}}" class="latest-product__item">
                                        <div class="latest-product__item__pic">
                                            <img src="{{asset('public/site/images/products/'.$lts_product->product_img)}}" alt="">
                                        </div>
                                        <div class="latest-product__item__text">
                                            <h6>{{$lts_product->product_name}}</h6>
                                            <span>${{$lts_product->price}}</span>
                                        </div>
                                    </a>
                                @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 col-md-7">
                    <div class="product__discount">
                        <div class="section-title product__discount__title">
                            <h2>Sale Off</h2>
                        </div>
                        <div class="row">
                            <div class="product__discount__slider owl-carousel">
                            @foreach($products as $product)
                                <div class="col-lg-4">
                                    <div class="product__discount__item">
                                        <div class="product__discount__item__pic set-bg"
                                            data-setbg="{{asset('public/site/images/products/'.$product->product_img)}}">
                                            <div class="product__discount__percent">-20%</div>
                                            <ul class="product__item__pic__hover">
                                            @if(Auth::check())
                                                <li>
                                                    <li> <button class="add-cart" data-id="{{ $product->id }}" id="addwish"><i class="fa fa-heart"></i></button></li>
                                                </li>
                                            @else

                                                <li><a href="#" data-toggle="modal" data-target="#loginModal"><i class="fa fa-heart"></i></a></li>
                                             @endif
                                                <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                                <li> <button class="add-cart" data-id="{{ $product->id }}" id="addcart"><i class="fa fa-shopping-cart"></i></button></li>
                                            </ul>
                                        </div>
                                        <div class="product__discount__item__text">
                                            <span>{{$product->product_name}}</span>
                                            <h5><a href="{{url('product_details/'.$product->id)}}">{{$product->product_name}}</a></h5>
                                            <div class="product__item__price">${{$product->price}}.00 <span>${{$product->price}}.00</span></div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="filter__item">
                        <div class="row">
                            <div class="col-lg-4 col-md-5">
                                <div class="filter__sort">
                                    <span>Sort By</span>
                                    <select>
                                        <option value="0">Default</option>
                                        <option value="0">Default</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4">
                                <div class="filter__found">
                                    <h6><span>16</span> Products found</h6>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-3">
                                <div class="filter__option">
                                    <span class="icon_grid-2x2"></span>
                                    <span class="icon_ul"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                    @foreach($productsp as $product)
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="product__item">
                                <div class="product__item__pic set-bg" data-setbg="{{asset('public/site/images/products/'.$product->product_img)}}">
                                    <ul class="product__item__pic__hover">
                                            @if(Auth::check())
                                        <li>
                                            <li> <button class="add-cart" data-id="{{ $product->id }}" id="addwish"><i class="fa fa-heart"></i></button></li>
                                        </li>
                                    @else

                                        <li><a href="#" data-toggle="modal" data-target="#loginModal"><i class="fa fa-heart"></i></a></li>
                                        @endif
                                        <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                        <li> <button class="add-cart" data-id="{{ $product->id }}" id="addcart"><i class="fa fa-shopping-cart"></i></button></li>
                                    </ul>
                                </div>
                                <div class="product__item__text">
                                    <h6><a href="{{url('product_details/'.$product->id)}}">{{$product->product_name}}</a></h6>
                                    <h5>${{$product->price}}.00</h5>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    {{ $productsp->links('pagination::bootstrap-4') }}
                </div>
            </div>
        </div>
    </section>
    <!-- Product Section End -->
@endsection
@section('script')
<script>
      $.ajaxSetup({
            headers: {'X-CSRF-Token' : '{{csrf_token()}}'}
        })

// Add To Cart Wishlist 
    $(document).on('click','#addwish',function(e){
        e.preventDefault();
        var wishlist_count = Number($('#wishlist_count').text())
        var id = $(this).attr('data-id')
        var url = '{{ route('add.wishlist') }}'

        $.ajax({
            url: url,
            method: 'POST',
            data: { id: id},
            success: function (data){
                if(data == ''){
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 2000,
                        timerProgressBar: true
                        })

                        Toast.fire({
                        icon: 'success',
                        title: 'Product Add to Wishlist !!',
                    })
                    $('#wishlist_count').text(wishlist_count + 1)
                }else{
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 2000,
                        timerProgressBar: true
                        })

                        Toast.fire({
                        icon: 'warning',
                        title: 'Product Already to Wishlist !!',
                    })   
                }
            }
        })
    })

// Add To Cart Script 
    $(document).on('click','#addcart',function(e){
        e.preventDefault();
        var quantity = Number($('#quantity').text())
        var id = $(this).attr('data-id')
        var url = '{{ route('add.cart') }}'

        $.ajax({
            url: url,
            method: 'POST',
            data: { id: id},
            success: function (data){
                if(data == ''){
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 2000,
                        timerProgressBar: true
                        })

                        Toast.fire({
                        icon: 'success',
                        title: 'Product Add to Cart !!',
                    })
                    $('#quantity').text(quantity + 1)
                }else{
                    $('#quantity').text(quantity + 1)
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 2000,
                        timerProgressBar: true
                        })

                        Toast.fire({
                        icon: 'warning',
                        title: 'Product Already to Cart !!',
                    })   
                }
            }
        })
    })


</script>
@endsection