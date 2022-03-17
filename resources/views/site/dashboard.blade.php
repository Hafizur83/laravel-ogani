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
                                    <th>Order Date</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            @forelse($orders as $order)
                            
                                <tr>
                                    <td>{{$order->invoice_no}}</td>
                                    <td>{{$order->payment_type}}</td>
                                    <td>${{$order->subtotal}}</td>
                                    <td>${{$order->total}}</td>
                                    <td>{{$order->created_at}}</td>
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
               
                </div>
            </div>
        </div>
    </section>
    <!-- Shoping Cart Section End -->
@endsection