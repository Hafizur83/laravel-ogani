@extends('admin.master')

@section('title')
Product
@endsection

@section('main_content')
<div class="card">
    <div class="card-header">
        <h3 class="h3 float-left">Products</h3>
        <a href="{{url('admin/product/create')}}" class="btn btn-primary float-right">Add New</a>
    </div>
    <div class="card-body">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Catagory</th>
                    <th scope="col">Image</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $sn = 1 ;?>
@foreach($products as $product)
                <tr>
                    <td>{{$product->product_name}}</td>
                    <td>{{$product->product_quantity}}</td>
                    <td>{{$product->catagory->cat_name}}</td>
                    <td><img width="80px" src="{{asset('public/site/images/products/'.$product->product_img)}}" alt="Image"></td>
                    <td><a href="{{route('product.edit', $product->id)}}"><i class="fas fa-edit"></i></a> |
                        <form class="d-inline" action="{{route('product.destroy', $product->id)}}" method="POST" onsubmit="return confirm('Are you sure want to delete this data')"> @csrf
                            @method('delete')
                        <button type="submit" class="border-0 text-primary"><i class="fas fa-trash"></i></button></form>
                    </td>
                </tr>
@endforeach
            </tbody>
        </table>
    </div>
</div>


@endsection

@section('script')
<script>
</script>
@endsection
