@extends('home.layout_sanpham')

@section('xem_tat_ca_va_san_pham_loai')

	<script>
	    var msg = '{{Session::get('alert1')}}';
	    var exist = '{{Session::has('alert1')}}';
	    if(exist){
	        Swal.fire({
	        position: 'center',
	        icon: 'success',
	        title: 'Đã thêm giỏ hàng',
	        showConfirmButton: false,
	        timer: 1800
	      })
	    }
	</script>

	<script>
	    var msg = '{{Session::get('alert2')}}';
	    var exist = '{{Session::has('alert2')}}';
	    if(exist){
	        Swal.fire({
	        position: 'center',
	        icon: 'success',
	        title: 'Đã thêm giỏ hàng',
	        showConfirmButton: false,
	        timer: 1800
	      })
	    }
	</script>

	<script>
	    var msg = '{{Session::get('alert3')}}';
	    var exist = '{{Session::has('alert3')}}';
	    if(exist){
	        Swal.fire({
	        position: 'center',
	        icon: 'success',
	        title: 'Đã thêm giỏ hàng',
	        showConfirmButton: false,
	        timer: 1800
	      })
	    }
	</script>



	@foreach($san_phams as $san_pham)

	<div class="col-lg-4 col-sm-6" style="padding-bottom: 20px">
		<div class="product-item" style="border: 1px solid #E6E6E6; padding: 10px;">
			<div class="pi-pic">
				<a href="{{ url('san-pham-chi-tiet/'.$san_pham->id) }}">
				<img src="{{ url('public/image_product/'.$san_pham->hinh_anh) }}"
				style="max-width:100%;height:250px;">
				</a>
				<div class="pi-links">
					<a href="{{ url('add-to-cart-click/'.$san_pham->id) }}" class="add-card">
						<i class="flaticon-bag"></i><span>Giỏ hàng</span></a>
				</div>
			</div>
			<div class="pi-text">
				<h6
                    style="padding-bottom: 20px;"
                >{{ number_format($san_pham->gia_ban) }} VND</h6>
				<p>{{ $san_pham->ten_san_pham }}</p>
			</div>
		</div>
	</div>

	@endforeach

	<div class="text-center w-100 pt-3">
		<!-- phân trang số thứ tự -->
        {{ $san_phams->links( "pagination::bootstrap-4") }}
        <!-- phân trang số thứ tự -->
	</div>


    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v8.0" nonce="jEQ7RCIb"></script>

    <div class="fb-comments" data-href="http://localhost/watchshop/xem-san-pham" data-numposts="5" data-width=""></div>
@endsection
