@extends('admin.master')
@section('title')
{{$page->name}} | Ogani
@endsection

@section('main_content')

<table class="table table-bordered table-hover">
<tbody>
                <tr>
                    <th>ID</th>
                    <td>{{$page->id}}</td>
                </tr>
                <tr>
                    <th>Name</th>
                    <td>{{$page->name}}</td>
                </tr>
                <tr>
                    <th>Description</th>
                    <td>{{$page->body}}</td>
                </tr>
               
            
            </tbody>

            </table>




</div>




@endsection







