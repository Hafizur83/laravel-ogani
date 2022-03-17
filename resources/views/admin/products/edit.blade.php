@extends('admin.master')
@section('title')
Homepage
@endsection

@section('main_content')
<div class="card">
    <div class="card-header">
        <h2>Update Product</h2>
    </div>


    <div class="card-body">
        <form action="{{route('product.update',$product->id)}}" method="post" enctype="multipart/form-data" class="row">
        @csrf
        @method('PUT')
            <div class="col-md-4 mb-2">
                <label for="name" class="form-label"> Product Name</label>
                <input type="text" name="product_name" class="form-control" id="name" value="{{$product->product_name}}">
            </div>
            <div class="col-md-4 mb-2">
                <label for="name" class="form-label"> Product Price</label>
                <input type="text" name="price" class="form-control" id="name" value="{{$product->price}}">
            </div>
            <div class="col-md-4 mb-2">
                <label for="name" class="form-label"> Product Quantity</label>
                <input type="text" name="product_quantity" class="form-control" id="name" value="{{$product->product_quantity}}">
            </div>
            <div class="col-md-6">
                <label for="password" class="form-label">Short Description</label>
                <textarea class="form-control" name="short_des" id="" cols="30" rows="10">{{$product->short_des}}</textarea>
            </div>
            <div class="col-md-6">
                <label for="password" class="form-label">Full Description</label>
                <textarea class="form-control" name="long_des" id="" cols="30" rows="10">{{$product->long_des}}</textarea>
            </div>
           
            <div class="col-md-6">
                <label for="catagory" class="form-label">Catagory</label>
                <select name="cat_id" class="form-control" id="catagory">
                    @foreach($catagories as $catagory)
                    
                    <option value="{{$catagory->id}}" {{$catagory->id == $product->cat_id ? 'selected' : ''}}>{{$catagory->cat_name}}</option>

                    @endforeach
                </select>
            </div>
            <div class="col-md-6 mt-2">
                <label for="img" class="form-label">Product Image</label>
                <input type="file" name="product_img" class="form-control">
                <img src="{{url('public/site/images/products/'.$product->product_img)}}" alt="Image">
                <input type="hidden" name="old_img" value="{{$product->product_img}}">
            </div>
            <div class="col-12 mt-4 text-center">
                <button class="btn btn-primary" name="submit" type="submit">Update Product</button>
                <a href="{{url('admin/product')}}" class="btn btn-secondary">Back</a>
            </div>
        </form>
    </div>
</div>
@endsection