@extends('layout.layout_admin')
@section('tieu_de', 'Nhân Viên')

{{-- ================================================ --}}
@section('search')

  <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search"
  action="{{ url('admin/nhan-vien') }}" method="GET">
    <div class="input-group">
      <input type="text" class="form-control bg-light border-0 small" placeholder="Tìm Kiếm..."
        aria-label="Search" aria-describedby="basic-addon2" name="txt_search">
      <div class="input-group-append">
        <button class="btn btn-primary" type="button">
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
        var msg = '{{Session::get('thong_bao_them_nguoi_dung')}}';
        var exist = '{{Session::has('thong_bao_them_nguoi_dung')}}';
        if(exist){
          Swal.fire({
            position: 'center',
            icon: 'success',
            title: 'Đã thêm nhân viên thành công',
            showConfirmButton: false,
            timer: 1500
          })
        }
</script>

<script>
        var msg = '{{Session::get('thong_bao_quyen_truy_cap')}}';
        var exist = '{{Session::has('thong_bao_quyen_truy_cap')}}';
        if(exist){
          Swal.fire({
            position: 'center',
            icon: 'success',
            title: 'Đã thay đổi quyền thành công',
            showConfirmButton: false,
            timer: 1500
          })
        }
</script>


<!--
	model thêm nhân viên
---------------------------------------- -->
<div class="modal fade" id="modal-id">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			</div>
		</div>
	</div>
</div>

 <div class="container-fluid">
          <!-- Content Row1 -->
          <div class="row">

            <!-- Content Column -->
            <div class="col-lg-12 mb-4">
              <!-- breadcrumb -->
                    <ul class="breadcrumb">
                      <li class="breadcrumb-item">
                        <a href="{{ url('admin/home-admin') }}" style="text-decoration:none;">Bảng điều khiển</a>
                      </li>
                      <li class="breadcrumb-item active">Quản lý nhân viên</li>
                    </ul>
              <!-- end-breadcrumb -->
              <!-- Project Card Example -->
              <div class="card shadow mb-4">

                {{-- cart-header --}}
                <div class="card-header py-3">
                	<div class="clearfix">
	 					 <span class="float-left"><h6 class="m-0 font-weight-bold text-primary">DANH SÁCH NHÂN VIÊN</h6></span>
	  					<span class="float-right">
              <a class="btn btn-primary"
              href='{{url('admin/them-nguoi-dung')}}'>
	 					 <i class="fas fa-user-plus"></i> Thêm Mới</a></span>
					</div>


                </div>

                {{-- end cart-header --}}


                {{-- cart body --}}
                <div class="card-body" style="padding: 5px;">
                  <div class="text-left" style="padding-left: 10px;">
                      <button style="margin-bottom: 10px;" class="btn btn-danger btn-sm delete_all"
                        data-url="{{ url('admin/xoa-nhan-vien') }}">
                            <i class="fa fa-trash-alt"></i>
                      </button>
                  </div>

                  <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th scope="col"><input type="checkbox" id="check_all"></th>
                            <th scope="col">STT</th>
                            <th scope="col">Tên Nhân Viên</th>
                            <th scope="col">Hình Ảnh</th>
                            <th scope="col">Tên Tài Khoản</th>
                            <th scope="col">Giới Tính</th>
                            <th scope="col">Ngày Sinh</th>
                            <th scope="col">SĐT</th>
                            <th scope="col">Email</th>
                            <th scope="col">Địa Chỉ</th>
                            <th scope="col">Quyền</th>
                            <th scope="col">Tùy Chọn</th>

                          </tr>
                        </thead>


                        <tbody>
                          @foreach($lay_nhan_vien as $key => $nhan_vien)

                            <tr id="tr_{{  $nhan_vien->id}}">

                              <td data-label="Chọn">
                                  <input type="checkbox" class="sub_check" data-id="{{$nhan_vien->id}}">
                              </td>

                              <td data-label="STT">
                                {{++$key}}
                               </td>

                              <td data-label="Tên Nhân Viên">
                                {{$nhan_vien->ho_ten}}
                               </td>

                               <td data-label="Ảnh đại diện">
                                    ​<img src="{{ url('public/image_avatar/'.$nhan_vien->hinh_anh) }}"
                                    class="img-fluid" style="max-width:100%;height:100px;">
                                </td>

                              <td data-label="Tên Tài Khoản">
                                {{$nhan_vien->username}}
                              </td>


                              <td data-label="Giới Tính">
                                {{$nhan_vien->gioi_tinh}}

                              </td>

                              <td data-label="Ngày Sinh">
                                {{$nhan_vien->ngay_sinh}}
                              </td>

                              <td data-label="SĐT">
                                {{$nhan_vien->dien_thoai}}

                               </td>

                              <td data-label="Email">
                                {{$nhan_vien->email}}
                              </td>

                              <td data-label="Địa Chỉ">
                                {{$nhan_vien->dia_chi}}
                              </td>

                              <td data-label="Quyền">
                                @php($id_quyen = DB::table('quyen_truy_caps')
                                ->where('id','=', $nhan_vien->id_truy_cap)->get())
                                @foreach($id_quyen as $quyen)
                                    {{$quyen->ten_quyen}}
                                @endforeach
                              </td>


                              <td data-label="Tùy chọn">
                                <a class="btn btn-sm btn-success"
                                 href="{{url('admin/thay-doi-quyen/'.$nhan_vien->id) }}"
                                title="thay đổi quyền">
                                  <i class="fas fa-exchange-alt"></i>
                                </a>
                              </td>

                        </tr>
                          @endforeach

                        </tbody>
                      </table>
                </div>

                <div class="mx-auto" style="width:150px">
                  <!-- phân trang số thứ tự -->
                  {{ $lay_nhan_vien->links() }}
                  <!-- phân trang số thứ tự -->
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



