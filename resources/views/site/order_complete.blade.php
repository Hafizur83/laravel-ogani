@extends('site.master')

@section('title')
Order Done Page
@endsection

@section('main_content')
@include('site.hero')
<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-section set-bg" data-setbg="{{asset('public/site/images/breadcrumb.jpg')}}">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Order Done</h2>
                    <div class="breadcrumb__option">
                        <a href="{{url('/')}}">Home</a>
                        <span>Order Done</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->
<!--End Show Message-->
<div class="container mt-2">
    @if(Session::has('order_done'))
    <div class="alert alert-success">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <h2>
            <strong>Success!</strong>
            {{Session::get('order_done')}}
        </h2>
    </div>
    @endif
</div>
@endsection