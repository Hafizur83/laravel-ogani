@extends('admin.master')
@section('title')
Catagory
@endsection

@section('main_content')
<div class="card">
    <div class="card-header">
        <h3 class="h3 float-left">Catagory</h3>
        <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#addModal">Add New</button>
    </div>
    <div class="card-body">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $sn = 1 ;?>
@foreach($catagories as $catagory)
                <tr>
                    <th scope="row">{{$sn++}}</th>
                    <td>{{$catagory->cat_name}}</td>
                    <td><button type="submit" class="border-0 text-primary edit" id="{{$catagory->id}}"><i class="fas fa-edit"></i></button> | 
                        <form class="d-inline" action="{{route('catagory.destroy', $catagory->id)}}" method="POST" onsubmit="return confirm('Are you sure want to delete this data')"> @csrf
                            @method('delete')
                        <button type="submit" class="border-0 text-primary"><i class="fas fa-trash"></i></button></form>
                    </td>
                </tr>
@endforeach
            </tbody>
        </table>
    </div>
</div>
    <!-- -----------Add Modal ------------->
        <div class="modal fade" id="addModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="h4 modal-title">Add Catagory</h5>
                        <button class="close" data-dismiss="modal" aria-label="Close">&times;</button>
                    </div>
                    <div class="modal-body">
                    <form action="{{route('catagory.store')}}" method="post">
                    @csrf
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="cat_name" class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" value="Add">
                        </div>
                    </form>
                    </div>
                    
                </div>
            </div>
        </div>
         <!-- -----------Edit Modal ------------->
         <div class="modal fade" id="editModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="h4 modal-title">Update Catagory</h5>
                        <button class="close" data-dismiss="modal" aria-label="Close">&times;</button>
                    </div>
                    <div class="modal-body">
                    <form action="" method="post" id="editForm">
                    @csrf
                    @method('PUT')
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="cat_name" class="form-control" id="cat_name">
                        </div>
                        <div class="form-group">
                        <input type="hidden" name="id" class="form-control" id="id">
                            <input type="submit" class="btn btn-primary" value="Update">
                        </div>
                    </form>
                    </div>
                    
                </div>
            </div>
        </div>

@endsection

@section('script')
<script>
    $('.edit').click(function(){
        var id = $(this).attr('id')
        var cat_name = $(this).parent().parent().find('td').eq(0).text()
        $('#editModal').modal()
        $('#editForm').attr('action','{{url('admin/catagory')}}/'+id)
        $('#id').val(id)
        $('#cat_name').val(cat_name)
    })
</script>
@endsection