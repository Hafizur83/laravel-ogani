@extends('admin.master')
@section('title')
Blog Page
@endsection

@section('main_content')
<div class="card">
    <div class="card-header">
        <h3 class="h3 float-left">Blog</h3>
        <a href="{{url('admin/blogs/create')}}" class="btn btn-primary float-right">Add New</a>
    </div>
    <div class="card-body">
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>Serial</th>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Catagory</th>
                    <th>Author</th>
                    <th>Image</th>
                    <th>status</th>
                    <th>Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            <?php $serial = 1; ?>
            @foreach($blogs as $row)
            <tr>
                    <td>{{ $serial++ }}</td>
                    <td>{{$row->id}}</td>
                    <td>{{Str::limit($row->title,60)}}</td>
                    <td>{{$row->catagories->cat_name}}</td>
                    <td>{{$row->author}}</td>
                    <td> <img width="80px" src="{{asset('public/images/blog/'.$row->image)}}" alt="Post Image"></td>
                    <td>{{$row->status}}</td>
                    <td>{{\Carbon\Carbon::parse($row->created_at)->diffForHumans()}}</td>
                    <td><a href="{{route('blogs.show',$row->id)}}" ><i class="fas fa-eye"></i></a> | <a href="{{route('blogs.edit',$row->id)}}"><i class="fas fa-edit"></i></a> |
                        <form class="d-inline" action="{{route('blogs.destroy', $row->id)}}" method="POST" onsubmit="return confirm('Are you sure want to delete this data')"> @csrf
                         @method('delete')
                        <button type="submit" class="border-0 text-primary"><i class="fas fa-trash"></i></button></form></td>
                        <!-- onsubmit="return confirm('Are you sure want to delete this data')" -->
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>




@endsection


