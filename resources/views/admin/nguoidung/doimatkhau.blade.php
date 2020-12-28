@extends('layout.layout_admin')
@section('tieu_de', 'Thay đổi mật khẩu')


@section('content')

  <script>
    var msg = '{{Session::get('change_password_user_fail')}}';
    var exist = '{{Session::has('change_password_user_fail')}}';
    if(exist){
      Swal.fire({
        position: 'center',
        icon: 'error',
        title: 'Hai mật khẩu mới không trùng khớp',
        showConfirmButton: false,
        timer: 1500
      })
    }
  </script>

  <script>
    var msg = '{{Session::get('old_pass_fail')}}';
    var exist = '{{Session::has('old_pass_fail')}}';
    if(exist){
      Swal.fire({
        position: 'center',
        icon: 'error',
        title: 'Mật khẩu cũ không đúng',
        showConfirmButton: false,
        timer: 1500
      })
    }
  </script>

 <div class="container-fluid">
  <!-- breadcrumb -->
  <ul class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="{{ url('admin/home-admin') }}" style="text-decoration:none;">Bảng Điều Khiển</a>
      
    </li> <li class="breadcrumb-item">
      <a href="{{ url('admin/thong-tin-nguoi-dung/'.Auth::id()) }}" 
      style="text-decoration:none;">Thông tin người dùng</a>
    </li>
    <li class="breadcrumb-item active">Thay Đổi Mật khẩu</li>
  </ul>
  <!-- end-breadcrumb -->

  <!-- Content Row1 -->
  <div class="row">
    <!-- Content Column -->
    <div class="col-lg-3 mb-4"></div>
    <div class="col-lg-6 mb-4">
      <!-- Project Card Example -->
      <div class="card shadow mb-4">

        {{-- cart-header --}}
        <div class="card-header py-3">
        	<div class="clearfix">
 					 <span class="float-left"><h6 class="m-0 font-weight-bold text-primary">Thay Đổi Mật Khẩu
           </h6></span>
				   </div>
        </div>
        {{-- end cart-header --}}


        {{-- cart body --}}
        <div class="card-body" style="padding: 5px;">

          <form action="{{ url('cap-nhat-lai-thong-tin-nhan-vien/'.Auth::id()) }}" 
          method="POST" name="myForm" onsubmit="return validateForm()">

            {{ csrf_field() }}
            {{ method_field('PUT') }}

            <!-- ================================ -->
            <div class="change_password">

              <!-- id người dùng ẩn -->
              <input type="hidden" name="txt_user_id" value="{{ Auth::id() }}">
              <!-- id người dùng ẩn -->

              <div class="form-group row">
                  <label class="col-lg-3 col-form-label form-control-label">
                    Mật khẩu cũ
                  </label>
                  <div class="col-lg-9">
                    <input type="password" name="txt_old_pass" placeholder="Nhập mật khẩu cũ"
                    class="form-control" id="password_old">
                  </div>
              </div>
      
              <div class="form-group row">
                  <label class="col-lg-3 col-form-label form-control-label">
                    Mật khẩu mới
                  </label>
                  <div class="col-lg-9">
                    <input type="password" name="txt_new_pass" placeholder="Nhập mật khẩu mới"
                    class="form-control" id="password_new">
                  </div>
              </div>

              <div class="form-group row">
                  <label class="col-lg-3 col-form-label form-control-label">
                    Nhập lại mật khẩu
                  </label>
                  <div class="col-lg-9">
                    <input type="password" name="txt_new_pass_confirm" 
                    id="password_new_confirm"
                    placeholder="Nhập lại mật khẩu" class="form-control">
                  </div>
              </div>

            </div>
            <!-- ================================ -->
        
            <button type="submit" class="btn btn-primary btn-block">ĐỒNG Ý</button>
          </form>
        </div>
        {{-- endcart body --}}
      </div>
      {{-- end cart example --}}
    </div>
    {{-- col-lg-6 mb-4 --}}
    <div class="col-lg-3 mb-4"></div>
  </div>
  <!-- Content Row1 -->
</div>


<script type="text/javascript">
  function validateForm() {
    var txt_old_pass = document.forms["myForm"]["txt_old_pass"].value;
    var txt_new_pass = document.forms["myForm"]["txt_new_pass"].value;
    var txt_new_pass_confirm = document.forms["myForm"]["txt_new_pass_confirm"].value;

    if (txt_old_pass == "") {
      alert("Chưa nhập mật khẩu cũ");
      document.getElementById("password_old").focus();
      return false;
    }

    if (txt_new_pass == "") {
      alert("Chưa nhập mật khẩu mới");
      document.getElementById("password_new").focus();
      return false;
    }

    if (txt_new_pass_confirm == "") {
      alert("Chưa nhập lại mật khẩu mới");
      document.getElementById("password_new_confirm").focus();
      return false;
    }
  }
</script>

          
@endsection



