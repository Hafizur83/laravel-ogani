@extends('admin.master')
@section('title')
Coupon
@endsection

@section('main_content')
<div class="card">
    <div class="card-header">
        <h3 class="h3 float-left">Coupon</h3>
        <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#addModal">Add New</button>
    </div>
    <div class="card-body">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Discount</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $sn = 1 ;?>
@foreach($coupons as $coupon)
                <tr>
                    <th scope="row">{{$sn++}}</th>
                    <td>{{$coupon->coupon_name}}</td>
                    <td>{{$coupon->discount}}</td>
                    <td>
                        @if($coupon->status == '1')
                        <a class="btn btn-sm btn-primary" href="{{url('admin/coupon/status/'.$coupon->id)}}">Active</a>
                        @else
                        <a class="btn btn-sm btn-warning" href="{{url('admin/coupon/status/'.$coupon->id)}}">Inactive</a>
                        @endif
                    </td>
                    <td><button type="submit" class="border-0 text-primary edit" id="{{$coupon->id}}"><i class="fas fa-edit"></i></button> | 
                        <form class="d-inline" action="{{route('coupon.destroy', $coupon->id)}}" method="POST" onsubmit="return confirm('Are you sure want to delete this data')"> @csrf
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
                    <h5 class="h4 modal-title">Add Coupon</h5>
                        <button class="close" data-dismiss="modal" aria-label="Close">&times;</button>
                    </div>
                    <div class="modal-body">
                    <form action="{{route('coupon.store')}}" method="post">
                    @csrf
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="coupon_name" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="name">Discount</label>
                            <input type="number" name="discount" class="form-control">
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
                    <h5 class="h4 modal-title">Update Coupon</h5>
                        <button class="close" data-dismiss="modal" aria-label="Close">&times;</button>
                    </div>
                    <div class="modal-body">
                    <form action="" method="post" id="editForm">
                    @csrf
                    @method('PUT')
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="coupon_name" class="form-control" id="coupon_name">
                        </div>
                        <div class="form-group">
                            <label for="name">Discount</label>
                            <input type="number" name="discount" class="form-control" id="discount">
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
        var coupon_name = $(this).parent().parent().find('td').eq(0).text()
        var discount = $(this).parent().parent().find('td').eq(1).text()
        $('#editModal').modal()
        $('#editForm').attr('action','{{url('admin/coupon')}}/'+id)
        $('#id').val(id)
        $('#coupon_name').val(coupon_name)
        $('#discount').val(discount)
        // alert (discount)
    })
</script>
@endsection