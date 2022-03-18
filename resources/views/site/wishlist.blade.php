@extends('site.master')
@section('title')
Wishlist Page
@endsection

@section('main_content')
@include('site.hero')
    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="{{asset('public/site/images/breadcrumb.jpg')}}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Wishlist</h2>
                        <div class="breadcrumb__option">
                            <a href="{{url('/')}}">Home</a>
                            <span>wishlist</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->
        <!-- Shoping Cart Section Begin -->
        <section class="shoping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping__cart__table">
                    <table id="dataTables">
                        <thead>
                            <tr>
                                <th class="shoping__product">Product Image</th>
                                <th class="shoping__product">Product Name</th>
                                <th>Product Price</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                        
                        </tbody>
                    </table>
                    </div>
<!--------- End Wish List--------->
 
               
                </div>
            </div>
        </div>
    </section>
    <!-- Shoping Cart Section End -->
@endsection

@section('script')
<script>
    $.ajaxSetup({
            headers: {'X-CSRF-Token' : '{{csrf_token()}}'}
        })


    $(document).on('click','#wishlist_destroy',function(e){
        e.preventDefault();
        var wishlist_count = Number($('#wishlist_count').text())
        var id = $(this).attr('data-id')
        var url = '{{ route('wishlist.delete') }}'
        $.ajax({
            url: url,
            method: 'POST',
            data: { id: id},
            success: function (data){
                $('#wishlist_count').text(wishlist_count - 1)
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true
                    })

                    Toast.fire({
                    icon: 'success',
                    title: 'Product Removed from Wishlist !!'
                })
                getData()
            }
        })
    })

    getData()
    function  getData(){
        $.ajax({
            url: '{{ url('wishlist/get') }}',
            method: 'GET',
            success: function (data){
                $('#dataTables tbody').html(data)
            },
            error: function (error){
                console.log(error)
            }
        })
    }



    
</script>
@endsection