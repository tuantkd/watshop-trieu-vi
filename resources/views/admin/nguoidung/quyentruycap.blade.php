@extends('layout.layout_admin')
@section('tieu_de', 'Quyền Truy Cập')



{{-- ================================================ --}}
@section('content')

<script>
        var msg = '{{Session::get('thong_bao_quyen_truy_cap')}}';
        var exist = '{{Session::has('thong_bao_quyen_truy_cap')}}';
        if(exist){
          Swal.fire({
            position: 'center',
            icon: 'success',
            title: 'Đã thêm quyền truy cập',
            showConfirmButton: false,
            timer: 1500
          })
        }
    </script>
<!-- 
  model thêm quyền truy cập
---------------------------------------- -->
<div class="modal fade" id="modal-id">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
      </div>
      <div class="modal-body">
        <form action="{{ url('admin/post-quyen-truy-cap') }}" method="POST"
        name="myForm" onsubmit="return validateForm();">
         <!--  {{-- mã token bảo vệ dữ liệu bắt buộc có --}} -->
          {{ csrf_field() }}
          <div class="form-group">
            <label for="">Tên Quyền </label>
            <input type="text" class="form-control" name="txt_quyen_truy_cap" id="txt_quyen_truy_cap" placeholder="Nhập tên quyền">
          </div>

          <div class="form-group">
            <label for="">Mô Tả </label>
            <textarea name="txt_mieu_ta"  class="form-control" rows="5"></textarea>
          </div>

          
        

          <button type="submit" class="btn btn-primary btn-block">Thêm</button>
        </form>
      </div>
    </div>
  </div>
</div>




 <div class="container-fluid">
          <!-- Content Row1 -->
          <!-- breadcrumb -->
                    <ul class="breadcrumb">
                      <li class="breadcrumb-item">
                        <a href="{{ url('admin/home-admin') }}" style="text-decoration:none;">Bảng điều khiển</a>
                      </li>
                      <li class="breadcrumb-item active">Quyền truy Cập</li>
                    </ul>
              <!-- end-breadcrumb -->
          <div class="row">

            <!-- Content Column -->
            <div class="col-lg-12 mb-4">
              
              <!-- Project Card Example -->
              <div class="card shadow mb-4">

                {{-- cart-header --}}
                <div class="card-header py-3">
                  <div class="clearfix">
             <span class="float-left"><h6 class="m-0 font-weight-bold text-primary">QUYỀN TRUY CẬP</h6></span>
              <span class="float-right"><a class="btn btn-primary" data-toggle="modal" href='#modal-id'>
             <i class="fas fa-plus"></i> Thêm Mới</a></span>
          </div>
                  
                  
                </div>

                {{-- end cart-header --}}


                {{-- cart body --}}
                <div class="card-body" style="padding: 5px;">
                    <div class="text-right">
                      <button style="margin-bottom: 10px;" class="btn btn-danger btn-sm delete_all"
                        data-url="{{ url('admin/xoa') }}">
                            <i class="fa fa-trash-alt"></i>
                            &ensp;Xóa tất cả đã chọn
                        </button>
                    </div>

                  
                  <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th scope="col"><input type="checkbox" id="check_all"></th>
                            <th scope="col">STT</th>
                            <th scope="col">Tên Quyền</th>
                            <th scope="col">Mô Tả</th>

                          </tr >
                        </thead>
                        <tbody>
                          <?php $i=1; ?>

                          @foreach($hien_thi_du_lieu as $hien_thi)

                                  <tr id="tr_{{ $hien_thi->id}}">

                                  <td data-label="Chọn">
                                    <input type="checkbox" class="sub_check" data-id="{{ $hien_thi->id}}">
                                  </td>

                                  <td data-label="STT">
                                    <?php echo $i++; ?>
                                  </td>

                                  <td data-label="Tên quyền">
                                    {{$hien_thi->ten_quyen}}

                                  </td>

                                  <td data-label="Mô Tả">
                                    {!!$hien_thi->mieu_ta !!}
                                  </td>

                                  
                                </tr>
                          @endforeach

                        </tbody>
                      </table>
                </div>
                {{-- endcart body --}}
              </div>

              {{-- end cart example --}}
            </div>

            {{-- end contentcolum --}}
          </div>
            {{-- end content row1 --}}
        </div>

<script>
            CKEDITOR.replace( 'txt_mieu_ta' );
  </script>

  <script type="text/javascript">
        function validateForm() {
          var txt_quyen_truy_cap = document.forms["myForm"]["txt_quyen_truy_cap"].value; 
          var txt_mieu_ta = document.forms["myForm"]["txt_mieu_ta"].value;
          if (txt_quyen_truy_cap == "") {
            alert("vui lòng nhập quyền truy cập");
            document.getElementById("txt_quyen_truy_cap").focus();
            return false;
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
                                        position: 'top-end'
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



