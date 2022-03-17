@extends('admin.master')
@section('title')
{{$blogs->title}} | Ogani
@endsection

@section('main_content')

<table class="table table-bordered table-hover">
<tbody>
                <tr>
                    <th>ID</th>
                    <td>{{$blogs->id}}</td>
                </tr>
                <tr>
                    <th>Title</th>
                    <td>{{$blogs->title}}</td>
                </tr>
                <tr>
                    <th>Description</th>
                    <td>{{$blogs->body}}</td>
                </tr>
                <tr>
                    <th>Catagory</th>
                    <td> {{$blogs->catagories->cat_name}}</td>
                </tr>
                <tr>
                    <th>Author</th>
                    <td>{{$blogs->author}}</td>
                </tr>
                <tr>
                    <th>About Me</th>
                    <td>{{$blogs->author}}</td>
                </tr>
                <tr>
                    <th>Image</th>
                    <td> <img width="200px" src="{{asset('public/images/blog/'.$blogs->image)}}" alt="Image"></td>
                </tr>
                <tr>
                    <th>Date</th>
                    <td>{{$blogs->created_at}}</td>
                </tr>
                <tr>
                    <th>status</th>
                    <td>{{$blogs->status}}</td>
                </tr>
               
            
            </tbody>

            </table>




</div>




@endsection







