  @section('header')

          <!DOCTYPE html>
  <html lang="en">

  <head>

      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta name="description" content="">
      <meta name="author" content="">

      <title>Hijo Aaja</title>
      <!-- Custom fonts for this template-->
      <link href="{{url('backend/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">

      <link href="{{ asset('css/app.css') }}" rel="stylesheet">

      <!-- Page level plugin CSS-->
      <link href="{{url('backend/vendor/datatables/dataTables.bootstrap4.css')}}" rel="stylesheet">

      <!-- Custom styles for this template-->
      <link href="{{url('backend/css/sb-admin.css')}}" rel="stylesheet">
      <link href="{{url('backend/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">

      <!-- Page level plugin CSS-->
      <link href="{{url('backend/vendor/datatables/dataTables.bootstrap4.css')}}" rel="stylesheet">

      <!-- Custom styles for this template-->
      <link href="{{url('backend/css/sb-admin.css" rel="stylesheet')}}">
      <!-- Bootstrap core JavaScript-->
      <script src="{{url('backend/vendor/jquery/jquery.min.js')}}"></script>
      <script src="{{url('backend/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

      <!-- include summernote css/js -->
      <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
      <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

  </head>
  <body id="page-top">

  <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

      <a class="navbar-brand mr-1" href="">Hijo Aaja</a>

      <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
          <i class="fas fa-bars"></i>
      </button>

      <!-- Navbar Search -->
      <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0" >
          <div class="input-group">
              <input type="hidden" class="form-control" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
              <div class="input-group-append">
              </div>
          </div>
      </form>

      <!-- Navbar -->
      <ul class="navbar-nav ml-auto ml-md-0">
          <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="fas fa-user-circle fa-fw"></i>
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                  <a class="dropdown-item" href="#">Change Password</a>
                  <div class="dropdown-divider"></div>
                  <form action="{{ url('/logout') }}" method="post">
                      <li><button class="dropdown-item" type="submit">Logout</button></li>
                      <input type="hidden"  name="_token" value="{{ csrf_token() }}">
                    </form>
              </div>
          </li>
      </ul>

  </nav>

  <div id="wrapper">

      <!-- Sidebar -->
      <ul class="sidebar navbar-nav">
          <li class="nav-item">
              <a class="nav-link" href="{{route('admin')}}">
                      <i class="fa fa-book"></i>
                  <span>Dashboard</span>
              </a>
          </li>
          <li class="nav-item">
              <a class="nav-link" href="{{route('category.list')}}" role="button">
                  <i class="fa fa-list"></i>
                  <span>Category</span>
              </a>
          </li>
          <li class="nav-item">
              <a class="nav-link" href="{{route('news.list')}}" role="button">
                  <i class="fa fa-newspaper"></i>
                  <span>News</span>
              </a>
          </li>
          <li class="nav-item">
              <a class="nav-link" href="{{route('video.list')}}" role="button">
                  <i class="fa fa-video"></i>
                  <span>Videos</span>
              </a>
          </li>
          <li class="nav-item">
              <a class="nav-link" href="{{route('gallery.list')}}" role="button">
                  <i class="fa fa-image"></i>
                  <span>Gallery</span>
              </a>
          </li>
          <li class="nav-item">
              <a class="nav-link" href="{{route('video.list')}}" role="button">
                  <i class="fa fa-paper-plane"></i>
                  <span>Contact Mails</span>
              </a>
          </li>
          <li class="nav-item">
              <a class="nav-link" href="{{route('ad.list')}}" role="button">
                  <i class="fa fa-link"></i>
                  <span>Advertisement</span>
              </a>
          </li>
          <li class="nav-item">
              <a class="nav-link" href="{{route('video.list')}}" role="button">
                  <i class="fa fa-user-tie"></i>
                  <span>User</span>
              </a>
          </li>
        </li>
{{--        <li class="nav-item dropdown">--}}
{{--            <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
{{--                <i class="fa fa-users"></i>--}}
{{--                <span>Users</span>--}}
{{--            </a>--}}
{{--            <div class="dropdown-menu" aria-labelledby="pagesDropdown">--}}
{{--                <a class="dropdown-item" href="#">List</a>--}}
{{--            </div>--}}
{{--        </li>--}}
      </ul>
      <div id="content-wrapper">
  @stop
