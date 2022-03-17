<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Catagory;
use App\Models\Order_item;
use App\Models\Order;
use App\Models\Shipping;
use App\Models\Blog;

class SiteController extends Controller
{
    public function index(){
        $products = Product::get();
        $lts_products = Product::latest()->limit(3)->get();
        $catagories = Catagory::get();
        $blogs = Blog::latest()->limit(3)->get();
        return view('site.index',compact('products','catagories','lts_products','blogs'));
    }

    public function shop(){
        $products = Product::get();
        $productsp = Product::latest()->paginate(5);
        $lts_products = Product::latest()->limit(3)->get();
        return view("site.shop",compact('products','lts_products','productsp'));
    }

    public function blog(){
        $blogs = Blog::latest()->paginate(4);
        $l_blogs = Blog::latest()->limit(3)->get();
        return view("site.blog",compact('blogs','l_blogs'));
    }

    public function blog_details($id){
        $blog = Blog::find($id);
        $l_blogs = Blog::latest()->limit(3)->get();
        return view('site.blog_details',compact('blog','l_blogs'));
    }

    public function contact(){
        $products = Product::get();
        $productsp = Product::latest()->paginate(5);
        $lts_products = Product::latest()->limit(3)->get();
        return view("site.contact",compact('products','lts_products','productsp'));
    }
    
    public function product_details($id){
        $product = Product::find($id);
        return view('site.product_details',compact('product'));
    }
    public function userdashboard(){
        $orders = Order::get();
        $order_items = Order_item::get();
        $shippings = Shipping::get();
        return view("site.dashboard",compact('orders','order_items','shippings'));
    }
    public function orderview($order_id){
        $orders = Order::get();
        $shipping = Shipping::where('order_id',$order_id)->first();
        $order_items = Order_item::where('order_id',$order_id)->get();
        return view("site.orderview",compact('orders','order_items','shipping'));
    }

    public function catagorywise($cat_id){
        $productsp = Product::where('cat_id',$cat_id)->latest()->paginate(5);
        $lts_products = Product::latest()->limit(3)->get();
        return view("site.catagory",compact('lts_products','productsp'));
    }
    
}