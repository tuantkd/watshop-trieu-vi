@extends('layout.layout_admin')
@section('tieu_de', 'Chi Tiết Sản Phẩm')



{{-- ================================================ --}}
@section('content')

<div class="container-fluid">

  <!-- breadcrumb -->
  <ul class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="{{ url('admin/home-admin') }}" style="text-decoration:none;">Bảng điều khiển</a>
    </li>

    <li class="breadcrumb-item">
      <a href="{{ url('admin/danh-sach-san-pham') }}" style="text-decoration:none;">Danh Sách Sản Phẩm</a>
    </li>

    <li class="breadcrumb-item active">Xem chi tiết sản phẩm</li>
  </ul>
  <!-- end-breadcrumb -->


  <!-- Content Row1 -->
  <div class="row">

    <!-- Content Column -->
    <div class="col-lg-12 mb-4">

      
      <!-- Project Card Example -->
      <div class="card shadow mb-4">

        {{-- cart-header --}}
        <div class="card-header py-3">
        	<div class="clearfix">
			      <span class="float-left">
              <h6 class="m-0 font-weight-bold text-primary">CHI TIẾT SẢN PHẨM</h6>
            </span>
	        </div>
        </div>
        {{-- end cart-header --}}


        {{-- cart body --}}
        <div class="card-body" style="padding: 5px;">
          <div class="row">
            <div class="col-12 col-sm-12 col-md-4 col-lg-4">
              <img src="{{ url('public/image_product/'.$xem_chi_tiet->hinh_anh) }}" class="img-fluid">
            </div>

            <div class="col-12 col-sm-12 col-md-8 col-lg-8">
              <ul class="list-group list-group-flush">
                <li class="list-group-item">
                  <h2>
                  {{ $xem_chi_tiet->ten_san_pham }}
                  </h2>
                </li>
                <li class="list-group-item">
                  Loại: &nbsp;
                  <b>
                    @php($lay_ten = DB::table('loai_san_phams')
                    ->where('id',$xem_chi_tiet->id_loai_sp)->get())
                    @foreach($lay_ten as $value)
                      {{ $value->ten_loai_sp }}
                    @endforeach
                  </b>
                </li>
                <li class="list-group-item">
                  Giá nhập:&nbsp;<b>{{ number_format($xem_chi_tiet->gia_nhap) }}</b> VND
                </li>
                <li class="list-group-item">
                  Giá Bán:&nbsp;<b>{{ number_format($xem_chi_tiet->gia_ban) }}</b> VND
                </li>
                <li class="list-group-item">
                  Số Lượng:&nbsp;<b>{{ number_format($xem_chi_tiet->so_luong) }}</b> 
                </li>
                <li class="list-group-item">
                  Xuất xứ:&nbsp;
                  <b>
                    @php($lay_ten = DB::table('xuat_xus')
                    ->where('id',$xem_chi_tiet->id_xuat_xu)->get())
                    @foreach($lay_ten as $value)
                      {{ $value->xuat_xu }}
                    @endforeach
                  </b>
                </li>
                <li class="list-group-item">
                  Mô Tả:&nbsp; <br>
                  <b>{!! $xem_chi_tiet->mieu_ta !!}</b>
                </li>

              </ul>
            </div>
          </div>

        </div>
        {{-- endcart body --}}
      </div>

      {{-- end cart example --}}
    </div>

    {{-- end contentcolum --}}
  </div>
    {{-- end content row1 --}}
</div>


@endsection



