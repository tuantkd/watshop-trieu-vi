@extends('layout.layout')
@section('tieu_de','Chi tiết đơn hàng')

<!-- ==================================================== -->
@section('noidung')

<div class="page-top-info">

	<script>
	    var msg = '{{Session::get('alert')}}';
	    var exist = '{{Session::has('alert')}}';
	    if(exist){
	        Swal.fire({
	        position: 'center',
	        icon: 'success',
	        title: 'Đã đặt hàng thành công',
	        showConfirmButton: false,
	        timer: 1800
	      })
	    }
	</script>

	<!-- checkout section  -->
	<section class="checkout-section spad">
		<div class="container">
			<div class="row">
				<!-- ================================================ -->
				
				@foreach($get_hoa_don_ct_cart as $get_hoa_don_ct)
				@if($loop->first)

				@php($get_hoa_dons = DB::table('hoa_dons')
				->where('id',$get_hoa_don_ct->id_hoa_don)->get())

				@foreach($get_hoa_dons as $get_hoa_don)
				@php($get_khachs = DB::table('khach_hangs')
				->where('id',$get_hoa_don->id_khach_hang)->get())
				@foreach($get_khachs as $get_khach)

				<div class="col-lg-6 order-1 order-lg-2">
					<div class="checkout-cart">
						<h3>Thông tin khách hàng</h3>
						<ul class="price-list">
							<li class="total">
								Họ và tên:  {{ $get_khach->ho_ten }}
							</li>
							<li class="total">
								Điện thoại: 0{{ $get_khach->so_dien_thoai }}
							</li>
							<li class="total">
								Địa chỉ nhận hàng: {{ $get_khach->dia_chi }}
							</li>
						</ul>
					</div><hr>

					<a class="site-btn submit-order-btn btn-block" 
					href="{{ url('/') }}" role="button">
						HOÀN THÀNH
					</a>
				</div>

				@endforeach
				@endforeach

				@endif
				@endforeach
				<!-- ================================================ -->



				<!-- ================================================ -->
				
				

				<div class="col-lg-6 order-1 order-lg-2">
					<div class="checkout-cart">
					<h3>Chi tiết sản phẩm</h3>

					@foreach($get_hoa_don_ct_cart as $get_hoa_don_ct)
					@php($get_san_phams = DB::table('san_phams')
					->where('id',$get_hoa_don_ct->id_san_pham)->get())

					@foreach($get_san_phams as $get_san_pham)

					<ul class="product-list">
						<li>
							<div class="pl-thumb">
							<img src="{{ url('public/image_product/'.$get_san_pham->hinh_anh) }}">
							</div>
							<h6>{{ $get_san_pham->ten_san_pham }}</h6>
							<p>Giá: {{ number_format($get_san_pham->gia_ban) }} VND</p>
							<p>Số lượng: {{ $get_hoa_don_ct->tong_so_luong }}</p>
						</li>
					</ul>

					@endforeach
					@endforeach
					<ul class="price-list">
						@php($tong_gia = DB::table('hoa_don_chi_tiets')->sum('tong_gia'))
						<li>Tổng Cộng:  {{ number_format($tong_gia) }} VND</li>
						<li>Giao Hàng Miễn Phí</li>
						<li class="total">
							Phải Thanh Toán:  
							{{ number_format($tong_gia) }} VND
						</li>
					</ul>
					</div>
				</div>

				
				
				<!-- ================================================ -->
			</div>
		</div>
	</section>

@endsection