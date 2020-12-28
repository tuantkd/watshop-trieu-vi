@extends('layout.layout_admin')
@section('tieu_de', 'Thêm Người dùng')



{{-- ================================================ --}}
@section('content')

 <div class="container-fluid">
     {{-- breadcrumb --}}
              <ul class="breadcrumb">
                <li class="breadcrumb-item">
                  <a href="{{ url('admin/home-admin') }}" style="text-decoration:none;">Bảng điều khiển</a>
                </li>
                <li class="breadcrumb-item">
                  <a href="{{ url('admin/nhan-vien') }}" style="text-decoration:none;">Quản lý nhân viên</a>
                </li>
                <li class="breadcrumb-item active">Thêm nhân viên</li>
              </ul>
        <!-- end-breadcrumb
          <-- Content Row1 -->
          <div class="row">

            <!-- Content Column -->
            <div class="col-lg-3 mb-4"></div>
            <div class="col-lg-6 mb-4">
             
              <!-- Project Card Example -->
              <div class="card shadow mb-4">

                {{-- cart-header --}}
                <div class="card-header py-3">
                	<div class="clearfix">
	 					 <span class="float-left"><h6 class="m-0 font-weight-bold text-primary">THÊM NHÂN VIÊN</h6></span>
					</div>
            <div class="col-lg-3 mb-4"></div>
                  
                  
                </div>

                {{-- end cart-header --}}


                {{-- cart body --}}
                <div class="card-body" style="padding: 5px;">

               

        <form action="{{url('admin/post-them-nguoi-dung')}}" method="POST" 
        name="myForm" enctype="multipart/form-data">
          {{ csrf_field() }}
          <div class="form-group">
            <label for="">Họ Tên: </label>
            <input type="text" class="form-control" name="txt_hoten" placeholder="Nhập họ tên">
            <span style="color:red;font-style:italic;">
                  {{ $errors->first('txt_hoten') }}
                </span>
          </div>

          <div class="form-group">
                <label for=""><b>Ảnh đại diện:</b></label><br>
                <input type='file' onchange="readURL(this);checkextension();" 
                name="txt_file_hinh_anh" id="txt_file_hinh_anh" />
                <img id="blah" src=""
                style="max-width:100%;height:200px;margin-top:10px;"/>
                <br>

                <span style="color:red;font-style:italic;">
                  {{ $errors->first('txt_file_hinh_anh') }}
                </span>
          </div>

          <div class="form-group">
            <label for="">Tên Tài Khoản: </label>
            <input type="text" class="form-control" name="txt_tai_khoan" placeholder="Nhập tên tài khoản">
            <span style="color:red;font-style:italic;">
                  {{ $errors->first('txt_tai_khoan') }}
                </span>
          </div>

          <div class="form-group">
            <label for="">Mật Khẩu: </label>
            <input type="password" class="form-control" name="txt_mat_khau" placeholder="Nhập mật khẩu">
            <span style="color:red;font-style:italic;">
                  {{ $errors->first('txt_mat_khau') }}
                </span>
          </div>

          <div class="form-group">
            <label for="">Giới Tính:&nbsp; </label>
            <div class="form-check-inline">
                      <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="txt_gioi_tinh" value="Nam">Nam
                      </label>
                    </div>

                    <div class="form-check-inline">
                      <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="txt_gioi_tinh" value="Nữ">Nữ
                      </label>
                    </div>
                </div>
            <span style="color:red;font-style:italic;">
                  {{ $errors->first('txt_gioi_tinh') }}
                </span>
          <div class="form-group">
            <label for="">Ngày Sinh:</label>
            <input type="date" class="form-control" name="txt_ngay_sinh" placeholder="Nhập ngày sinh">
            <span style="color:red;font-style:italic;">
                  {{ $errors->first('txt_ngay_sinh') }}
                </span>
          </div>

          <div class="form-group">
            <label for="">SĐT:</label>
            <input type="number" class="form-control" name="txt_sdt" id="mobile" placeholder="Nhập số điện thoại" onblur="kiem_tra();">
            <span style="color:red;font-style:italic;">
                  {{ $errors->first('txt_sdt') }}
                </span>
          </div>

          <div class="form-group">
            <label for="">Email:</label>
            <input type="email" class="form-control" name="txt_email" placeholder="Nhập email">
            <span style="color:red;font-style:italic;">
                  {{ $errors->first('txt_email') }}
                </span>
          </div>

          <div class="form-group">
            <label for="">Địa Chỉ:</label>
            <textarea name="txt_dia_chi" id="input" class="form-control" rows="3"   placeholder="Nhập địa chỉ"></textarea>
            <span style="color:red;font-style:italic;">
                  {{ $errors->first('txt_dia_chi') }}
                </span>
          </div>

          <div class="form-group">
            <label for="">Quyền Truy Cập</label>
            <select name="txt_quyen_truy_cap"  class="form-control" >
              <option value="">---Chọn Quyền---</option>

              @php($lay_quyen = DB::table('quyen_truy_caps')->get())
              @foreach($lay_quyen as $quyen)

              <option value="{{ $quyen->id }}">
                {{  $quyen->ten_quyen }}
              </option>
              @endforeach
            </select>
          </div>
        

          <button type="submit" class="btn btn-primary btn-block " >Thêm</button>
        </form>
                </div>
                {{-- endcart body --}}
              </div>

              {{-- end cart example --}}
            </div>

            {{-- end contentcolum --}}
          </div>
            {{-- end content row1 --}}
        </div>

<script type="text/javascript">
  function kiem_tra() {
        var vnf_regex = /((09|03|07|08|05)+([0-9]{8})\b)/g;
        var mobile = $('#mobile').val();
        if(mobile !==''){
            if (vnf_regex.test(mobile) == false) 
            {
                alert('Số điện thoại của bạn không đúng định dạng!');
                document.forms["myForm"]["txt_sdt"].value = "";
                document.getElementById("mobile").focus();
            }else{
                return true;
            }
        }
    }
</script>

<script type="text/javascript">
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#blah')
                    .attr('src', e.target.result);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
  </script>

  <script type="text/javascript">
    function checkextension() {
      var file = document.querySelector("#txt_file_hinh_anh");
      if ( /\.(jpe?g|png|gif)$/i.test(file.files[0].name) === false ) 
      { 
        alert("Bắt buộc file hình ảnh có đuôi là: PNG, JPG, GIF"); 
        document.querySelector("#txt_file_hinh_anh").value = "";
      }
    }
  </script>
          
@endsection



