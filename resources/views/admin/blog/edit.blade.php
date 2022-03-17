@extends('admin.master')

@section('title')
Page | Ogani
@endsection

@section('main_content')
<div class="container">

    <div class="card">
    <div class="card-header">
        <div class="card-title">
        <h3 class="h3">Update Post</h3>
        </div>
    </div>
    <div class="card-body">
        <form action="{{route('pages.update',$page->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
            <div class="col-md-4 mb-2">
                <label for="name" class="form-label">Page Name</label>
                <input type="text" name="name" class="form-control" value="{{$page->name}}">
            </div>
            <div class="col-md-4 mb-2">
                <label for="name" class="form-label">Page URL</label>
                <input type="text" name="link" class="form-control" value="{{$page->link}}">
            </div>
            <div class="col-md-12">
                <label for="password" class="form-label">Description</label>
                <textarea class="form-control" name="body" id="" cols="30" rows="10">{{$page->body}}</textarea>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Update">
                <a href="{{url('admin/pages')}}" class="btn btn-secondary">Back</a>
            </div>
        </form>
    </div>

    </div>




</div>





@endsection