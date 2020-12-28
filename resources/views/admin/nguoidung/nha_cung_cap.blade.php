@extends('layout.layout_admin')
@section('tieu_de', 'Nhà cung cấp')
<!-- ================================================================= -->


{{-- ================================================ --}}
@section('search')

  <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search"
  action="{{ url('admin/nha-cung-cap') }}" method="GET">
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


<!-- ================================================================= -->
@section('content')

  <script>
    var msg = '{{Session::get('them_ss')}}';
    var exist = '{{Session::has('them_ss')}}';
    if(exist){
      Swal.fire({
        position: 'center',
        icon: 'success',
        title: 'Đã thêm nhà cung cấp',
        showConfirmButton: false,
        timer: 1500
      })
    }
  </script>

  <!-- modal -->
  <div class="modal fade" id="modal-id">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        </div>
        <div class="modal-body">

          <form action="{{ url('admin/post-nha-cung-cap') }}" method="POST">
            {{ csrf_field() }}
            <div class="form-group">
              <label for=""><b>Tên nhà cung cấp:</b></label>
              <input type="text" class="form-control" name="txt_ten_ncc" 
              placeholder="Nhập tên nhà cung cấp" required="required">
            </div>

            <div class="form-group">
              <label for=""><b>Thông tin nhà cung cấp:</b></label>
              <textarea name="txt_thong_tin" class="form-control" rows="3" required="required"></textarea>
            </div>
          
            <button type="submit" class="btn btn-primary btn-block">THÊM</button>
          </form>
          
        </div>
      </div>
    </div>
  </div>
  <!-- modal -->


  <div class="container-fluid">
    <!-- Content Row1 -->
    <div class="row">

      <!-- Content Column -->
      <div class="col-lg-12 mb-4">

        <!-- breadcrumb -->
        <ul class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="{{ url('admin/home-admin') }}" style="text-decoration:none;">Bảng Điều Khiển</a>
          <li class="breadcrumb-item active">Quản Lý Nhà Cung Cấp</li>
        </ul>
        <!-- end-breadcrumb -->

        <!-- Project Card Example -->
        <div class="card shadow mb-4">

          {{-- cart-header --}}
          <div class="card-header py-3">
             <div class="clearfix">
              <span class="float-left">
                <h6 class="m-0 font-weight-bold text-primary">DANH SÁCH NHÀ CUNG CẤP</h6>
              </span>
              <span class="float-right">
                <a class="btn btn-xs btn-success" data-toggle="modal" href='#modal-id'>
                  <i class="fas fa-plus"></i> Thêm mới
                </a>
              </span>
            </div>
          </div>
          {{-- cart-header --}}

          {{-- cart body --}}
          <div class="card-body" style="padding: 5px;">
          @if($lay_nha_cung_cap->count() > 0)

          <button style="margin-bottom: 10px;" class="btn btn-danger btn-sm delete_all"
          data-url="{{ url('admin/xoa-nha-cung-cap') }}">
              <i class="fa fa-trash-alt"></i>
              &ensp;Xóa tất cả đã chọn
          </button>

          <div class="table-responsive">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th scope="col"><input type="checkbox" id="check_all"></th>

                  <th scope="col">STT</th>
                  
                  <th scope="col">Tên nhà cung cấp</th>

                  <th scope="col">Thông tin</th>

                </tr>
              </thead>
              <tbody>

                @foreach($lay_nha_cung_cap as $key =>$value)

                  <tr id="tr_{{ $value->id }}">

                    <td data-label="Chọn">
                      <input type="checkbox" class="sub_check" data-id="{{ $value->id }}">
                    </td>

                    <td data-label="STT">
                      {{ ++$key }}
                    </td>

                    <td data-label="Tên nhà cung cấp">
                      {{ $value->xuat_xu }}
                    </td>

                    <td data-label="Thông tin">
                      {!! $value->thong_tin !!}
                    </td>

                  </tr>

                @endforeach
              </tbody>
            </table>
          </div>
          <div class="mx-auto" style="width:150px">
            <!-- phân trang số thứ tự -->
            {{ $lay_nha_cung_cap->links() }}
            <!-- phân trang số thứ tự -->
          </div>

          @else
            <div class="alert alert-danger" align="center">
              <strong>Không có dữ liệu</strong>
            </div>
          @endif

          {{-- endcart body --}}
        </div>
        {{-- end cart example --}}
      </div>
      {{-- end contentcolum --}}
    </div>
    {{-- end content row1 --}}
  </div>

  <script>
    CKEDITOR.replace('txt_thong_tin');
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



