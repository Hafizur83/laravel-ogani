<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Coupon;

class CouponController extends Controller
{
    
    public function index()
    {
        $coupons = Coupon::get();
        return view('admin.coupon',compact('coupons'));
    }

    public function store(Request $request)
    {
        Coupon::create([
            'coupon_name' => $request->input('coupon_name'),
            'discount' => $request->input('discount')
        ]);
        return redirect()->back()->with('success', 'Coupon Add Successfully !!');
    }

    public function update(Request $request, $id)
    {
        Coupon::find($id)->update([
            'coupon_name' => $request->input('coupon_name'),
            'discount' => $request->input('discount')
        ]);
        return redirect()->back()->with('success','Coupon Updated Successfully !!');
    }


    public function destroy($id)
    {
        Coupon::destroy($id);
        return redirect()->back()->with('success','Coupon Deleted Successfully !!');
    }
    public function couponStatus($id){
        $check = Coupon::find($id);
        if($check->status == '1'){
            Coupon::find($id)->update([
                'status' => '0',
            ]);
        }elseif($check->status == '0'){
            Coupon::find($id)->update([
                'status' => '1',
            ]);
        }
        return redirect()->back();
    }
}
