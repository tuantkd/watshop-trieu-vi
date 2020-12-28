@extends('layout.layout_admin')
@section('tieu_de', 'Chi Tiết Hóa Đơn')

{{-- ================================================ --}}
@section('content')
<!--
  model thêm nhân viên
---------------------------------------- -->
  <div class="container-fluid">
    <!-- breadcrumb -->
    <ul class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="{{ url('admin/home-admin') }}" style="text-decoration:none;">Bảng điều khiển</a>
      </li>

      <li class="breadcrumb-item">
        <a href="{{ url('admin/quan-ly-hoa-don') }}" style="text-decoration:none;">Quản Lý Hóa Đơn</a>
      </li>
      <li class="breadcrumb-item active">Chi Tiết Hóa Đơn</li>
    </ul>
    <!-- end-breadcrumb -->


    <div class="row">
      <!-- Content Column -->
      <div class="col-lg-2 mb-4"></div>
      <div class="col-lg-8 mb-4">

        <!-- Project Card Example -->
        <div class="card shadow mb-4">

          {{-- cart-header --}}
          <div class="card-header py-3">
            <div class="clearfix">
               <span class="float-left">
                <h6 class="m-0 font-weight-bold text-primary">CHI TIẾT HÓA ĐƠN</h6></span>
            </div>
          </div>
          {{-- end cart-header --}}

          {{-- cart body --}}
          <div class="card-body" style="padding:20px;">

            <div class="row">
              <div class="col-12 col-sm-12 col-md-6 col-lg-6 text-left">
                <div class="d-flex justify-content">
                  <div class="p-2">Mã hóa đơn:</div>
                  <div class="p-2"><b>{{ $lay_hoa_dons->id }}</b></div>
                </div>
              </div>

              <div class="col-12 col-sm-12 col-md-6 col-lg-6 text-right">
                <div class="d-flex justify-content">
                  <div class="p-2">Ngày tạo:</div>
                  <div class="p-2"><b>{{ date('d/m/Y', strtotime($lay_hoa_dons->created_at)) }}</b></div>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-12 col-sm-12 col-md-6 col-lg-6 text-right">
                <div class="d-flex justify-content">
                  <div class="p-2">Ngày giao hàng:</div>
                  <div class="p-2"><b>{{ $lay_hoa_dons->ngay_giao_hang }}</b></div>
                </div>
              </div>
              <div class="col-12 col-sm-12 col-md-6 col-lg-6 text-right">
                <div class="d-flex justify-content">
                  <div class="p-2">Khách hàng:</div>
                  <div class="p-2"><b>
                    @php($khs = DB::table('khach_hangs')
                    ->where('id',$lay_hoa_dons->id_khach_hang)->get())
                    @foreach($khs as $kh)
                      {{ $kh->ho_ten }}
                    @endforeach
                  </b></div>
                </div>
              </div>
            </div>

            <div class="table-responsive">
              <table class="table table-bordered" align="center">
                <thead>
                  <tr>
                    <th scope="col">STT</th>
                    <th scope="col">Tên sản phẩm</th>
                    <th scope="col">Hình ảnh</th>
                    <th scope="col">Giá</th>
                    <th scope="col">Số lượng</th>
                    <th scope="col">Tổng tiền</th>
                  </tr>
                </thead>
                <tbody>

                @php($hoa_don_chi_tiets = DB::table('hoa_don_chi_tiets')
                ->where('id_hoa_don',$lay_hoa_dons->id)->get())

                <?php $tong_thanh_toan = 0; ?>
                @foreach($hoa_don_chi_tiets as $key => $hoa_don_chi_tiet)

                <?php $tong_thanh_toan = $tong_thanh_toan + $hoa_don_chi_tiet->tong_gia; ?>

                @php($san_phams = DB::table('san_phams')
                ->where('id',$hoa_don_chi_tiet->id_san_pham)->get())
                @foreach($san_phams as $san_pham)

                  <tr>
                    <td data-label="STT">
                      {{ ++$key }}
                    </td>

                    <td data-label="Tên sản phẩm">
                      <b>{{ $san_pham->ten_san_pham }}</b>
                    </td>

                    <td data-label="Hình ảnh">
                      ​<img src="{{ url('public/image_product/'.$san_pham->hinh_anh) }}"
                      style="max-width:100%;height:100px;">
                    </td>

                    <td data-label="Giá">{{ number_format($san_pham->gia_ban) }} VND</td>

                    <td data-label="Số Lượng">
                      {{ $hoa_don_chi_tiet->tong_so_luong }}
                    </td>

                    <td data-label="Tổng Tiền">
                      {{ number_format($hoa_don_chi_tiet->tong_gia) }} VND
                    </td>

                    </tr>

                  @endforeach
                  @endforeach

                </tbody>
              </table>
            </div>

                <div class="text-right">
                  <button type="button" class="btn btn-secondary">
                    Tổng thanh toán: <b>{{ number_format($tong_thanh_toan) }} VND</b>
                  </button>
                </div>
                <br>
                <div class="text-right">
                    <a class="btn btn-success" href='{{ url('admin/hoa-don-dien-tu/'.$lay_hoa_dons->id) }}'>
                        <i class="fas fa-file-export"></i> Xuất hóa đơn
                    </a>
                 </div>

          </div>
          {{-- endcart body --}}

        </div>
        <!-- card shadow mb-4 -->
      </div>
      <!-- col-lg-8 -->
      <div class="col-lg-2 mb-4"></div>

    </div>
    <!-- END_ROW -->
  </div>

  <script>
    CKEDITOR.replace( 'txt-mieu-ta' );
  </script>

@endsection



