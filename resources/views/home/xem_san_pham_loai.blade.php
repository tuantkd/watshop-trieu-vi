@extends('home.layout_sanpham')

@section('xem_tat_ca_va_san_pham_loai')

	@foreach($san_pham_loais as $san_pham)

	<div class="col-lg-4 col-sm-6">
		<div class="product-item">
			<div class="pi-pic">
				<a href="{{ url('san-pham-chi-tiet/'.$san_pham->id) }}">
				<img src="{{ url('public/image_product/'.$san_pham->hinh_anh) }}"
				style="max-width:100%;height:300px;">
				</a>
				<div class="pi-links">
					<a href="#" class="add-card"><i class="flaticon-bag"></i><span>Giỏ hàng</span></a>
				</div>
			</div>
			<div class="pi-text">
				<h6>{{ number_format($san_pham->gia_ban) }}</h6>
				<p>{{ $san_pham->ten_san_pham }}</p>
			</div>
		</div>
	</div>

	@endforeach

	<div class="text-center w-100 pt-3">
		<!-- phân trang số thứ tự -->
        {{ $san_pham_loais->links( "pagination::bootstrap-4") }}
        <!-- phân trang số thứ tự -->
	</div>

@endsection