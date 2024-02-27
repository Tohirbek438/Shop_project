<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Dashboard</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="/admin/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="/admin/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="/admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="/admin/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="/admin/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="/admin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="/admin/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="/admin/plugins/summernote/summernote-bs4.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
<style>
  
</style>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="/admin/dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
  </div>

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="/" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="/admin/contact" class="nav-link">Contact</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto" style="position:relative;">
      <!-- Navbar Search -->
     

      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
      <?php $contact1 = \App\Models\Contact::where('status',0)->count();?>
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-comments"></i>
          <span class="badge badge-danger navbar-badge">{{$contact1}}</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
        <?php $contact = \App\Models\Contact::where('status',0)->get();?>
        
        @if($contact1 === 0)
        <div style="color:red;padding:20px 20px;">Message is not available!</div>
        @else
        @foreach($contact as $r)
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
             
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  {{$r->name}}
                  <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                </h3>
                <?php
                $words = str_word_count($r->message, 1);
                $first30Words = implode(' ', array_slice($words, 0, 30));
                
              
                ?>
                <p class="text-sm">{{$first30Words}}</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i>{{$r->created_at}}</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          @endforeach
          
         
          <div class="dropdown-divider"></div>
       
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
        </div>
      @endif
      </li>
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
      <?php
        $order = \App\Models\Order::latest()->count();
        $contact_count = \App\Models\Contact::where('status',0)->count();
        $user =\App\Models\Blog::latest()->count();
        $latestProduct = \App\Models\Contact::latest()->first();
        $order_time = \App\Models\Order::latest()->first();
        $blog_time = \App\Models\Blog::latest()->first();
        $sum = $order + $contact_count + $user;
        
        ?>  
      <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">{{$sum}}</span>
        </a>

        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">

        
          <span class="dropdown-item dropdown-header">{{$sum}} Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> {{$contact_count}} new messages
            <span class="float-right text-muted text-sm">{{$latestProduct->created_at->diffForHumans()}}</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-users mr-2"></i> {{$user}} added to blog
            <span class="float-right text-muted text-sm">{{$order_time->created_at->diffForHumans() ?? ""}}</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-file mr-2"></i> {{$order}} new orders
            <span class="float-right text-muted text-sm">{{$blog_time->created_at->diffForHumans() ?? null}}</span>
          </a>
          
      </li>
   
    
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="/admin/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Ogani shop</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <?php $image = Auth::guard('admin')->user()->image ?? null?>
        <img src="{{ asset('admin_image/' .$image) }}" class="img-circle elevation-2" alt="User Image">

        </div>
        <div class="info">
          <a href="#" class="d-block">{{Auth::guard('admin')->user()->name ?? ""}}</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          
          <li class="nav-item">
            <a href="{{route('admin.category')}}" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Category
               
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('admin.product')}}" class="nav-link">
            <i class="fas fa-dice"></i>
              <p>
                 Products
               
                </p>
            </a>
           
          </li>
          <li class="nav-item">
            <a href="/admin/contact" class="nav-link">
              <i class="nav-icon fas fa-envelope"></i>
              <p>
               Contact
              
              </p>
              <span class="badge badge-info right">{{\App\Models\Contact::where('status',0)->count()}}</span>
            </a>
         
          </li>
          <li class="nav-item">
            <a href="/admin/blog-category" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Blog Categories
              
              </p>
            </a>
         
          </li>
          <li class="nav-item">
            <a href="/admin/blog" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Blogs
              
              </p>
            </a>
         
          </li>
          <li class="nav-item">
            <a href="/admin/order-index" class="nav-link">
              <i class="nav-icon ion ion-bag"></i>
              <p>
               Orders

              </p>
            </a>

          </li>
          <li class="nav-item">
            <a href="/admin/order-item" class="nav-link">
            <i class="fas fa-shopping-cart"></i>
              <p>
                Order Items
               
              </p>
            </a>
            
          </li>
          <li class="nav-item">
            <a href="/admin/users/index" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Users
              
              </p>
            </a>
         
          </li>
          <li class="nav-item">
            <a href="/admin/admin-index" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Admins
              
              </p>
            </a>
         
          </li>
          <li class="nav-item">
            <form action="{{ route('admin.logout')}}" method="POST" style="width:100%;">
              @csrf
              @method('DELETE')
            <button type="submit" style="border:none;width:100%;height:40px" class="bg-secondary">
              
              <p style="margin-top:5px;font-weight:bold;color:white;margin:left:-120px;">
              <i class="fas fa-sign-out-alt"></i>  Logout 
              </p>
</button>
            </form>

          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <!-- <li class="breadcrumb-item"><a href="/">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li> -->
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>






    @yield('content')
































</div>
<!-- /.content-wrapper -->
<footer class="main-footer">
  <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
  All rights reserved.
  <div class="float-right d-none d-sm-inline-block">
    <b>Version</b> 3.2.0
  </div>
</footer>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
  <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>


<script src="/admin/plugins/jquery/jquery.min.js"></script>
<script src="/admin/plugins/sparklines/sparkline.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="/admin/plugins/jquery-ui/jquery-ui.min.js"></script>
<script src="/admin/dist/js/pages/dashboard.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="/admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="/admin/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->

<!-- JQVMap -->
<script src="/admin/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="/admin/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="/admin/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="/admin/plugins/moment/moment.min.js"></script>
<script src="/admin/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="/admin/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="/admin/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="/admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->

<!-- AdminLTE for demo purposes -->
<script src="/admin/dist/js/demo.js"></script>
</script>
</body>
</html>
