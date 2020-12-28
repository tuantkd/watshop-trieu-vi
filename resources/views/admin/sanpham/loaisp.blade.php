@extends('layout.layout_admin')
@section('tieu_de', 'Loại Sản Phẩm')
<!-- =============================================================== -->


<!-- =============================================================== -->
@section('search')

  <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search"
  action="{{ url('admin/loai-san-pham') }}" method="GET">
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
<!-- =============================================================== -->



<!-- =============================================================== -->
@section('content')

  <script>
    var msg = '{{Session::get('thong_bao_them_loai')}}';
    var exist = '{{Session::has('thong_bao_them_loai')}}';
    if(exist){
      Swal.fire({
        position: 'center',
        icon: 'success',
        title: 'Đã thêm loại',
        showConfirmButton: false,
        timer: 1500
      })
    }
  </script>

  <div class="modal fade" id="modal-id">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        </div>
        <div class="modal-body">

          <form action="{{ url('admin/post-loai-san-pham') }}" method="POST">
            {{ csrf_field() }}
            <div class="form-group">
              <label for="">Tên Loại</label>
              <input type="text" class="form-control" name="txt_loai" placeholder="Nhập Tên Loại Sản Phẩm"
              required="required">
            </div>
            <button type="submit" class="btn btn-primary btn-block">Thêm</button>
          </form>
          
        </div>
      </div>
    </div>
  </div>


  <div class="container-fluid">
    <!-- breadcrumb -->
    <ul class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="{{ url('admin/home-admin') }}" style="text-decoration:none;">Bảng điều khiển</a>
      </li>
      <li class="breadcrumb-item active">Quản lý loại sản phẩm</li>
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
  			      <span class="float-left">
                <h6 class="m-0 font-weight-bold text-primary">DANH SÁCH LOẠI SẢN PHẨM</h6>
              </span>
  			      <span class="float-right">
                <a class="btn btn-primary" data-toggle="modal" href='#modal-id'>
  			        <i class="fas fa-plus"></i> Thêm Mới</a>
              </span>
  	       </div>
          </div>

          {{-- end cart-header --}}

          {{-- cart body --}}
          <div class="card-body" style="padding: 5px;">
          @if($lay_loai->count() > 0)
            <div class="text-right">
              <button style="margin-bottom: 10px;" class="btn btn-danger btn-sm delete_all"
                data-url="{{ url('admin/xoa-loai-san-pham') }}">
                  <i class="fa fa-trash-alt"></i>
                  &ensp;Xóa tất cả đã chọn
              </button>
            </div>

            <table class="table table-bordered">
              <thead>
                <tr>
                  <th scope="col"><input type="checkbox" id="check_all"></th>
                  <th scope="col">STT</th>
                  <th scope="col">Tên Loại</th>
                </tr>
              </thead>
              <tbody>
              
              @foreach($lay_loai as $key => $loai)

                <tr id="tr_{{ $loai->id }}">
                  <td data-label="Chọn">
                    <input type="checkbox" class="sub_check" data-id="{{ $loai->id }}">
                  </td>

                  <td data-label="STT">
                    {{ ++$key }}
                  </td>

                  <td data-label="Tên Loại">
                    {{ $loai->ten_loai_sp }}
                  </td>

                </tr>

              @endforeach

              </tbody>
            </table>
            <div class="mx-auto" style="width:150px">
              <!-- phân trang số thứ tự -->
              {{ $lay_loai->links() }}
              <!-- phân trang số thứ tự -->
            </div>

          @else
            <div class="alert alert-danger" align="center">
              <strong><b style="color:red;">Không có dữ liệu</b></strong>
            </div>
          @endif

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
            }  else {  


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
                                    title: "Đã xóa thành công",
                                    icon: "success",
                                    timer: 1500,
                                    showConfirmButton: false,
                                    position: 'center'
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



