@extends('admin.master')
@section('title')
Page Add
@endsection

@section('main_content')
<div class="card">
    <div class="card-header">
        <h2>Welcome to Create</h2>
    </div>


    <div class="card-body">
        <form action="{{route('pages.store')}}" method="post" enctype="multipart/form-data" class="row">
        @csrf
            <div class="col-md-4 mb-2">
                <label for="name" class="form-label">Page Name</label>
                <input type="text" name="name" class="form-control" id="name">
            </div>
            <div class="col-md-4 mb-2">
                <label for="link" class="form-label">Page URL</label>
                <input type="text" name="link" class="form-control" id="link">
            </div>
            <div class="col-md-12">
                <label for="password" class="form-label">Description</label>
                <textarea class="form-control" name="body" id="" cols="30" rows="10"></textarea>
            </div>
            <div class="col-12 mt-4 text-center">
                <button class="btn btn-primary" name="submit" type="submit">Add</button>
            </div>
        </form>
    </div>
</div>
@endsection