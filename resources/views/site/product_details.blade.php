@extends('site.master')
@section('title')
product_details
@endsection

@section('main_content')
@include('site.hero')
    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="{{asset('public/site/images/breadcrumb.jpg')}}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>{{$product->product_name}}’s Package</h2>
                        <div class="breadcrumb__option">
                            <a href="{{url('/')}}">Home</a>
                            <a href="#">Vegetables</a>
                            <span>{{$product->product_name}}’s Package</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->
    <!-- Product Details Section Begin -->
    <section class="product-details spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="product__details__pic">
                        <div class="product__details__pic__item">
                            <img class="product__details__pic__item--large"
                                src="{{asset('public/site/images/products/'.$product->product_img)}}" alt="">
                        </div>
                        <div class="product__details__pic__slider owl-carousel">
                            <img data-imgbigurl="{{asset('public/site/images/products/'.$product->product_img)}}"
                                src="{{asset('public/site/images/products/'.$product->product_img)}}" alt="">
                            <img data-imgbigurl="{{asset('public/site/images/products/'.$product->product_img)}}"
                                src="{{asset('public/site/images/products/'.$product->product_img)}}" alt="">
                            <img data-imgbigurl="{{asset('public/site/images/products/'.$product->product_img)}}"
                                src="{{asset('public/site/images/products/'.$product->product_img)}}" alt="">
                            <img data-imgbigurl="{{asset('public/site/images/products/'.$product->product_img)}}"
                                src="{{asset('public/site/images/products/'.$product->product_img)}}" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="product__details__text">
                        <h3>{{$product->product_name}}’s Package</h3>
                        <div class="product__details__rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-half-o"></i>
                            <span>(18 reviews)</span>
                        </div>
                        <div class="product__details__price">${{$product->price}}.00</div>
                        <p>{{$product->short_des}}</p>
                        <div class="product__details__quantity">
                            <div class="quantity">
                                <div class="pro-qty">
                                    <input type="text" value="1">
                                </div>
                            </div>
                        </div>
                        <form action="{{url('add/to-cart/'.$product->id)}}" method="post">
                            @csrf
                            <input type="hidden" name="price" value="{{$product->price}}">
                            <button class="primary-btn" type="submit">ADD TO CARD</button>
                        </form>
                        @if(Auth::check())
                            <form action="{{url('wishlist/add/'.$product->id)}}" method="post">
                            @csrf
                                    <input type="hidden" name="product_id" value="{{$product->id}}">
                                    <button type="submit"><i class="icon_heart_alt"></i></button>
                            </form>
                        @else
                            <a href="#" data-toggle="modal" data-target="#loginModal"><i class="icon_heart_alt"></i></a>
                        @endif
                        <ul>
                            <li><b>Availability</b> <span>In Stock</span></li>
                            <li><b>Shipping</b> <span>01 day shipping. <samp>Free pickup today</samp></span></li>
                            <li><b>Weight</b> <span>0.5 kg</span></li>
                            <li><b>Share on</b>
                                <div class="share">
                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                    <a href="#"><i class="fa fa-instagram"></i></a>
                                    <a href="#"><i class="fa fa-pinterest"></i></a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="product__details__tab">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab"
                                    aria-selected="true">Description</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#tabs-2" role="tab"
                                    aria-selected="false">Information</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#tabs-3" role="tab"
                                    aria-selected="false">Reviews <span>(1)</span></a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="tabs-1" role="tabpanel">
                                <div class="product__details__tab__desc">
                                    <h6>Products Infomation</h6>
                                    <p>{{$product->long_des}}</p>
                                </div>
                            </div>
                            <div class="tab-pane" id="tabs-2" role="tabpanel">
                                <div class="product__details__tab__desc">
                                    <h6>Products Infomation</h6>
                                    <p>{{$product->long_des}}</p>
                                </div>
                            </div>
                            <div class="tab-pane" id="tabs-3" role="tabpanel">
                                <div class="product__details__tab__desc">
                                    <h6>Products Infomation</h6>
                                    <p>{{$product->long_des}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Product Details Section End -->

        <!-- Related Product Section Begin -->
        <section class="related-product">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title related__product__title">
                        <h2>Related Product</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php
                
                $related = App\Models\Product::where('cat_id',$product->cat_id)->get();
                ?>
                @foreach($related as $show)
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="product__item">
                        <div class="product__item__pic set-bg" data-setbg="{{asset('public/site/images/products/'.$show->product_img)}}">
                            <ul class="product__item__pic__hover">
                                <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                            </ul>
                        </div>
                        <div class="product__item__text">
                            <h6><a href="{{url('product_details/'.$show->id)}}">{{$show->product_name}}</a></h6>
                            <h5>${{$show->price}}.00</h5>
                        </div>
                    </div>
                </div>
@endforeach
            </div>
        </div>
    </section>
    <!-- Related Product Section End -->
@endsection