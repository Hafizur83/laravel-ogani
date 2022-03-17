<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shipping;
use App\Models\Order;
use App\Models\Order_item;
use App\Models\Cart;
use Session;
use Auth;
use Carbon\Carbon;

class OrderController extends Controller
{
    public function viewOrder($order_id){
        $order = Order::find($order_id);
        $shipping = Shipping::where('order_id',$order_id)->first();
        $order_items = Order_item::where('order_id',$order_id)->get();
        return view('admin.order.show',compact('order','shipping','order_items'));
    }
    public function index(){
        $orders = Order::get();
        return view('admin.order.index',compact('orders'));
    }

    public function placeOrder(Request $request)
    {
        $validated = $request->validate([
            'payment_type' => 'required',
        //     'shipping_firstName' => 'required',
            'shipping_lastName' => 'required',
        //     'shipping_email' => 'required',
            'shipping_phone' => 'required',
        //     // 'address' => 'required',
        //     'district' => 'required',

        //     'post_code' => 'required',
        // ],[
        //     'payment_type.required' => 'Catagory name can not be empty',
        ]);

        $order_id = Order::insertGetId([
            'user_id' => Auth::user()->id,
            'payment_type' => $request->payment_type,
            'total' => $request->total,
            'subtotal' => $request->subtotal,
            'coupon_discount' => $request->coupon_discount,
            'invoice_no' =>  mt_rand(10000000,99999999),
            'created_at' => Carbon::now(),
        ]);

        $carts = Cart::where('user_ip',request()->ip())->get();
foreach($carts as $cart){
    Order_item::create([
            'order_id' => $order_id,
            'product_id' => $cart->product_id,
            'product_qty' => $cart->qty,
        ]);
    }
        Shipping::create([
            'order_id' => $order_id,
            'shipping_firstName' => $request->shipping_firstName,
            'shipping_lastName' => $request->shipping_lastName,
            'shipping_email' => $request->shipping_email,
            'shipping_phone' => $request->shipping_phone,
            'address' => $request->address,
            'district' => $request->district,
            'post_code' => $request->post_code
        ]);

        if(Session::has('coupon_name')){
            Session()->forget('coupon_name');
        }
        $carts = Cart::where('user_ip',request()->ip())->delete();

        return redirect('order/complete')->with('order_done', 'Order Complete Successfully !!');
    }

    public function orderComplete(){
        return view('site.order_complete');
    }

}