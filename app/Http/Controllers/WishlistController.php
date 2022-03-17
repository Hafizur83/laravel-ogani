<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Wishlist;
use Auth;

class WishlistController extends Controller
{
    public function getData(){
        $wishlists = Wishlist::get();

        if(Wishlist::count() == 0){
            return '<tr> <td colspan="4">No Data Available </td> </tr>';
        }else{
            $output = '';
        foreach($wishlists as $wishlist){ 
            $output .='<tr>
                <td style="width:20% !important" class="shoping__cart__item">
                <img width="100px" src="'.asset("public/site/images/products").'/'.$wishlist->product->product_img.'" alt="Product">
                </td>
                <td style="width:40% !important" class="shoping__cart__item">
                    <h5>'.$wishlist->product->product_name.'</h5>
                </td>
                <td style="width:25% !important" class="shoping__cart__price">
                    $'.$wishlist->product->price.'.00
                </td>
                <td style="width:15% !important" class="shoping__cart__item__close">
                    <button data-id="'. $wishlist->id.'" type="button" id="wishlist_destroy" class="btn btn-sm btn-destroy"><span class="icon_close"></span></button>
                </td>
            </tr>';
            }
        return $output;
        }
    }

    public function index(){
        return view("site.wishlist");
    }
    
    public function store(Request $r){
        $product_id = $r->id;
        $check = Wishlist::where('product_id',$product_id)->first();

        if($check){
            return 'has';
        }else{
            Wishlist::create([
                'user_id' => Auth::user()->id,
                'product_id' => $r->id
            ]);
        }
        
    }

    public function destroy(Request $r){
        Wishlist::destroy($r->id);
        return redirect()->back()->with('success', 'Product Remove from Wishlist Successfully !!');
    }
}
