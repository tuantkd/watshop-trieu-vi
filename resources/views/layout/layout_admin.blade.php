<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>@yield('tieu_de')</title>

  <!-- Custom fonts for this template-->
  <link rel="icon" href="{{ url('public/images-icon/9.png') }}" type="image/icon type">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link href="{{ url('public/admin/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet"
  type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

  <!-- Custom styles for this template-->
  <link href="{{ url('public/admin/css/sb-admin-2.min.css') }}" rel="stylesheet">
  <style type="text/css" media="screen">

    table {
      margin: 5;
      padding: 0;
      width: 100%;
      table-layout: auto;

    }

    table tr {
      background-color: #f8f8f8;
      border: 1px solid #ddd;
      padding: .10em;
    }

    table th,
    table td {
      padding: .200em;
      text-align: center;
      border: 1px solid #ddd;
      font-size: 12px;
    }

    table th {
      font-size: 10px;
      text-transform: uppercase;
      color: black;font-weight: bold;
    }

    @media screen and (max-width: 600px) {
      table {
        border: 0;
        width: 100%;
      }

      table thead {
        clip: rect(0 0 0 0);
        height: 1px;
        overflow: hidden;
        padding: 0;
        position: absolute;
      }
      
      table tr {
        display: block;
        margin-bottom: .100em;
      }
      
      table td {
        border-bottom: 1px solid #ddd;
        display: block;
        font-size: .5em;
        text-align: right;

      }
      
      table td::before {
        /*
        * aria-label has no advantage, it won't be read inside a table
        content: attr(aria-label);
        */
        content: attr(data-label);
        float: left;
        font-weight: bold;
        text-transform: uppercase;
      }
      
      table td:last-child {
        border-bottom: 0;border: 1px solid #ddd;
      }
        
  </style>
</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-info sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{url('admin/home-admin')}}">
        <img src="{{url('public/images-icon/logo.png')}}" class="img-responsive" alt="Image" style="max-width: 100%; height: 30px;">
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="{{url('admin/home-admin')}}">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>BẢNG ĐIỀU KHIỂN</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      {{-- <div class="sidebar-heading">
        Interface
      </div> --}}

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fa fa-user-friends"></i>
          <span>Quản Lý Người Dùng</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            
            <a class="collapse-item" href="{{url('admin/nhan-vien')}}">Nhân Viên</a>
            <a class="collapse-item" href="{{url('admin/khach-hang')}}">Khách Hàng</a>
          </div>
        </div>
      </li>

      <!-- Nav Item - Utilities Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
          <i class="fa fa-list"></i>
          <span>Quản Lý Sản Phẩm</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" 
        data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="{{url('admin/danh-sach-san-pham')}}">Danh Sách Sản Phẩm</a>
            <a class="collapse-item" href="{{url('admin/loai-san-pham')}}">Loại Sản Phẩm</a>
            <a class="collapse-item" href="{{url('admin/nha-cung-cap')}}">Nhà cung cấp</a>
            <a class="collapse-item" href="{{url('admin/bang-chuyen')}}">Băng chuyền sản phẩm</a>
          </div>
        </div>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">
      <!-- Heading -->
  
      </li>

      <!-- Nav Item - Charts -->
      <li class="nav-item">
        <a class="nav-link" href="{{url('admin/quan-ly-hoa-don')}}">
          <i class="fa fa-money-bill-wave"></i>
          <span>Quản Lý Hóa Đơn</span></a>
      </li>

      <!-- Nav Item - Tables -->
      <li class="nav-item">
        <a class="nav-link" href="{{url('admin/quyen-truy-cap')}}">
          <i class="fa fa-key"></i>
          <span>Quyền Truy Cập</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->




{{-- ================================================================================= --}}
    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>


          <!-- Topbar Search -->
          @yield('search')
          <!-- Topbar Search -->




          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow d-sm-none">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a>
              <!-- Dropdown - Messages -->
              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                  <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </li>

            <!-- Nav Item - Alerts -->
            <li class="nav-item dropdown no-arrow mx-1">
              <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-bell fa-fw"></i>
                <!-- Counter - Alerts -->
                @php($get_hoa_don_news = DB::table('hoa_dons')->latest()->paginate(2)->count())
                <span class="badge badge-danger badge-counter">{{ $get_hoa_don_news }}+</span>
              </a>
              <!-- Dropdown - Alerts -->
              <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
                <h6 class="dropdown-header">
                  Thông Báo
                </h6>
                <a class="dropdown-item d-flex align-items-center" href="{{ url('admin/quan-ly-hoa-don') }}">
                  <div class="mr-3">
                    <div class="icon-circle bg-primary">
                      <i class="fas fa-file-alt text-white"></i>
                    </div>
                  </div>
                  <div>
                  @php($get_hoa_dons = DB::table('hoa_dons')->latest()->paginate(2)->count())
                  @php($hoa_dons = DB::table('hoa_dons')->latest()->paginate(1))
                  @foreach($hoa_dons as $hoa_don)
                    <div class="small text-gray-500">
                      {{ date('d/m/Y', strtotime($hoa_don->created_at)) }}
                    </div>
                    <span class="font-weight-bold">{{ $get_hoa_dons }} Đơn Hàng Mới</span>
                  @endforeach
                  </div>
            </li>

            <!-- Nav Item - Messages -->

            <div class="topbar-divider d-none d-sm-block"></div>
            @if(Auth::check())  
            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                    <b>{{Auth::user()->username }}</b>
                </span>
                <img class="img-profile rounded-circle" 
                src="{{ url('public/image_avatar/'.Auth::user()->hinh_anh) }}">
              </a>

              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" 
                href="{{ url('admin/thong-tin-nguoi-dung/'.Auth::id()) }}">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Thông Tin Cá Nhân
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Đăng Xuất
                </a>
              </div>
            </li>

            @else
            <script type="text/javascript">
              window.location.replace("{{ url('dang-nhap') }}");
            </script>
            @endif

          </ul>

        </nav>
        <!-- End of Topbar -->

        {{-- container-fluid --}}
        @yield('content')
       
        <!-- /.container-fluid -->
        






      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; WATCHSTORE 2020</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Bạn có muốn thoát không ?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Nhấp Chọn Đăng Xuất Nếu Bạn Muốn Thoát</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Hủy</button>
          <a class="btn btn-danger" href="{{ url('dang-xuat') }}">Đăng Xuất</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="{{ url('public/admin/vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ url('public/admin/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

  <!-- Core plugin JavaScript-->
  <script src="{{ url('public/admin/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

  <!-- Custom scripts for all pages-->
  <script src="{{ url('public/admin/js/sb-admin-2.min.js') }}"></script>

  <!-- Page level plugins -->
  <script src="{{ url('public/admin/vendor/chart.js/Chart.min.js') }}"></script>

  <!-- Page level custom scripts -->
  <script src="{{ url('public/admin/js/demo/chart-area-demo.js') }}"></script>
  <script src="{{ url('public/admin/js/demo/chart-pie-demo.js') }}"></script>

</body>

</html>
