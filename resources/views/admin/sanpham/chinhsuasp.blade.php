@extends('layout.layout_admin')
@section('tieu_de', 'Chinh Sửa Sản Phẩm')

{{-- ================================================ --}}
@section('content')

    <div class="container-fluid">

    <!-- breadcrumb -->
    <ul class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="{{ url('admin/home-admin') }}" style="text-decoration:none;">Bảng điều khiển</a>
      </li>
      <li class="breadcrumb-item">
        <a href="{{ url('admin/danh-sach-san-pham') }}" style="text-decoration:none;">Danh sách sản phẩm</a>
      </li>
      <li class="breadcrumb-item active">Chỉnh sửa sản phẩm</li>
    </ul>
    <!-- end-breadcrumb -->

    <!-- Content Row -->
    <div class="row">
      <!-- Content Column -->
      <div class="col-lg-2 mb-4"></div>
      <div class="col-lg-8 mb-4">
        <!-- Card Example -->
        <div class="card shadow mb-4">
          <!-- card-header -->
          <div class="card-header py-3">
            <div class="clearfix">
              <span class="float-left">
                <h6 class="m-0 font-weight-bold text-primary">CHỈNH SỬA SẢN PHẨM</h6>
              </span>
            </div>
            
          </div>
          <!-- end-card-header -->

          <!-- card-body -->
          <div class="card-body" style="padding:20px;">


          <form action="{{ url('admin/cap-nhat-san-pham/'.$chinh_sua->id) }}" method="POST" 
          onsubmit="return validateForm()" name="myForm" enctype="multipart/form-data">

            {{ csrf_field() }}
            {{ method_field('PUT') }}

            <div class="form-group">
              <label for=""><b>Loại sản phẩm:</b></label>
              <select name="txt_loai_id" class="form-control" required="required">

                @php($ten_loais = DB::table('loai_san_phams')
                ->where('id',$chinh_sua->id_loai_sp)->get())
                @foreach($ten_loais as $loai)
                <option value="{{ $loai->id }}">
                  {{ $loai->ten_loai_sp }}
                </option>
                @endforeach

                <option value="">- - Chọn loại- -</option>
                
                @php($lay_loai = DB::table('loai_san_phams')->get())
                @foreach($lay_loai as $loai)
                <option value="{{ $loai->id }}">
                  {{ $loai->ten_loai_sp }}
                </option>
                @endforeach

              </select>
            </div>

            <div class="form-group">
              <label for=""><b>Tên sản phẩm:</b></label>
              <input type="text" class="form-control" name="txt_ten_sp" id="txt_ten_sp" 
              placeholder="Nhập tên sản phẩm" value="{{ $chinh_sua->ten_san_pham }}">
            </div>

            <div class="form-group">
              <label for=""><b>Hình ảnh:</b></label><br>
              <input type="file" name="txt_hinh_anh_sp" id="txt_hinh_anh_sp"
              onchange="readURL(this);checkextension();" value="{{ $chinh_sua->product_image }}">

              <img id="blah" src=""
              style="max-width:100%;height:200px;margin-top:10px;"/>
            </div>

            <div class="form-group">
              <label for=""><b>Nhà cung cấp:</b></label>
              <select name="txt_nha_cung_cap" class="form-control" id="txt_nha_cung_cap">

                @php($nha_cung_caps = DB::table('xuat_xus')
                ->where('id',$chinh_sua->id_xuat_xu)->get())
                @foreach($nha_cung_caps as $ten)
                <option value="{{ $ten->id }}">
                  {{ $ten->xuat_xu }}
                </option>
                @endforeach

                <option value="">- - Chọn nhà cung cấp- -</option>

                @php($lay_nha_cung_cap = DB::table('xuat_xus')->get())
                @foreach($lay_nha_cung_cap as $ten)
                <option value="{{ $ten->id }}">
                  {{ $ten->xuat_xu }}
                </option>
                @endforeach

              </select>
            </div>

            <div class="form-group">
              <label for=""><b>Giá mua:</b></label>
              <input type="number" class="form-control" name="txt_gia_mua" id="txt_gia_mua" 
              placeholder="Nhập giá mua sản phẩm" value="{{ $chinh_sua->gia_nhap }}">
            </div>

            <div class="form-group">
              <label for=""><b>Giá bán:</b></label>
              <input type="number" class="form-control" name="txt_gia_ban" id="txt_gia_ban" 
              placeholder="Nhập giá bán sản phẩm" value="{{ $chinh_sua->gia_ban }}">
            </div>

            <div class="form-group">
              <label for=""><b>Số lượng:</b></label>
              <input type="number" class="form-control" name="txt_so_luong" 
              placeholder="Nhập số lượng sản phẩm" id="txt_so_luong" 
              value="{{ $chinh_sua->so_luong }}">
            </div>

            <div class="form-group">
              <label for=""><b>Miêu tả sản phẩm:</b></label>
              <textarea name="txt_mieu_ta" id="txt_mieu_ta" 
              class="form-control" rows="5">{!! $chinh_sua->mieu_ta !!}</textarea>
            </div>
          
          
            <button type="submit" class="btn btn-primary btn-block">CẬP NHẬT</button>
          </form>

            
          </div>
          <!-- end-card-body -->
        </div>
        <!-- end-Card-Example -->
      </div>
      <div class="col-lg-2 mb-4"></div>
      <!-- end-Content-Column -->
    </div>
    <!-- end-Content-Row -->

  </div>

  <script>
    CKEDITOR.replace( 'txt_mieu_ta' );
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
      var file = document.querySelector("#txt_hinh_anh_sp");
      if ( /\.(jpe?g|png|gif)$/i.test(file.files[0].name) === false ) 
      { 
        alert("Bắt buộc file hình ảnh có đuôi là: PNG, JPG, GIF"); 
        document.querySelector("#txt_hinh_anh_sp").value = "";
      }
    }
  </script>
          
@endsection



