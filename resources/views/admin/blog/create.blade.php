@extends('admin.master')
@section('title')
Blog Add Page
@endsection

@section('main_content')
<div class="container">

    <div class="card">
    <div class="card-header">
        <div class="card-title">
        <h3 class="h3">Add Blog</h3>
        </div>
    </div>
    <div class="card-body">

    <form action="{{route('blogs.store')}}" method="post" enctype="multipart/form-data">
    @csrf
    <input type="text" name="author" class="form-control" value="" placeholder="Enter Name">
        <div class="form-group">
            <label for="name">Title</label>
            <input type="text" name="title" class="form-control">
        </div>
        <div class="form-group">
            <label for="body">Description</label>
            <textarea name="body" id="body" cols="30" rows="10" class="form-control"></textarea>
        </div>
        <div class="form-group">
            <label for="image">Image</label>
            <input type="file" name="image" class="form-control">
        </div>
        <div class="form-group">
            <label for="tags">Tags</label>
            <input type="text" name="tags" data-role="tagsinput" class="form-control">
        </div>
        <div class="form-group">
        <label for="catagory">Catagory</label>
            <select name="catagory" id="catagory" class="form-control">
                <option selected disabled>Select Catagory</option>
            @foreach($catagories as $catagory)
                <option value="{{$catagory->id}}">{{$catagory->cat_name}}</option>
            @endforeach
            </select>
        </div>
        <div class="form-group">
        <label for="catagory">Status</label>
            <select name="status" id="catagory" class="form-control">
                <option value="1">Published</option>
                <option value="0">Drafts</option>
            </select>
        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-primary" value="Add New">
            <a href="{{url('admin/blogs')}}" class="btn btn-secondary">Back</a>
        </div>
    </form>
    </div>

    </div>




</div>





@endsection

@section('script')
<script src="{{asset('public/admin/js/bootstrap-tagsinput.min.js')}}"></script>
<script src="{{asset('public/admin/ckeditor/ckeditor.js')}}"></script>
<!-- <script src="ckeditor/ckeditor.js"></script> -->
<script>
CKEDITOR.replace('body');
// $('input').tagsinput({
//     maxTags:3
// });
$("input").val()

</script>
@endsection