@extends('layout.layout_admin')
@section('tieu_de', 'Admin')



{{-- ================================================ --}}
@section('content')
	 <div class="container-fluid">

    <div class="container-fluid">

        <script>
          var msg = '{{Session::get('cap_nhat_thong_tin')}}';
          var exist = '{{Session::has('cap_nhat_thong_tin')}}';
          if(exist){
              Swal.fire({
              position: 'center',
              icon: 'success',
              title: 'Đã cập nhật thông tin',
              showConfirmButton: false,
              timer: 1800
            })
          }
        </script>

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">BẢNG ĐIỀU KHIỂN</h1>
          </div>

          <!-- Content Row -->
          <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                        Tổng Hóa Đơn
                      </div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">
                        @php($dem_hoa_don = DB::table('hoa_dons')->count())
                        {{ $dem_hoa_don }}
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-money-check-alt fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                        Tổng Danh Thu
                      </div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">
                        @php($tong_danh_thu = DB::table('hoa_don_chi_tiets')->sum('tong_gia'))
                        {{ number_format($tong_danh_thu) }} VND
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                        Tổng Khách Hàng
                      </div>
                      <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                          <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                            @php($dem_khachs = DB::table('khach_hangs')->count())
                            {{ $dem_khachs }}
                          </div>
                        </div>

                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-users fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Tổng Sản Phẩm</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">
                        @php($dem_sp = DB::table('san_phams')->count())
                        {{ $dem_sp }}
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-list-alt fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>


          <!-- Content Row1 -->
          <div class="row">

            <!-- Content Column -->
            <div class="col-lg-12 mb-4">

              <!-- Project Card Example -->
              <div class="card shadow mb-4">

                {{-- cart-header --}}
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Hóa Đơn Mới Nhất</h6>
                </div>
                {{-- end cart-header --}}


                {{-- cart body --}}
                <div class="card-body" style="padding: 5px;">

                  @php($get_hoa_dons = DB::table('hoa_dons')->latest()->paginate(1))
                  @if($get_hoa_dons->count() > 0)

                    <button style="margin-bottom: 10px;" class="btn btn-danger btn-sm delete_all"
                    data-url="{{ url('admin/xoa-hoa-don') }}">
                      <i class="fa fa-trash-alt"></i>
                      &ensp;Xóa tất cả đã chọn
                    </button>

                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th scope="col"><input type="checkbox" id="check_all"></th>

                          <th scope="col">STT</th>

                          <th scope="col">Tên Khách Hàng</th>

                          <th scope="col">Ngày Giao Hàng</th>

                          <th scope="col">Trạng Thái</th>

                          <th scope="col">Tùy chọn</th>

                        </tr>
                      </thead>
                      <tbody>

                      @foreach($get_hoa_dons as $key => $data)

                        <tr id="tr_{{ $data->id }}">

                          <td data-label="Chọn">
                            <input type="checkbox" class="sub_check" data-id="{{ $data->id }}">
                          </td>
                          <td data-label="STT">
                            {{ ++$key }}
                          </td>

                          <td data-label="Tên Khách Hàng">
                          @php($lay_khs = DB::table('khach_hangs')
                          ->where('id',$data->id_khach_hang)->get())
                          @foreach($lay_khs as $lay_kh)
                            {{ $lay_kh->ho_ten }}
                          @endforeach
                          </td>

                          <td data-label="Ngày Giao Hàng">
                              {{ $data->ngay_giao_hang }}
                          </td>

                          <td data-label="Trạng Thái">
                              @if($data->trang_thai == 0)
                                  <b style="font-style:italic;color:green;">Chờ thanh toán</b>
                              @endif
                          </td>

                          <td data-label="tùy chọn">
                           <a class="btn btn-sm btn-success"
                           href="{{ url('admin/chi-tiet-hoa-don/'.$data->id) }}" title="Xem chi tiết">
                             <i class="fa fa-eye"></i>
                           </a>
                          </td>

                        </tr>

                      @endforeach

                      </tbody>
                    </table>

                  @else
                    <div class="alert alert-danger" align="center">
                      <strong>Không có dữ liệu</strong>
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


           <!-- Content Row2-->
          <div class="row">

            <!-- Content Column -->
            <div class="col-lg-12 mb-4">

              <!-- Project Card Example -->
              <div class="card shadow mb-4">

                {{-- cart-header --}}
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Sản Phẩm Mới Nhất</h6>
                </div>
                {{-- end cart-header --}}


                {{-- cart body --}}
                <div class="card-body" style="padding: 5px;">







                  @if($lay_sp_moi->count() > 0)

                    <button style="margin-bottom: 10px;" class="btn btn-danger btn-sm delete_all"
                    data-url="{{ url('admin/xoa-san-pham') }}">
                      <i class="fa fa-trash-alt"></i>
                      &ensp;Xóa tất cả đã chọn
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

                        @foreach($lay_sp_moi as $key => $data)
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
                      {{ $lay_sp_moi->links() }}
                      <!-- phân trang số thứ tự -->
                    </div>

                  @else
                    <div class="alert alert-danger" align="center">
                      <strong>Không có dữ liệu</strong>
                    </div>
                  @endif







                </div>
                {{-- endcart body --}}
              </div>

              {{-- end cart example --}}
            </div>

            {{-- end contentcolum --}}
          </div>
            {{-- end content row2 --}}
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
