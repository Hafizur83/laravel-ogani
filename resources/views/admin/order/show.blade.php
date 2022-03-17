@extends('admin.master')
@section('title')
Order
@endsection

@section('main_content')
<div class="card">
    <div class="card-header">
        <h3 class="h3 float-left">Order</h3>
    </div>
    <div class="card-body">
        <table class="table table-bordered">
            <tbody>
                <tr>
                    <th width="30%">Invoice No.</th><td>{{$order->invoice_no}}</td>
                </tr>
                <tr>
                    <th>Payment Type</th><td>{{$order->payment_type}}</td>
                </tr>
                <tr>
                    <th>Coupon Discount</th><td>{{$order->coupon_discount}}</td>
                </tr> 
                <tr>
                    <th>Sub Total</th><td>{{$order->subtotal}}</td>
                </tr> 
                <tr>
                    <th>Total</th><td>{{$order->total}}</td>
                </tr>
                
            </tbody>
        </table>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Product Image</th>
                    <th>Product Name</th>
                    <th>Quantity</th>
                </tr>
            </thead>
            <tbody>
            @forelse($order_items as $order_item)
                <tr>
                    <td><img width="100px" src="{{asset('public/site/images/products/'.$order_item->product->product_img)}}" alt="Product"></td>
                    <td>{{$order_item->product->product_name}}</td>
                    <td>{{$order_item->product_qty}}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="4">No Data Available </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-4 mb-2">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" value="{{$shipping->shipping_firstName .' '. $shipping->shipping_lastName}}" readonly>
            </div>
            <div class="col-md-4 mb-2">
                <label for="name" class="form-label">Email</label>
                <input type="text" class="form-control" id="name" value="{{$shipping->shipping_email}}" readonly>
            </div>
            <div class="col-md-4 mb-2">
                <label for="name" class="form-label">Phone</label>
                <input type="text" class="form-control" id="name" value="{{$shipping->shipping_phone}}" readonly>
            </div>
            <div class="col-md-4 mb-2">
                <label for="name" class="form-label"> District</label>
                <input type="text" class="form-control" id="name" value="{{$shipping->district}}" readonly>
            </div>
            <div class="col-md-4 mb-2">
                <label for="name" class="form-label">Post Code</label>
                <input type="text" class="form-control" id="name" value="{{$shipping->post_code}}" readonly>
            </div>
            <div class="col-md-4 mb-2">
                <label for="name" class="form-label">  Address</label>
                <input type="text" class="form-control" id="name" value="{{$shipping->address}}" readonly>
            </div>
            <div class="col-12 mt-4 text-center">
            <a class="btn btn-secondary" href="{{url('admin/orders')}}">Back</a>
            </div>
        </div>
    </div>
</div>


@endsection

@section('script')
<script>

</script>
@endsection