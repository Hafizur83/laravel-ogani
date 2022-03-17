@extends('site.master')
@section('title')
Dashboard Page
@endsection

@section('main_content')
@include('site.hero')
    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="{{asset('public/site/images/breadcrumb.jpg')}}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Dashboard</h2>
                        <div class="breadcrumb__option">
                            <a href="index.html">Home</a>
                            <span>dashboard</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->
        <!-- Shoping Cart Section Begin -->
        <section class="shoping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                <!--------- Order--------->
                <div class="shoping__cart__table">
                        <div class="card-header">
                           <h3>My Orders Invoice</h3>
                       </div>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Invoice No.</th>
                                    <th>Payment Type</th>
                                    <th>Sub Total</th>
                                    <th>Total</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            @forelse($orders as $order)
                            
                                <tr>
                                    <td>{{$order->invoice_no}}</td>
                                    <td>{{$order->payment_type}}</td>
                                    <td>${{$order->total}}</td>
                                    <td>${{$order->subtotal}}</td>
                                    <td><div class="btn btn-sm btn-primary">Pending</div></td>
                                    <td><a href="{{url('order/view/'.$order->id)}}" class="btn btn-sm btn-primary">View</a></td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="4">No Data Available </td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
<!--------- Order--------->
                    <div class="shoping__cart__table">
                       <div class="card-header">
                           <h3>My Orders</h3>
                       </div>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th class="shoping__product">Products</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                </tr>
                            </thead>
                            <tbody>
                            @forelse($order_items as $order_item)
                                <tr>
                                    <td class="shoping__cart__item">
                                    <img width="100px" src="{{asset('public/site/images/products/'.$order_item->product->product_img)}}" alt="Product">
                                        <h5>{{$order_item->product->product_name}}</h5>
                                    </td>
                                    <td class="shoping__cart__price">
                                    {{$order_item->product_qty}}
                                    </td>
                                    <td class="shoping__cart__price">
                                        ${{$order_item->product->price}}.00
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="4">No Data Available </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
<!--------- Order--------->
<!--------- Order--------->
                    <div class="shoping__cart__table">
                        <div class="card-header">
                           <h3>My Shippings</h3>
                       </div>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>District</th>
                                    <th>Post Code</th>
                                    <th>Address</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{$shipping->shipping_firstName .' '. $shipping->shipping_lastName}}</td>
                                    <td>{{$shipping->shipping_email}}</td>
                                    <td>{{$shipping->shipping_phone}}</td>
                                    <td>{{$shipping->district}}</td>
                                    <td>{{$shipping->post_code}}</td>
                                    <td>{{$shipping->address}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
<!--------- Order--------->
               
                </div>
            </div>
        </div>
    </section>
    <!-- Shoping Cart Section End -->
@endsection