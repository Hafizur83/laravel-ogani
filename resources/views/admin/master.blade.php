<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Title  -->
    <title> @yield('title') </title>

    <!-- Style CSS -->
    <link rel="stylesheet" href="{{asset('public/admin/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/admin/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/admin/css/style.css')}}">

</head>
<body>
<div class="wrapper">
    <ul id="hasan" class="navbar-nav main_sidebar">
        <a class="sidebar_brand" href="#">
            <div class="sidebar_brand_img">
                <i class="fas fa-laugh-wink"></i>
            </div>
            <div class="sidebar_brand_text">
                Hafizur Rahman
            </div>
        </a>
        <div class="nav-link" href="#"><span>Dashboard</span></div>
        
        <li class="nav-item"><a class="nav-link" href="{{url('admin')}}"><i class="fas fa-home"></i><span>Home</span></a>
        </li>
        <li class="nav-item"><a class="nav-link" href="{{url('admin/product')}}"><i class="fas fa-list"></i><span>Product</span></a>
        </li>
        <li class="nav-item"><a class="nav-link" href="{{url('admin/catagory')}}"><i class="fas fa-tags"></i><span>Catagory</span></a>
        </li>
        <li class="nav-item"><a class="nav-link" href="{{url('admin/coupon')}}"><i class="fas fa-gift"></i><span>Coupon</span></a>
        </li>
        <li class="nav-item"><a class="nav-link" href="{{url('admin/blogs')}}"><i class="fas fa-tasks"></i><span>Blog</span></a>
        </li>
        <li class="nav-item"><a class="nav-link" href="{{url('admin/orders')}}"><i class="fas fa-list"></i><span>Orders</span></a>
        </li>
        <li class="nav-item"><a class="nav-link" href="{{url('admin/pages')}}"><i class="fas fa-folder"></i><span>Pages</span></a>
        </li>
        <li class="nav-item"><a class="nav-link" href="{{url('admin/sitesetting')}}"><i class="fas fa-cogs"></i><span>Settings (Website)</span></a>
        </li>
    </ul>
<!--------Header-------->
<div id="content-wrapper">
    <div id="content">
        <nav class="navbar navbar-expand main_header navbar-light bg-white shadow mb-2">
            <button id="sidebar-toggleTop" class="btn btn-link rounded-circle d-md-none mr-3">
                <i class="fas fa-bars"></i>
            </button>
            <ul class="navbar-nav ml-auto">
               
                <!-------User Information------->
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle no-arrow" data-toggle="dropdown">
                       <span class="mr-2">Douglas</span>
                        <img src="{{asset('public/admin/images/undraw_profile.svg')}}" alt="" class="img-profile rounded-circle">
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow">
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-user fa-sm mr-2 text-gray-400"></i>Profile
                        </a>
                        <a href="{{ url('/') }}" class="dropdown-item">
                            <i class="fas fa-cogs fa-sm mr-2 text-gray-400"></i>Site
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-sign-out-alt mr-2 text-gray-400"></i>Logout
                        </a>
                    </div>
                </li>
                
                 
            </ul>
        </nav>
    </div>
    <div class="container-fluid">
        <!--End Show Message-->
        @if(Session::has('success'))
        <div class="alert alert-success">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Success!</strong>

            {{Session::get('success')}}
        </div>
        @endif
        @yield('main_content')
    </div>
    
</div>
    
    
    
</div>
  
  
   
    <!-- JavaScript Plugins -->
    <script src="{{asset('public/admin/js/jquery-3.4.1.min.js')}}"></script>
    <!-- Bootstrap js -->
    <script src="{{asset('public/admin/js/bootstrap.min.js')}}"></script>
    <!-- Main js -->
    @yield('script')

</body>

</html>