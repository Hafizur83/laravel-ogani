<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CatagoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\SiteSettingController;
/*
|---------------------------------------
| Admin Routes
|---------------------------------------
*/

Route::prefix('/admin')->group(function(){
    Route::get('/',[DashboardController::class,'index']);
    Route::resource('/blogs',BlogController::class);
    Route::resource('/catagory',CatagoryController::class);
    Route::resource('/product',ProductController::class);
    Route::resource('/pages',PageController::class);
    Route::resource('/sitesetting',SiteSettingController::class);
    Route::get('/pages/status/{id}',[PageController::class,'pageStatus']);
    Route::resource('/coupon',CouponController::class);
    Route::get('/coupon/status/{id}',[CouponController::class,'couponStatus']);
    Route::get('/orders',[OrderController::class,'index']);
    Route::get('/orders/view/{order_id}',[OrderController::class,'viewOrder']);
});

/*
|---------------------------------------
| Site Routes
|---------------------------------------
*/
Route::prefix('/')->middleware(['auth:sanctum', 'verified'])->group(function(){
    Route::get('/dashboard',[SiteController::class,'userdashboard']);
    Route::get('/order/view/{order_id}',[SiteController::class,'orderview']);

# Wishlist Routea
    Route::get('/wishlist',[WishlistController::class,'index']);
    Route::get('/wishlist/get',[WishlistController::class,'getData']);
    Route::post('/add/wishlist',[WishlistController::class,'store'])->name('add.wishlist');
    Route::post('/wishlist/delete',[WishlistController::class,'destroy'])->name('wishlist.delete');
});

Route::prefix('/')->group(function(){
    Route::get('/',[SiteController::class,'index']);
    Route::get('/shop',[SiteController::class,'shop']);
    Route::get('/blog',[SiteController::class,'blog']);
    Route::get('/blog_details/{id}',[SiteController::class,'blog_details']);
    Route::get('/contact',[SiteController::class,'contact']);
    Route::get('/catagory/{cat_id}',[SiteController::class,'catagorywise']);
    Route::get('/product_details/{id}',[SiteController::class,'product_details']);

    //-------------Cart Route----------
    Route::get('/cart/getdata',[CartController::class,'getData'])->name('cart.data');

    Route::get('/shoping_cart',[CartController::class,'shoping_cart']);
    Route::post('/add/to-cart',[CartController::class,'addtoCart'])->name('add.cart');

    Route::post('/cart/delete',[CartController::class,'cartDelete'])->name('cart.delete');

    Route::post('/cart/update',[CartController::class,'cart_update'])->name('cart.update');

    //-------------Coupon Route----------
    Route::post('/coupon/apply',[CartController::class,'couponApply']);
    Route::get('/coupon/destroy',[CartController::class,'couponDestroy']);
    Route::get('/checkout',[CartController::class,'checkout']);

    //-------------Order Route----------
    Route::post('/place/order',[OrderController::class,'placeOrder']);
    Route::get('/order/complete',[OrderController::class,'orderComplete']);
});





















/*
|---------------------------------------
| Web Routes
|---------------------------------------
*/
// Route::get('/', function () {
//     return view('welcome');
// });

// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');
