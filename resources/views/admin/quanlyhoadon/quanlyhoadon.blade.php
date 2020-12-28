  @extends('layout.layout_admin')
  @section('tieu_de', 'Quản Lý Hóa Đơn')

  <!-- ================================================ -->
  @section('content')

      <script>
          var msg = '{{Session::get('thong_bao_da_duyet')}}';
          var exist = '{{Session::has('thong_bao_da_duyet')}}';
          if(exist){
              Swal.fire({
                  position: 'center',
                  icon: 'success',
                  title: 'Đã duyệt',
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
            <!-- breadcrumb -->
            <ul class="breadcrumb">
              <li class="breadcrumb-item">
                <a href="{{ url('admin/home-admin') }}" style="text-decoration:none;">
                  Bảng Điều Khiển
                </a>
                <li class="breadcrumb-item active">Quản Lý Hóa Đơn</li>
            </ul>
            <!-- end-breadcrumb -->

            <!-- Project Card Example -->
            <div class="card shadow mb-4">

                {{-- cart-header --}}
                <div class="card-header py-3">
                 <div class="clearfix">
                  <span class="float-left">
                    <h6 class="m-0 font-weight-bold text-primary">
                      DANH SÁCH HÓA ĐƠN
                    </h6>
                  </span>
                  </div>
                </div>
                {{-- end cart-header --}}

              {{-- cart body --}}
              <div class="card-body" style="padding: 5px;">

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

                      <th scope="col" colspan="2">Tùy chọn</th>

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
                          {{ date('d/m/Y', strtotime($data->ngay_giao_hang)) }}
                      </td>

                      <td data-label="Trạng Thái">
                        <b style="font-style:italic;color:green;">
                            @if($data->trang_thai == 0)
                                Đang đặt hàng
                            @else
                                Đã duyệt
                            @endif
                        </b>
                      </td>
                       <td data-label="tùy chọn">
                           <a class="btn btn-sm btn-success"
                              href="{{ url('admin/chi-tiet-hoa-don/'.$data->id) }}" title="Xem chi tiết"><i class="fa fa-eye"></i>
                           </a>
                       </td>

                        <td data-label="tùy chọn">
                           <a class="btn btn-sm btn-primary"
                              href="{{ url('admin/duyet-hoa-don/'.$data->id) }}" title="Duyệt hóa đơn"><i class="fa fa-check"></i>
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



