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
        $subtotal = Cart::all()->where('user_ip',request()->ip())->sum(function($st){
            return $st->price * $st->qty;
        });
        $coupun = Session::has('coupon_name');
        if(Wishlist::count() == 0){
            return '<tr> <td colspan="4">No Data Available </td> </tr>';
        }else{
            $output = '<section class="shoping-cart spad">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="shoping__cart__table">
                            <table>
                                <thead>
                                    <tr>
                                        <th class="shoping__product">Products</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th>Total</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>';

        foreach($carts as $row){ 
            $output .='<tr>
                <td style="width:20% !important" class="shoping__cart__item">
                <img width="100px" src="'.asset("public/site/images/products").'/'.$row->product->product_img.'" alt="Product">
                </td>
                <td style="width:40% !important" class="shoping__cart__item">
                    <h5>'.$row->product->product_name.'</h5>
                </td>
                <td style="width:25% !important" class="shoping__cart__price">
                    $'.$row->product->price.'.00
                </td>
                <td class="shoping__cart__quantity">
                    <div class="quantity">
                        <input type="hidden" name="cart_id" value="'.$row->id.'" id="cart_id">
                            <div class="pro-qty">
                                <input type="text" name="qty" value="'.$row->qty.'" id="qtyval">
                            </div>
                    </div>
                </td>
                <td class="shoping__cart__total">
                    $'.$row->qty * $row->price.'.00
                </td>
                <td style="width:15% !important" class="shoping__cart__item__close">
                    <button data-id="'. $row->id.'" type="button" id="wishlist_destroy" class="btn btn-sm btn-destroy"><span class="icon_close"></span></button>
                </td>
            </tr>';
            }       
            // End Foreach 

            $output .= ' </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="shoping__cart__btns">
                            <a href="'.url("/").'" class="primary-btn cart-btn">CONTINUE SHOPPING</a>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="shoping__continue">';

        if($coupun){ }else{
            $output .= ' <div class="shoping__discount">
                    <h5>Discount Codes</h5>
                    <form action="" method="post">
                        <input type="text" name="coupon_code" placeholder="Enter your coupon code">
                        <button type="submit" class="site-btn">APPLY COUPON</button>
                    </form>
                </div>';
        }  // End If

        $output .= '  </div>
            </div>
            <div class="col-lg-6">
                <div class="shoping__checkout">
                    <h5>Cart Total</h5>
                    <ul>
                        <li>Subtotal <span id="subtotal">$'.$subtotal.'</span></li>
                        <input type="hidden" value="'.$subtotal.'" id="subtotalval">';

        if($coupun){ 
          
            $output .= '<li>Coupon <span class="float-let">'.Session()->get("coupon_name")["coupon_name"].'</span>
                        <a href="'.url('/coupon/destroy').'"><span class="icon_close"></span></a>
                    </li>
                    <li>Discount <span>'.$discount_percentage = Session()->get("coupon_name")["discount"].' ($ '.$discount = $subtotal * $discount_percentage .'</span></li>
                    <li>Total <span id="total">$'.$subtotal - $discount.'</span></li>
                    <input type="hidden" value="'.$subtotal - $discount.'" id="totalval">';

        }else{
            $output .= '<li>Total <span id="total">$'.$subtotal.'</span></li>
                        <input type="hidden" value="'.$subtotal.'" id="totalval">';
        }  // End If

        $output .= '</ul>
                    <a href="'.url('checkout').'" class="primary-btn">PROCEED TO CHECKOUT</a>
                </div>
            </div>
            </div>
            </div>
            </section>';
            $output .= 'gggggggg';

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
    }

    public function couponApply(Request $request){
        $check = Coupon::where('coupon_name',$request->coupon_code)->first();
        if($check){
            Session::put('coupon_name',[
                'coupon_name' => $check->coupon_name,
                'discount' => $check->discount,
            ]);
            return redirect()->back()->with('cart_success', 'Coupon Apply Successfully !!');
        }else{
            return redirect()->back()->with('cart_delete', 'Coupon is  Invalid !!');
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
        return redirect()->back()->with('cart_delete', 'Coupon is  Remove !!');
    }
    
}
