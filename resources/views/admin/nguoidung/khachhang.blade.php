  @extends('layout.layout_admin')
  @section('tieu_de', 'Khách Hàng')

  {{-- ================================================ --}}
  @section('content')
  <!--
  	model thêm nhân viên
    ---------------------------------------- -->

    <div class="container-fluid">
      <!-- Content Row1 -->
      <div class="row">

        <!-- Content Column -->
        <div class="col-lg-12 mb-4">
          <!-- breadcrumb -->
          <ul class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="{{ url('admin/home-admin') }}" style="text-decoration:none;">Bảng Điều Khiển</a>



              <li class="breadcrumb-item active">Quản Lý Khách Hàng</li>
            </ul>
            <!-- end-breadcrumb -->
            <!-- Project Card Example -->
            <div class="card shadow mb-4">

              {{-- cart-header --}}
              <div class="card-header py-3">
               <div class="clearfix">
                <span class="float-left"><h6 class="m-0 font-weight-bold text-primary">DANH SÁCH KHÁCH HÀNG</h6></span>
              </div>


            </div>

            {{-- end cart-header --}}


            {{-- cart body --}}
             @if($get_customers->count() > 0)
                <div class="text-left" style="padding:10px 0 5px 35px;" >
                    <button style="padding: 5px 10px;" class="btn btn-danger btn-sm delete_all"
                            data-url="{{ url('admin/xoa-khach-hang') }}">
                        <i class="fa fa-trash-alt"></i>
                    </button>
                </div>
            <div class="card-body" style="padding: 5px;">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th scope="col"><input type="checkbox" id="check_all" value=""></th>

                    <th scope="col">STT</th>

                    <th scope="col">Tên Khách Hàng</th>

                    <th scope="col">SĐT</th>

                    <th scope="col">Địa Chỉ</th>

                    <th scope="col">Ghi Chú</th>


                  </tr>
                </thead>
                <tbody>
                @foreach($get_customers as $key => $get_customer)

                  <tr id="tr_{{ $get_customer->id }}">

                      <td data-label="Chọn">
                          <input type="checkbox" class="sub_check" data-id="{{$get_customer->id}}">
                      </td>

                    <td data-label="STT">{{ ++$key }}</td>

                    <td data-label="Tên Khách Hàng">{{ $get_customer->ho_ten }}</td>

                    <td data-label="SĐT">{{ $get_customer->so_dien_thoai }}</td>

                    <td data-label="Địa Chỉ Khách Hàng">{{ $get_customer->dia_chi }}</td>

                    <td data-label="Ghi Chú Khách Hàng">{{ $get_customer->ghi_chu }}</td>


                  </tr>
                @endforeach
                </tbody>
              </table>
            </div>
            {{-- endcart body --}}
            </div>
            @endif
          {{-- end cart example --}}
        </div>





          <!-- Content Column -->
          <div class="col-lg-12 mb-4">
              <div class="card shadow mb-4">
                  {{-- cart-header --}}
                  <div class="card-header py-3">
                      <div class="clearfix">
                          <span class="float-left"><h6 class="m-0 font-weight-bold text-primary">KHÁCH HÀNG LIÊN HỆ</h6></span>
                      </div>
                  </div>
                  {{-- end cart-header --}}

                  {{-- cart body --}}
                  @php($get_customer_contacts = DB::table('lien_hes')->latest()->get())
                  @if($get_customer_contacts->count() > 0)
                      <div class="card-body" style="padding: 5px;">
                          <table class="table table-bordered">
                              <thead>
                              <tr>
                                  <th scope="col">STT</th>
                                  <th scope="col">Tên Khách Hàng</th>
                                  <th scope="col">SĐT</th>
                                  <th scope="col">Email</th>
                                  <th scope="col">Địa Chỉ</th>
                                  <th scope="col">Ghi Chú</th>
                                  <th scope="col"></th>
                              </tr>
                              </thead>
                              <tbody>
                              @foreach($get_customer_contacts as $key => $customer)
                                  <tr>
                                      <td data-label="STT">{{ ++$key }}</td>
                                      <td data-label="Tên Khách Hàng">{{ $customer->fullname }}</td>
                                      <td data-label="SĐT">{{ $customer->phone }}</td>
                                      <td data-label="Email">{{ $customer->email }}</td>
                                      <td data-label="Địa Chỉ">{{ $customer->address }}</td>
                                      <td data-label="Ghi Chú">{{ $customer->note }}</td>
                                      <td data-label="Chọn">
                                          <a class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc chắn không ?')"
                                            href="{{ url('admin/xoa-khach-hang-lien-he/'.$customer->id) }}">
                                              <i class="fa fa-trash-alt"></i>
                                          </a>
                                      </td>
                                  </tr>
                              @endforeach
                              </tbody>
                          </table>
                      </div>
                  @endif
                  {{-- endcart body --}}
              </div>
          </div>







        <div class="col-lg-12 mb-4">

              <!-- Project Card Example -->
              <div class="card shadow mb-4">

                  {{-- cart-header --}}
                  <div class="card-header py-3">
                      <div class="clearfix">
                          <span class="float-left"><h6 class="m-0 font-weight-bold text-primary">DANH SÁCH THÀNH VIÊN </h6></span>
                      </div>
                  </div>

                  {{-- end cart-header --}}

                  {{-- cart body --}}
                  <div class="card-body" style="padding: 5px;">
                      @if($customer_register->count() > 0)
                          <div class="text-left" style="padding:10px 0 5px 35px;" >
                              <button style="padding: 5px 10px;" class="btn btn-danger btn-sm delete_all"
                                      data-url="{{ url('admin/xoa-thanh-vien') }}">
                                  <i class="fa fa-trash-alt"></i>
                              </button>
                          </div>
                      <table class="table table-bordered">
                          <thead>
                          <tr>
                              <th scope="col"><input type="checkbox" id="check_all_1" value=""></th>

                              <th scope="col">STT</th>

                              <th scope="col">Họ và tên</th>

                              <th scope="col">Tên đăng nhập</th>

                              <th scope="col">Điện thoại</th>

                              <th scope="col">Địa chỉ</th>

                              <th scope="col">Email</th>

                          </tr>
                          </thead>
                          <tbody>
                          @foreach($customer_register as $key => $register)
                          <tr id="tr_{{ $register->id }}">
                              <td data-label="Chọn">
                                  <input type="checkbox" class="sub_check_1" data-id="{{$register->id}}">
                              </td>

                              <td data-label="STT">{{ ++$key }}</td>

                              <td data-label="Họ và tên">{{ $register->ho_ten }}</td>

                              <td data-label="Tên đăng nhập">{{ $register->username }}</td>

                              <td data-label="SĐT">{{ $register->dien_thoai }}</td>

                              <td data-label="Địa chỉ">{{ $register->dia_chi }}</td>

                              <td data-label="Email">{{ $register->email }}</td>


                          </tr>
                          @endforeach
                          </tbody>
                      </table>
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



  @if(session()->has('xoa_khach_hang_lien_he'))
      <script>
          Swal.fire({
              title: "Đã xóa thành công",
              icon: "success",
              timer: 1500,
              showConfirmButton: false,
              position: 'top'
          });
      </script>
  @endif


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
          })

          //Click chọn tất cả các checkbox
          $('#check_all1').on('click', function(e) {
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
                  alert("Vui lòng chọn mục để xóa!!");
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
                                      position: 'top'
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
  <script type="text/javascript">
      $(document).ready(function () {

          //Click chọn tất cả các checkbox
          $('#check_all_1').on('click', function(e) {
              if($(this).is(':checked',true))
              {
                  $(".sub_check_1").prop('checked', true);
              } else {
                  $(".sub_check_1").prop('checked',false);
              }
          })

          //Click chọn tất cả các checkbox
          $('#check_all1').on('click', function(e) {
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
                                      position: 'top'
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



