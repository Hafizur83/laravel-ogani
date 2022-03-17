<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Catagory;

class ProductController extends Controller
{
    
    public function index()
    {
        $products = Product::get();
        return view('admin.products.index',compact('products'));
    }


    public function create()
    {
        $catagories = Catagory::get();
        return view('admin.products.create',compact('catagories'));
    }

    
    public function store(Request $request)
    {
        $product_img = time().'-'.$request->file('product_img')->getClientOriginalName();
        $dir = $request->product_img->move(public_path('site/images/products'),$product_img);
        
        Product::create([
            'product_name' => $request->input('product_name'),
            'product_slug' => strtolower(str_replace('','-',$request->input('product_name'))),
            'cat_id' => $request->input('cat_id'),
            'short_des' => $request->input('short_des'),
            'long_des' => $request->input('long_des'),
            'price' => $request->input('price'),
            'product_quantity' => $request->input('product_quantity'),
            'product_img' => $product_img
        ]);
        return redirect('admin/product')->with('success', 'Product Add Successfully !!');
    }

    public function edit($id)
    {
        $product = Product::find($id);
        $catagories = Catagory::get();
        return view('admin.products.edit',compact(['product','catagories']));
    }

    
    public function update(Request $request, $id)
    {
        $new_img = $request->file('product_img');
        $old_img = $request->input('old_img');
        if(!$new_img){
            $updateName = $old_img;
        }else{
            unlink('public/site/images/products/'.$old_img);
            $product_img = time().'-'.$request->file('product_img')->getClientOriginalName();
            $dir = $request->product_img->move(public_path('site/images/products'),$product_img);
            $updateName = $product_img;
        }

        Product::find($id)->update([
            'product_name' => $request->input('product_name'),
            'product_slug' => strtolower(str_replace('','-',$request->input('product_name'))),
            'cat_id' => $request->input('cat_id'),
            'short_des' => $request->input('short_des'),
            'long_des' => $request->input('long_des'),
            'price' => $request->input('price'),
            'product_quantity' => $request->input('product_quantity'),
            'product_img' => $updateName
        ]);
        return redirect('admin/product')->with('success', 'Product Update Successfully !!');
    }

   
    public function destroy($id)
    {
        $product = Product::find($id);
        $image = 'public/site/images/products/'.$product->product_img;
        unlink($image);
        $product->delete();
        
        return redirect()->back()->with('success', 'Product Delete Successfully !!');
    }
}
