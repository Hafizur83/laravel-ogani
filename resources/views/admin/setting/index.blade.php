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
        {{-- ----------Start ------------}}
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        Setting
                    </div>
                </div>
                <div class="card-body">
                    <div class="col-md-12 row mt-2">
                        <div class="col-md-12 row mt-2">
                            <label for="name" class="form-label col-md-3">Site Name</label>
                            <div class="col-md-9">
                                <input type="text" name="site_name" class="form-control" id="name" value="{{ $siteSetting->site_name }}">
                            </div>
                        </div>
                        <div class="col-md-12 row mt-2">
                            <label for="name" class="form-label col-md-3">Site Logo</label>
                            <div class="col-md-6">
                                <input type="file" name="site_logo" class="form-control" id="name" value="">
                            </div>
                            <div class="col-md-3">
                                <img width="120px" src="{{ asset('public/images/'.$siteSetting->site_logo) }}" alt="Logo">
                            </div>
                        </div>
                        <div class="col-md-12 row mt-2">
                            <label for="name" class="form-label col-md-3">Site Favicon</label>
                            <div class="col-md-6">
                                <input type="file" name="site_favicon" class="form-control" id="name" value="">
                            </div>
                            <div class="col-md-3">
                                <img width="120px" src="{{ asset('public/images/'.$siteSetting->site_favicon) }}" alt="Favicon">
                            </div>
                        </div>
                        <div class="col-md-12 row mt-2">
                            <label for="name" class="form-label col-md-3">Phone</label>
                            <div class="col-md-9">
                                <input type="text" name="phone" class="form-control" id="name" value="{{ $siteSetting->phone }}">
                            </div>
                        </div>
                        <div class="col-md-12 row mt-2">
                            <label for="name" class="form-label col-md-3">Email</label>
                            <div class="col-md-9">
                                <input type="text" name="email" class="form-control" id="name" value="{{ $siteSetting->email }}">
                            </div>
                        </div>
                        <div class="col-md-12 row mt-2">
                            <label for="name" class="form-label col-md-3">Address</label>
                            <div class="col-md-9">
                                <input type="text" name="address" class="form-control" id="name" value="{{ $siteSetting->address }}">
                            </div>
                        </div>
                        <div class="col-md-12 row mt-2">
                            <label for="name" class="form-label col-md-3"> Open Time</label>
                            <div class="col-md-9">
                                <input type="text" name="open_time" class="form-control" id="name" value="{{ $siteSetting->open_time }}">
                            </div>
                        </div>
                        <div class="col-md-12 row mt-2">
                            <label for="name" class="form-label col-md-3"> About Store</label>
                            <div class="col-md-9">
                                <input type="text" name="about_store" class="form-control" id="name" value="{{ $siteSetting->about_store }}">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- ----------End ------------}}

            {{-- ----------Start Social Link ------------}}
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        Social Link
                    </div>
                </div>
                

                <div class="card-body">
                    <div class="col-md-12 row mt-2">
                        <div class="col-md-5">
                            <input type="text" name="product_name" class="form-control" id="name" value="fas fa-facebook">
                        </div>
                        <div class="col-md-7">
                            <input type="text" name="product_name" class="form-control" id="name" value="www.facebook.com">
                        </div>
                    </div>
                    <div class="col-md-12 row mt-2">
                        <div class="col-md-5">
                            <input type="text" name="product_name" class="form-control" id="name" value="fas fa-facebook">
                        </div>
                        <div class="col-md-7">
                            <input type="text" name="product_name" class="form-control" id="name" value="www.facebook.com">
                        </div>
                    </div>
                    <div class="col-md-12 row mt-2">
                        <div class="col-md-5">
                            <input type="text" name="product_name" class="form-control" id="name" value="fas fa-facebook">
                        </div>
                        <div class="col-md-7">
                            <input type="text" name="product_name" class="form-control" id="name" value="www.facebook.com">
                        </div>
                    </div>
                </div>
            </div>
            {{-- ----------Start Social Link ------------}}
            <div class="col-12 mt-4 text-center">
                <button class="btn btn-primary" name="submit" type="submit">Update</button>
            </div>
        </form>
    </div>
</div>
@endsection