@extends('layout.layout_admin')
@section('tieu_de', 'Thông Tin Người Dùng')

@section('content')

  <script>
    var msg = '{{Session::get('change_password_user')}}';
    var exist = '{{Session::has('change_password_user')}}';
    if(exist){
      Swal.fire({
        position: 'center',
        icon: 'success',
        title: 'Đã đổi mật khẩu',
        showConfirmButton: false,
        timer: 1500
      })
    }
  </script>

<div class="container-fluid">
  <!-- Content Row1 -->
  <div class="row">

    <!-- Content Column -->
    <div class="col-lg-12 mb-4">
      <!-- Project Card Example -->
      <div class="card shadow mb-4">
        {{-- cart-header --}}
        <div class="card-header py-3">
            <div class="clearfix">
            <span class="float-left"><h6 class="m-0 font-weight-bold text-primary">HỒ SƠ CÁ NHÂN</h6></span>
            </div>
        </div>

        {{-- end cart-header --}}

        {{-- cart body --}}
      <div class="card-body" style="padding: 5px;">
          <form action="{{ url('cap-nhat-lai-thong-tin-nhan-vien/'.$thong_tin->id) }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                {{ method_field('PUT') }}
                <div class="container">
                    <div class="row m-y-2">
                <div class="col-lg-8 push-lg-4">
                  <div class="tab-content p-b-3">

                    <div class="tab-pane active" id="profile">

                        <div class="form-group row">
                          <label class="col-lg-3 col-form-label form-control-label">
                            Họ và tên:
                          </label>
                          <div class="col-lg-9">
                              <input class="form-control" type="text" disabled
                              value="{{ $thong_tin->ho_ten }}">
                          </div>
                        </div>


                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">
                              Ngày sinh
                            </label>
                            <div class="col-lg-9">
                                <input class="form-control" type="text" disabled
                                value="{{ $thong_tin->ngay_sinh }}">
                            </div>
                        </div>


                        <div class="form-group row">
                          <label class="col-lg-3 col-form-label form-control-label">Giới tính</label>
                          <div class="col-lg-9">
                              <div class="form-check-inline">
                                <label class="form-check-label">
                                  <input type="checkbox" class="form-check-input"
                                  value="{{ $thong_tin->gioi_tinh }}" disabled
                                  name="Nam" checked="checked">Nam
                                </label>
                              </div>
                          </div>
                        </div>


                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">Địa chỉ</label>
                            <div class="col-lg-9">
                                <input class="form-control" type="text" name="txt_dia_chi"
                                value="{{ $thong_tin->dia_chi }}">
                            </div>
                        </div>


                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">Email</label>
                            <div class="col-lg-9">
                                <input class="form-control" type="email" disabled
                                value="{{ $thong_tin->email }}">
                            </div>
                        </div>


                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">
                              Điện thoại
                            </label>
                            <div class="col-lg-9">
                                <input class="form-control" type="text" name="txt_dien_thoai"
                                value="{{ $thong_tin->dien_thoai }}">
                            </div>
                        </div>


                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">Tài khoản</label>
                            <div class="col-lg-9">
                                <input class="form-control" type="text" disabled
                                value="{{ $thong_tin->username }}">
                            </div>
                        </div>


                        <h5>
                          <a class="btn btn-success"
                          href="{{url('admin/doi-mat-khau/'.$thong_tin->id)}}" role="button">Thay Đổi Mật Khẩu</a>
                        </h5>

                       <div class="form-group row">
                          <label class="col-lg-3 col-form-label form-control-label"></label>
                          <div class="col-lg-9">
                            <a class="btn btn-secondary" href="{{ url('admin/home-admin') }}" role="button">Trở lại</a>
                            <input type="submit" class="btn btn-primary" value="Lưu thay đổi"
                            onclick="return Validate()">
                          </div>
                      </div>



                    </div>
                  </div>
                </div>

                <div class="col-lg-4 pull-lg-8 text-xs-center">
                    ​<img class="img-thumbnail"
                    src="{{ url('public/image_avatar/'.$thong_tin->hinh_anh) }}"
                    style="max-width:100%;height:300px;">
                    <label class="custom-file" style="text-align:center;">
                        <input type="file" id="file" class="custom-file-input" name="txt_anh_dai_dien"
                        onchange="readURL(this);checkextension();">
                        <span class="custom-file-control" style="border-radius:5px;border:">
                          <b><i class="fas fa-camera"></i> THAY ẢNH</b>
                        </span>
                    </label>

                    <img id="blah" src="" style="max-width:100%;height:200px;margin-top:10px;"/>

                </div>
              </div>
                </div>
                <hr>
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
    function Validate() {
        var password = document.getElementById("txtPassword").value;
        var confirmPassword = document.getElementById("txtConfirmPassword").value;
        if (password != confirmPassword) {
            alert("Mật khẩu không phù hợp.");
            return false;
        }
        return true;
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
      var file = document.querySelector("#file");
      if ( /\.(jpe?g|png|gif)$/i.test(file.files[0].name) === false )
      {
        alert("Bắt buộc file hình ảnh có đuôi là: PNG, JPG, GIF");
        document.querySelector("#file").value = "";
      }
    }
  </script>

@endsection



