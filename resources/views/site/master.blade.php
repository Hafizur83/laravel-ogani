<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ogani Template">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ogani | Template @yield('title') </title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="{{asset('public/site/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/site/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/site/css/elegant-icons.css')}}">
    <link rel="stylesheet" href="{{asset('public/site/css/nice-select.css')}}">
    <link rel="stylesheet" href="{{asset('public/site/css/jquery-ui.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/site/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/site/css/slicknav.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/site/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('public/css/sweetalert2.min.css')}}">
    @yield('style')
</head>

<body>
    <!-- Page Preloder -->
    <!-- <div id="preloder">
        <div class="loader"></div>
    </div> -->
    <?php
    $siteSetting =App\Models\SiteSetting::first();
   
   ?>
    <!-- Humberger Begin -->
    <div class="humberger__menu__overlay"></div>
    <div class="humberger__menu__wrapper">
        <div class="humberger__menu__logo">
            <a href="#"><img src="img/logo.png" alt=""></a>
        </div>
        <div class="humberger__menu__cart">
            <ul>
                <li><a href="#"><i class="fa fa-heart"></i> <span>1</span></a></li>
                <li><a href="#"><i class="fa fa-shopping-bag"></i> <span>3</span></a></li>
            </ul>
            <div class="header__cart__price">item: <span>$150.00</span></div>
        </div>
        <div class="humberger__menu__widget">
            <div class="header__top__right__language">
                <img src="img/language.png" alt="">
                <div>English</div>
                <span class="arrow_carrot-down"></span>
                <ul>
                    <li><a href="#">Spanis</a></li>
                    <li><a href="#">English</a></li>
                </ul>
            </div>
            <div class="header__top__right__auth">
                <a href="#"><i class="fa fa-user"></i> Login</a>
            </div>
        </div>
        <nav class="humberger__menu__nav mobile-menu">
            <ul>
                <li class="active"><a href="./index.html">Home</a></li>
                <li><a href="{{url('/shop')}}">Shop</a></li>
                <li><a href="#">Pages</a>
                    <ul class="header__menu__dropdown">
                        <li><a href="./shop-details.html">Shop Details</a></li>
                        <li><a href="./shoping-cart.html">Shoping Cart</a></li>
                        <li><a href="./checkout.html">Check Out</a></li>
                        <li><a href="./blog-details.html">Blog Details</a></li>
                    </ul>
                </li>
                <li><a href="./blog.html">Blog</a></li>
                <li><a href="{{url('/contact')}}">Contact</a></li>
            </ul>
        </nav>
        <div id="mobile-menu-wrap"></div>
        <div class="header__top__right__social">
            <a href="#"><i class="fa fa-facebook"></i></a>
            <a href="#"><i class="fa fa-twitter"></i></a>
            <a href="#"><i class="fa fa-linkedin"></i></a>
            <a href="#"><i class="fa fa-pinterest-p"></i></a>
        </div>
        <div class="humberger__menu__contact">
            <ul>
                <li><i class="fa fa-envelope"></i> {{ $siteSetting->email }}</li>
                <li>Free Shipping for all Order of $99</li>
            </ul>
        </div>
    </div>
    <!-- Humberger End -->

    <!-- Header Section Begin -->
    <header class="header">
        <div class="header__top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__left">
                            <ul>

                                
                                <li><i class="fa fa-envelope"></i> {{ $siteSetting->email }}</li>
                                <li>Free Shipping for all Order of $99</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__right">
                            <div class="header__top__right__social">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-linkedin"></i></a>
                                <a href="#"><i class="fa fa-pinterest-p"></i></a>
                            </div>
                            <div class="header__top__right__language">
                                <img src="img/language.png" alt="">
                                <div>English</div>
                                <span class="arrow_carrot-down"></span>
                                <ul>
                                    <li><a href="#">Spanis</a></li>
                                    <li><a href="#">English</a></li>
                                </ul>
                            </div>
                            <div class="header__top__right__auth">
                            @if(Auth::check())
                                <a href="{{url('dashboard')}}"><i class="fa fa-user"></i> My Account</a>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <a href="{{ route('logout')}}" onclick="event.preventDefault();
                                                    this.closest('form').submit();"><i class="fa fa-user"></i> Log out</a> 
                                </form> 
                            @else
                                <a href="#" data-toggle="modal" data-target="#loginModal"><i class="fa fa-user"></i> Login</a>
                                <a href="#" data-toggle="modal" data-target="#loginModal"><i class="fa fa-user"></i> Register</a>
                                
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="header__logo">
                        <a href="{{ url('/') }}"><img src="{{ asset('public/images/'.$siteSetting->site_logo ) }}" alt="logo"></a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <nav class="header__menu">
                        <ul>
                            <li class="active"><a href="{{url('/')}}">Home</a></li>
                            <li><a href="{{url('shop')}}">Shop</a></li>
                            <li><a href="{{url('blog')}}">Blog</a></li>
                            <li><a href="{{url('contact')}}">Contact</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-3">
                    <div class="header__cart">
                    <?php
                        $total = App\Models\Cart::all()->where('user_ip',request()->ip())->sum(function($t){
                            return $t->qty * $t->price;
                        });
                        $quantity = App\Models\Cart::all()->where('user_ip',request()->ip())->sum('qty');
                        $wishlist_count = App\Models\Wishlist::count();
                        ?>
                        <ul>
                            <li><a href="{{url('/wishlist')}}"><i class="fa fa-heart"></i> <span id="wishlist_count">{{$wishlist_count}}</span></a></li>
                            <li><a href="{{url('/shoping_cart')}}"><i class="fa fa-shopping-bag"></i> <span id="quantity">{{$quantity}}</span></a></li>
                        </ul>
                        <div class="header__cart__price">item: <span>${{$total}}.00</span></div>
                    </div>
                </div>
            </div>
            <div class="humberger__open">
                <i class="fa fa-bars"></i>
            </div>
        </div>
    </header>
    <!-- Header Section End -->
    <div class="container">
  <!--End Show Message-->
  @if(Session::has('success'))
        <div class="alert alert-success">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Success!</strong>

            {{Session::get('success')}}
        </div>
        @endif
          <!--End Show Message-->
  @if(Session::has('delete'))
        <div class="alert alert-danger">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Success!</strong>

            {{Session::get('delete')}}
        </div>
        @endif
        </div>
@yield('main_content')
<div class="modal fade" id="loginModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="h4 modal-title">Login</h5>
                        <button class="close" data-dismiss="modal" aria-label="Close">&times;</button>
                    </div>
                    <div class="modal-body">
                    <p class="h6 text-center text-danger" id="wishlist_login">You must login first</p>
                    <form method="POST" action="{{ route('login') }}">
                    @csrf
                        <div class="form-group">
                            <label for="email">E-Mail</label>
                            <input type="text" name="email" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="text" name="password" class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" value="Login">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        </div>
                    </form>
                    </div>
                    
                </div>
            </div>
        </div>

        <!-- Footer Section Begin -->
        <footer class="footer spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="footer__about">
                        <div class="footer__about__logo">
                            <a href="./index.html"><img src="img/logo.png" alt=""></a>
                        </div>
                        <ul>
                            <li>Address: {{ $siteSetting->address }}</li>
                            <li>Phone: {{ $siteSetting->phone }}</li>
                            <li>Email: {{ $siteSetting->email }}</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 offset-lg-1">
                    <div class="footer__widget">
                        <h6>Useful Links</h6>
                        <ul>
                            <?php
                            $pages = App\Models\Page::where('status', 1)->get();

                            ?>
                            @foreach($pages as $page)

                            <li><a href="{{url($page->link)}}">{{$page->name}}</a></li>

                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12">
                    <div class="footer__widget">
                        <h6>Join Our Newsletter Now</h6>
                        <p>Get E-mail updates about our latest shop and special offers.</p>
                        <form action="#">
                            <input type="text" placeholder="Enter your mail">
                            <button type="submit" class="site-btn">Subscribe</button>
                        </form>
                        <div class="footer__widget__social">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-instagram"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-pinterest"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="footer__copyright">
                        <div class="footer__copyright__text"><p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p></div>
                        <div class="footer__copyright__payment"><img src="img/payment-item.png" alt=""></div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Section End -->

    <!-- Js Plugins -->
    <script src="{{asset('public/site/js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{asset('public/site/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('public/site/js/jquery.nice-select.min.js')}}"></script>
    <script src="{{asset('public/site/js/jquery-ui.min.js')}}"></script>
    <script src="{{asset('public/site/js/jquery.slicknav.js')}}"></script>
    <script src="{{asset('public/site/js/mixitup.min.js')}}"></script>
    <script src="{{asset('public/site/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('public/js/sweetalert2.all.min.js')}}"></script>
    <script src="{{asset('public/site/js/main.js')}}"></script>

@yield('script')




</body>

</html>