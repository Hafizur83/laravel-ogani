<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Product;
use App\Models\Coupon;
use App\Models\Wishlist;
use Session;

class CartController extends Controller
{
    public function getData(){
        $carts = Cart::get();

        if(Cart::count() == 0){
            return '<tr> <td colspan="4">No Data Available </td> </tr>';
        }else{
            $output = '';
        foreach($carts as $row){ 
            $output .='<tr class="cartpage">
                <td class="shoping__cart__item">
                    <img width="100px" src="'.asset("public/site/images/products").'/'.$row->product->product_img.'" alt="Product">
                    <h5>'.$row->product->product_name.'</h5>
                </td>
                <td class="shoping__cart__price">
                    $'.$row->product->price.'.00
                </td>
                <td class="shoping__cart__quantity">
                    <div class="quantity">
                    <input type="hidden" name="cart_id" value="'.$row->id.'" id="cart_id">
                            <div class="pro-qty">
                                <span class="dec qtybtn">-</span>
                                <input type="text" name="qty" value="'.$row->qty.'" id="qtyval">
                                <span class="inc qtybtn">+</span></div>
                            </div>
                    </div>
                </td>
                <td class="shoping__cart__total">
                    $ <span class="grand-total-price">'.$row->qty * $row->price.'</span>.00
                </td>
                <td class="shoping__cart__item__close">
                    <button data-id="'. $row->id.'" type="button" id="cart_destroy" class="btn btn-sm btn-destroy"><span class="icon_close"></span></button>
                </td>
            </tr>';
            }
        return $output;
        }
    }


    public function addtoCart(Request $request){
        $check = Cart::where('product_id',$request->id)->first();
        $product = Product::where('id',$request->id)->first();
        if($check){
            Cart::where('product_id',$request->id)->where('user_ip',request()->ip())->increment('qty');
            return 'has';
        }else{
            Cart::create([
                'product_id' => $request->id,
                'qty' => '1',
                'price' => $product->price,
                'user_ip' => request()->ip()
            ]);
        }

    }
    public function shoping_cart(){
        $carts = Cart::where('user_ip',request()->ip())->latest()->get();
        $subtotal = Cart::all()->where('user_ip',request()->ip())->sum(function($st){
            return $st->price * $st->qty;
        });
        return view('site.shoping_cart',compact('carts','subtotal'));
    }
    
    public function cartDelete(Request $r){
        $card_id = $r->id;
        $cart = Cart::where('id',$card_id)->where('user_ip',request()->ip())->delete();
        return redirect()->back()->with('cart_delete', 'Cart Delete Successfully !!');
    }

    public function cart_update(Request $r){
        Cart::where('id',$r->id)->where('user_ip',request()->ip())->update([
            'qty' =>$r->qty
        ]);
        $cart =  Cart::where('id',$r->id)->where('user_ip',request()->ip())->first();
        $gp_total = $cart->qty * $cart->price;
        $data['gtprice'] = $gp_total;
        return $data;
        
    }

    public function couponApply(Request $request){
        $check = Coupon::where('coupon_name',$request->coupon_code)->first();
        if($check){
            Session::put('coupon_name',[
                'coupon_name' => $check->coupon_name,
                'discount' => $check->discount,
            ]);
            return 'has';
        }
    }

    public function checkout(){

        $carts = Cart::where('user_ip',request()->ip())->latest()->get();
        $subtotal = Cart::all()->where('user_ip',request()->ip())->sum(function($st){
            return $st->price * $st->qty;
        });
        return view('site.checkout',compact('subtotal','carts'));
    }

    public function couponDestroy(){
        if(Session::has('coupon_name')){
            Session()->forget('coupon_name');
        }
    }
    
}
