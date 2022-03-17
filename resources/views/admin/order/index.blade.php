@extends('admin.master')
@section('title')
Order
@endsection

@section('main_content')
<div class="card">
    <div class="card-header">
        <h3 class="h3 float-left">Order List</h3>
    </div>
    <div class="card-body">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Invoice No.</th>
                    <th>Payment Type</th>
                    <th>Coupon Discount</th>
                    <th>Sub Total</th>
                    <th>Total</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            @foreach($orders as $order)
            
                <tr>
                    <td>{{$order->invoice_no}}</td>
                    <td>{{$order->payment_type}}</td>
                    @if($order->coupon_discount == NULL)
                    <td> No </td>
                    @else
                    <td>${{$order->coupon_discount}}</td>
                    @endif
                    <td>${{$order->subtotal}}</td>
                    <td>${{$order->total}}</td>
                    <td><div class="btn btn-sm btn-primary">Pending</div></td>
                    <td><a class="btn btn-sm btn-success" href="{{url('admin/orders/view/'.$order->id)}}"><i class="fas fa-eye"></i></a></td>
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