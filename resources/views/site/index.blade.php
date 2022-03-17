@extends('site.master')

@section('title')
Homepage
@endsection
@section('style')
<style>
.featured__item__pic__hover li button {font-size: 16px;color: #1c1c1c;height: 40px;width: 40px;line-height: 40px;text-align: center;border: 1px solid #ebebeb;background: #ffffff;display: block;border-radius: 50%;-webkit-transition: all, 0.5s;-moz-transition: all, 0.5s;-ms-transition: all, 0.5s;-o-transition: all, 0.5s;transition: all, 0.5s;}
.featured__item__pic__hover li:hover button {background: #7fad39;border-color: #7fad39;}
.featured__item__pic__hover li:hover i {color: #ffffff;transform: rotate(360deg);}
</style>
@endsection

@section('main_content')
    <!-- Hero Section Begin -->
    <section class="hero">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="hero__categories">
                        <div class="hero__categories__all">
                            <i class="fa fa-bars"></i>
                            <span>All departments</span>
                        </div>
                        <ul>
                        <?php
                        $catagories = App\Models\Catagory::latest()->get();
                        ?>
                        @foreach($catagories as $catagorie)
                            <li><a href="{{url('catagory/'.$catagorie->id)}}">{{$catagorie->cat_name}}</a></li>
                        @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="hero__search">
                        <div class="hero__search__form">
                            <form action="#">
                                <div class="hero__search__categories">
                                    All Categories
                                    <span class="arrow_carrot-down"></span>
                                </div>
                                <input type="text" placeholder="What do yo u need?">
                                <button type="submit" class="site-btn">SEARCH</button>
                            </form>
                        </div>
                        <div class="hero__search__phone">
                            <div class="hero__search__phone__icon">
                                <i class="fa fa-phone"></i>
                            </div>
                            <div class="hero__search__phone__text">
                                <h5>+65 11.188.888</h5>
                                <span>support 24/7 time</span>
                            </div>
                        </div>
                    </div>
                    <div class="hero__item set-bg" data-setbg="{{asset('public/site/images/hero/banner.jpg')}}">
                        <div class="hero__text">
                            <span>FRUIT FRESH</span>
                            <h2>Vegetable <br />100% Organic</h2>
                            <p>Free Pickup and Delivery Available</p>
                            <a href="#" class="primary-btn">SHOP NOW</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->
    <!-- Categories Section Begin -->
    <section class="categories">
        <div class="container">
            <div class="row">
                <div class="categories__slider owl-carousel">
                            @foreach($products as $product)
                    <div class="col-lg-3">
                        <div class="categories__item set-bg" data-setbg="{{asset('public/site/images/products/'.$product->product_img)}}">
                            <h5><a href="{{url('product_details')}}">{{$product->product_name}}</a></h5>
                        </div>
                    </div>
                            @endforeach
                </div>
            </div>
        </div>
    </section>
    <!-- Categories Section End -->

    <!-- Featured Section Begin -->
    <section class="featured spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Featured Product</h2>
                    </div>
                    <div class="featured__controls">
                        <ul>
                            <li class="active" data-filter="*">All</li>
                            @foreach($catagories as $catagory)
                            <li data-filter=".filter{{$catagory->id}}">{{$catagory->cat_name}}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row featured__filter">
            @foreach($catagories as $catagory)
            <?php
            $f_products = App\Models\Product::where('cat_id',$catagory->id)->get();
            
            ?>
            @foreach($f_products as $f_product)
                <div class="col-lg-3 col-md-4 col-sm-6 mix filter{{$catagory->id}}">
                    <div class="featured__item">
                        <div class="featured__item__pic set-bg" data-setbg="{{asset('public/site/images/products/'.$f_product->product_img)}}">
                            <ul class="featured__item__pic__hover">
                        @if(Auth::check())
                                <li> <button data-id="{{ $f_product->id }}" id="addwish"><i class="fa fa-heart"></i></button></li>
                        @else
                                <li><a href="#" data-toggle="modal" data-target="#loginModal"><i class="fa fa-heart"></i></a></li>
                        @endif
                                <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                <li> <button data-id="{{ $f_product->id }}" id="addcart"><i class="fa fa-shopping-cart"></i></button></li>
                            </ul>
                        </div>
                        <div class="featured__item__text">
                            <h6><a href="{{url('product_details/'.$f_product->id)}}">{{$f_product->product_name}}</a></h6>
                            <h5>${{$f_product->price}}</h5>
                        </div>
                    </div>
                </div>
                
            @endforeach
            @endforeach

            </div>
        </div>
    </section>
    <!-- Featured Section End -->

    <!-- Banner Begin -->
    <div class="banner">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="banner__pic">
                        <img src="{{asset('public/site/images/banner/banner-1.jpg')}}" alt="">
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="banner__pic">
                        <img src="img/banner/banner-2.jpg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Banner End -->

    <!-- Latest Product Section Begin -->
    <section class="latest-product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6">
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
                <div class="col-lg-4 col-md-6">
                    <div class="latest-product__text">
                        <h4>Top Rated Products</h4>
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
                <div class="col-lg-4 col-md-6">
                    <div class="latest-product__text">
                        <h4>Review Products</h4>
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
    </section>
    <!-- Latest Product Section End -->

    <!-- Blog Section Begin -->
    <section class="from-blog spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title from-blog__title">
                        <h2>From The Blog</h2>
                    </div>
                </div>
            </div>
            <div class="row">
@forelse ($blogs as $blog)
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="blog__item">
                        <div class="blog__item__pic">
                            <img src="{{asset('public/images/blog/'.$blog->image)}}" alt="">
                        </div>
                        <div class="blog__item__text">
                            <ul>
                                <li><i class="fa fa-calendar-o"></i> {{$blog->created_at->diffForHumans()}}</li>
                                <li><i class="fa fa-comment-o"></i> 5</li>
                            </ul>
                            <h5><a href="#">{{$blog->title}}</a></h5>
                            <p>{{Str::limit($blog->body,90)}} </p>
                        </div>
                    </div>
                </div>
                @empty
                <h3>No Data Available</h3>
                @endforelse
            </div>
        </div>
    </section>
    <!-- Blog Section End -->
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
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Product Add to Wishlist !!',
                        showConfirmButton: false,
                        timer: 1500
                        })
                    $('#wishlist_count').text(wishlist_count + 1)
                }else{
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Product Already to Wishlist !!',
                        showConfirmButton: false,
                        timer: 1500
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
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Product Add to Cart !!',
                        showConfirmButton: false,
                        timer: 1500
                        })
                    $('#quantity').text(quantity + 1)
                }else{
                    $('#quantity').text(quantity + 1)
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Product Already to Cart !!',
                        showConfirmButton: false,
                        timer: 1500
                        })
                        
                }
            }
        })
    })


</script>
@endsection