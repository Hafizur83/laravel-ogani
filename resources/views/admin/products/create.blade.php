@extends('admin.master')
@section('title')
Homepage
@endsection

@section('main_content')
<div class="card">
    <div class="card-header">
        <h2>Welcome to Create</h2>
    </div>


    <div class="card-body">
        <form action="{{route('product.store')}}" method="post" enctype="multipart/form-data" class="row">
        @csrf
            <div class="col-md-4 mb-2">
                <label for="name" class="form-label"> Product Name</label>
                <input type="text" name="product_name" class="form-control" id="name" value="">
            </div>
            <div class="col-md-4 mb-2">
                <label for="name" class="form-label"> Product Price</label>
                <input type="text" name="price" class="form-control" id="name" value="">
            </div>
            <div class="col-md-4 mb-2">
                <label for="name" class="form-label"> Product Quantity</label>
                <input type="text" name="product_quantity" class="form-control" id="name" value="">
            </div>
            <div class="col-md-6">
                <label for="password" class="form-label">Short Description</label>
                <textarea class="form-control" name="short_des" id="" cols="30" rows="10"></textarea>
            </div>
            <div class="col-md-6">
                <label for="password" class="form-label">Full Description</label>
                <textarea class="form-control" name="long_des" id="" cols="30" rows="10"></textarea>
            </div>
           
            <div class="col-md-6">
                <label for="catagory" class="form-label">Catagory</label>
                <select name="cat_id" class="form-control" id="catagory">
                    <option selected disabled value="">Choose one</option>
                    @foreach($catagories as $catagory)
                    <option value="{{$catagory->id}}">{{$catagory->cat_name}}</option>

                    @endforeach
                </select>
            </div>
            <div class="col-md-6 mt-2">
                <label for="validationDefault04" class="form-label">Product Image</label>
                <input type="file" name="product_img" class="form-control">
            </div>
            <div class="col-12 mt-4 text-center">
                <button class="btn btn-primary" name="submit" type="submit">Add Product</button>
            </div>
        </form>
    </div>
</div>
@endsection