@extends('layout.layout')
@section('tieu_de','Trang Chủ')


@section('banner')

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



	<section class="hero-section">
		<div class="hero-slider owl-carousel">
			@php($lay_bang_chuyen = DB::table('slide_banners')->latest()->take(1)->get())
			@foreach($lay_bang_chuyen as $banner)
			<div class="hs-item set-bg" data-setbg="{{ url('public/image_slide_product/'.$banner->hinh_anh_slide) }}">
			@endforeach
		</div>
	</section>

@endsection


@section('noidung')
<section class="features-section">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-4 p-0 feature">
					<div class="feature-inner">
						<div class="feature-icon">
							<img src="public/home/img/icons/1.png" alt="#">
						</div>
						<h2>Thanh Toán An Toàn</h2>
					</div>
				</div>
				<div class="col-md-4 p-0 feature">
					<div class="feature-inner">
						<div class="feature-icon">
							<img src="public/home/img/icons/2.png" alt="#">
						</div>
						<h2>Sản Phẩm</h2>
					</div>
				</div>
				<div class="col-md-4 p-0 feature">
					<div class="feature-inner">
						<div class="feature-icon">
							<img src="public/home/img/icons/3.png" alt="#">
						</div>
						<h2>Giao Hàng Nhanh Chống & Miễn Phí</h2>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Features section end -->


	<!-- letest product section -->
	<section class="top-letest-product-section">
		<div class="container">
			<div class="section-title">
				<h2>Sản Phẩm Mới Nhất</h2>
			</div>
			<div class="product-slider owl-carousel" >
			@php($get_san_pham = DB::table('san_phams')->latest()->get())
			@foreach($get_san_pham as $sp)
				<div class="product-item" style="border: 1px solid #E6E6E6; padding: 10px 10px 0 10px;">
					<div class="pi-pic">
						<a href="{{ url('san-pham-chi-tiet/'.$sp->id) }}">
						<img src="{{ url('public/image_product/'.$sp->hinh_anh) }}"
						style="max-width:100%;height:300px;">
						</a>
						<div class="pi-links">
							<a href="{{ url('add-to-cart-click/'.$sp->id) }}" class="add-card">
								<i class="flaticon-bag"></i><span>Giỏ hàng</span>
							</a>
						</div>
					</div>
					<div class="pi-text">
						<h6>{{ number_format($sp->gia_ban) }} VND</h6>
						<p>{{ $sp->ten_san_pham }}</p>
					</div>
				</div>
			@endforeach
			</div>
		</div>
	</section>
	<!-- letest product section end -->



	<!-- Product filter section -->
	<section class="product-filter-section">
		<div class="container">
			<div class="section-title">
				<h2>Sản Phẩm</h2>
			</div>
			<ul class="product-filter-menu">
				@foreach($lay_loais as $loai)
				<li>
					<a href="{{ url('xem-san-pham-loai/'.$loai->id) }}">
						{{ $loai->ten_loai_sp }}
					</a>
				</li>
				@endforeach
			</ul>

			<div class="row">
			@foreach($lay_san_phams as $data)
				<div class="col-lg-3 col-sm-6" style="padding-bottom: 20px;">
					<div class="product-item" style="border: 1px solid #E6E6E6; padding: 10px 10px 0 10px;">
						<div class="pi-pic">
							<a href="{{ url('san-pham-chi-tiet/'.$data->id) }}">
							<img src="{{ url('public/image_product/'.$data->hinh_anh) }}"
							style="max-width:100%;height:300px;">
							</a>
							<div class="pi-links">
								<a href="{{ url('add-to-cart-click/'.$data->id) }}" class="add-card">
									<i class="flaticon-bag"></i><span>Giỏ hàng</span>
								</a>
							</div>
						</div>
						<div class="pi-text">
							<h6>{{ number_format($data->gia_ban) }} VND</h6>
							<p>{{ $data->ten_san_pham }}</p>
						</div>
					</div>
				</div>
			@endforeach
			</div>



			<div class="text-center pt-5">
				<a class="site-btn sb-line sb-dark" href="{{ url('xem-san-pham') }}" role="button">
					Xem Thêm . . .
				</a>
			</div>
		</div>
	</section>


@endsection
