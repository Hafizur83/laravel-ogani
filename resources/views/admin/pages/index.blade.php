@extends('admin.master')

@section('title')
Page
@endsection

@section('main_content')
<div class="card">
    <div class="card-header">
        <h3 class="h3 float-left">Page</h3>
        <a href="{{url('admin/pages/create')}}" class="btn btn-primary float-right">Add New</a>
    </div>
    <div class="card-body">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">URL</th>
                    <th scope="col">Description</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
@foreach($pages as $page)
                <tr>
                    <td>{{$page->name}}</td>
                    <td>{{$page->link}}</td>
                    <td>{{$page->body}}</td>
                    <td>
                        @if($page->status == '1')
                        <a class="btn btn-sm btn-primary" href="{{url('admin/pages/status/'.$page->id)}}">Active</a>
                        @else
                        <a class="btn btn-sm btn-warning" href="{{url('admin/pages/status/'.$page->id)}}">Inactive</a>
                        @endif
                    </td>
                    <td><a href="{{route('pages.show', $page->id)}}"><i class="fas fa-eye"></i></a> | 
                        <a href="{{route('pages.edit', $page->id)}}"><i class="fas fa-edit"></i></a> |
                        <form class="d-inline" action="{{route('pages.destroy', $page->id)}}" method="POST" onsubmit="return confirm('Are you sure want to delete this data')"> @csrf
                            @method('delete')
                        <button type="submit" class="border-0 text-primary"><i class="fas fa-trash"></i></button></form>
                    </td>
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
