@extends('layout.layout_admin')
@section('tieu_de', 'Danh Sách Sản Phẩm')


{{-- ================================================ --}}
@section('search')

  <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search"
  action="{{ url('admin/danh-sach-san-pham') }}" method="GET">
    <div class="input-group">
      <input type="text" class="form-control bg-light border-0 small" placeholder="Tìm Kiếm..." aria-label="Search" aria-describedby="basic-addon2" name="txt_search">
      <div class="input-group-append">
        <button class="btn btn-primary" type="submit">
          <i class="fas fa-search fa-sm"></i>
        </button>
      </div>
    </div>
  </form>

@endsection
{{-- ================================================ --}}





{{-- ================================================ --}}
@section('content')


<script>
    var msg = '{{Session::get('them_san_pham')}}';
    var exist = '{{Session::has('them_san_pham')}}';
    if(exist){
        Swal.fire({
        position: 'center',
        icon: 'success',
        title: 'Đã thêm sản phẩm',
        showConfirmButton: false,
        timer: 1800
      })
    }
  </script>

  <script>
    var msg = '{{Session::get('cap_nhat_sp')}}';
    var exist = '{{Session::has('cap_nhat_sp')}}';
    if(exist){
        Swal.fire({
        position: 'center',
        icon: 'success',
        title: 'Đã cập nhật sản phẩm',
        showConfirmButton: false,
        timer: 1800
      })
    }
  </script>



<div class="modal fade" id="modal-id">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
      </div>
      <div class="modal-body">



        <form action="{{ url('admin/post-danh-sach-san-pham') }}" method="POST"
          onsubmit="return validateForm()" name="myForm" enctype="multipart/form-data">
          {{ csrf_field() }}

            <div class="form-group">
              <label for=""><b>Loại sản phẩm:</b></label>
              <select name="txt_loai_id" class="form-control" required="required">
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
              placeholder="Nhập tên sản phẩm">
            </div>

            <div class="form-group">
              <label for=""><b>Hình ảnh:</b></label><br>
              <input type="file" name="txt_hinh_anh_sp" id="txt_hinh_anh_sp"
              onchange="readURL(this);checkextension();">

              <img id="blah" src=""
              style="max-width:100%;height:200px;margin-top:10px;"/>
            </div>

            <div class="form-group">
              <label for=""><b>Nhà cung cấp:</b></label>
              <select name="txt_nha_cung_cap" class="form-control" id="txt_nha_cung_cap">
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
              placeholder="Nhập giá mua sản phẩm">
            </div>

            <div class="form-group">
              <label for=""><b>Giá bán:</b></label>
              <input type="number" class="form-control" name="txt_gia_ban" id="txt_gia_ban"
              placeholder="Nhập giá bán sản phẩm">
            </div>

            <div class="form-group">
              <label for=""><b>Số lượng:</b></label>
              <input type="number" class="form-control" name="txt_so_luong"
              placeholder="Nhập số lượng sản phẩm" id="txt_so_luong">
            </div>

            <div class="form-group">
              <label for=""><b>Miêu tả sản phẩm:</b></label>
              <textarea name="txt_mieu_ta" id="txt_mieu_ta"
              class="form-control" rows="5"></textarea>
            </div>

            <button type="submit" class="btn btn-primary btn-block">THÊM</button>
          </form>

      </div>
    </div>
  </div>
</div>


<div class="container-fluid">

    <!-- Content Row -->
    <div class="row">
      <!-- Content Column -->
      <div class="col-lg-12 mb-4">

        <!-- breadcrumb -->
        <ul class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="{{ url('admin/home-admin') }}" style="text-decoration:none;">Bảng điều khiển</a>
          </li>
          <li class="breadcrumb-item active">Danh sách sản phẩm</li>
        </ul>
        <!-- end-breadcrumb -->

        <!-- Card Example -->
        <div class="card shadow mb-4">
          <!-- card-header -->
          <div class="card-header py-3">
            <div class="clearfix">
              <span class="float-left">
                <h6 class="m-0 font-weight-bold text-primary">DANH SÁCH SẢN PHẨM</h6>
              </span>
              <span class="float-right">
                <a class="btn btn-primary" data-toggle="modal" href='#modal-id'>
                  <i class="fas fa-plus"></i> Thêm mới
                </a>
              </span>
            </div>

          </div>
          <!-- end-card-header -->

          <!-- card-body -->
          <div class="card-body" style="padding:5px;">
          @if($lay_sp->count() > 0)

            <button style="margin-bottom: 10px;" class="btn btn-danger btn-sm delete_all"
            data-url="{{ url('admin/xoa-san-pham') }}">
              <i class="fa fa-trash-alt"></i>
              &ensp;Xóa
            </button>

            <div class="table-responsive">
              <table class="table table-bordered" align="center">
                <thead>
                  <tr>
                    <th scope="col"><input type="checkbox" id="check_all"></th>
                    <th scope="col">STT</th>
                    <th scope="col">Loại sản phẩm</th>
                    <th scope="col">Tên sản phẩm</th>
                    <th scope="col">Hình ảnh</th>
                    <th scope="col">Giá mua</th>
                    <th scope="col">Giá bán</th>
                    <th scope="col">Số lượng</th>
                    <th scope="col" colspan="2">Tùy chọn</th>
                  </tr>
                </thead>
                <tbody>

                @foreach($lay_sp as $key => $data)
                  <tr id="tr_{{ $data->id }}">

                    <td data-label="Chọn">
                      <input type="checkbox" class="sub_check" data-id="{{ $data->id }}">
                    </td>

                    <td data-label="STT">
                      {{ ++$key }}
                    </td>

                    <td data-label="Loại sản phẩm">
                    @php($lay_ten = DB::table('loai_san_phams')
                    ->where('id',$data->id_loai_sp)->get())
                    @foreach($lay_ten as $value)
                      {{ $value->ten_loai_sp }}
                    @endforeach
                    </td>

                    <td data-label="Tên sản phẩm">
                      {{ $data->ten_san_pham }}
                    </td>

                    <td data-label="Hình ảnh">
                      ​<img src="{{ url('public/image_product/'.$data->hinh_anh) }}"
                      class="img-fluid" style="max-width:100%;height:100px;">
                    </td>

                    <td data-label="Giá nhập">
                      {{ number_format($data->gia_nhap) }} VND
                    </td>

                    <td data-label="Giá bán">
                      {{ number_format($data->gia_ban) }} VND
                    </td>

                    <td data-label="Số lượng">
                      {{ $data->so_luong }}
                    </td>

                    <td data-label="Tùy chọn">
                      <a class="btn btn-sm btn-primary"
                      href="{{ url('admin/chinh-sua-san-pham/'.$data->id) }}"
                      title="Chỉnh sửa">
                        <i class="fas fa-edit"></i>
                      </a>
                    </td>

                    <td data-label="Tùy chọn">
                      <a class="btn btn-sm btn-success"
                      href="{{ url('admin/chi-tiet-san-pham/'.$data->id) }}"
                      title="Xem chi tiết">
                        <i class="fas fa-eye"></i>
                      </a>
                    </td>

                  </tr>

                @endforeach


                </tbody>
              </table>
            </div>
            <div class="mx-auto" style="width:150px">
              <!-- phân trang số thứ tự -->
              {{ $lay_sp->links() }}
              <!-- phân trang số thứ tự -->
            </div>

          @else
            <div class="alert alert-danger" align="center">
              <strong>Không có dữ liệu</strong>
            </div>
          @endif

          </div>
          <!-- end-card-body -->
        </div>
        <!-- end-Card-Example -->
      </div>
      <!-- end-Content-Column -->
    </div>
    <!-- end-Content-Row -->
</div>






  <script>
    CKEDITOR.replace( 'txt-mieu-ta' );
  </script>


  <script>
          CKEDITOR.replace( 'txt_mieu_ta' );
  </script>

  <script type="text/javascript">
    function validateForm() {
      var txt_ten_sp = document.forms["myForm"]["txt_ten_sp"].value;
      var txt_hinh_anh_sp = document.forms["myForm"]["txt_hinh_anh_sp"].value;
      var txt_nha_cung_cap = document.forms["myForm"]["txt_nha_cung_cap"].value;
      var txt_gia_mua = document.forms["myForm"]["txt_gia_mua"].value;
      var txt_gia_ban = document.forms["myForm"]["txt_gia_ban"].value;
      var txt_so_luong = document.forms["myForm"]["txt_so_luong"].value;
      var txt_don_vi_tinh = document.forms["myForm"]["txt_don_vi_tinh"].value;
      var txt_mieu_ta = document.forms["myForm"]["txt_mieu_ta"].value;

      if (txt_ten_sp == "") {
        alert("Chưa nhập tên sản phẩm");
        document.getElementById("txt_ten_sp").focus();
        return false;
      }

      if (txt_hinh_anh_sp == "") {
        alert("Chưa chọn hình ảnh sản phẩm");
        document.getElementById("txt_hinh_anh_sp").focus();
        return false;
      }

      if (txt_nha_cung_cap == "") {
        alert("Chưa chọn nhà cung cấp");
        document.getElementById("txt_nha_cung_cap").focus();
        return false;
      }

      if (txt_gia_mua == "") {
        alert("Chưa nhập giá mua");
        document.getElementById("txt_gia_mua").focus();
        return false;
      }

      if (txt_gia_ban == "") {
        alert("Chưa nhập giá bán");
        document.getElementById("txt_gia_ban").focus();
        return false;
      }

      if (txt_so_luong == "") {
        alert("Chưa nhập số lượng");
        document.getElementById("txt_so_luong").focus();
        return false;
      }

      if (txt_don_vi_tinh == "") {
        alert("Chưa chọn đơn vị tính");
        document.getElementById("txt_don_vi_tinh").focus();
        return false;
      }

      if (txt_mieu_ta == "") {
        alert("Chưa nhập miêu tả sản phẩm");
        document.getElementById("txt_mieu_ta").focus();
        return false;
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
      var file = document.querySelector("#txt_hinh_anh_sp");
      if ( /\.(jpe?g|png|gif)$/i.test(file.files[0].name) === false )
      {
        alert("Bắt buộc file hình ảnh có đuôi là: PNG, JPG, GIF");
        document.querySelector("#txt_hinh_anh_sp").value = "";
      }
    }
  </script>


  <script type="text/javascript">
    $(document).ready(function () {
      //Click chọn tất cả các checkbox
      $('#check_all').on('click', function(e) {
       if($(this).is(':checked',true))
       {
          $(".sub_check").prop('checked', true);
       } else {
          $(".sub_check").prop('checked',false);
       }
      });

      //Click xóa tất cả đã chọn
      $('.delete_all').on('click', function(e) {

          var allVals = [];
          $(".sub_check:checked").each(function() {
              allVals.push($(this).attr('data-id'));
          });


          if(allVals.length <= 0)
          {
              alert("Vui lòng chọn hàng!");
          } else {


              var check = confirm("Bạn có chắc chắn muốn xóa?");
              if(check == true){


                  var join_selected_values = allVals.join(",");


                  $.ajax({
                      url: $(this).data('url'),
                      type: 'DELETE',
                      headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                      data: 'ids=' + join_selected_values,

                      success: function (data) {
                          if (data['success']) {
                              $(".sub_checkk:checked").each(function() {
                                  $(this).parents("tr").remove();
                              });
                              location.reload();
                              Swal.fire({
                                  position: 'center',
                                  icon: 'success',
                                  title: 'Checkbox chọn đã xóa',
                                  showConfirmButton: false,
                                  timer: 2000
                              });
                          }else {
                              alert('Rất tiếc, đã xảy ra lỗi!!');
                          }
                      },
                      error: function (data) {
                          alert(data.responseText);
                      }
                  });


                $.each(allVals, function( index, value ) {
                    $('table tr').filter("[data-row-id='" + value + "']").remove();
                });
              }
          }
      });
    });
  </script>


@endsection



