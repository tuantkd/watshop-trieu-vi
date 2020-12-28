@extends('layout.layout')
@section('tieu_de','Sản Phẩm')


<!-- =================================================================== -->
@section('noidung')

<div class="page-top-info">

	
	<!-- Category section -->
	<section class="category-section spad">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 order-2 order-lg-1">
					<div class="filter-widget">
						<h2 class="fw-title">Loại Sản Phẩm</h2>
						<ul class="category-menu">
						@foreach($loais as $loai)
							<li>
								<a href="{{ url('xem-san-pham-loai/'.$loai->id) }}">
									{{ $loai->ten_loai_sp }}
								</a>
							</li>
						@endforeach
						</ul>
					</div>
					
				</div>

				<div class="col-lg-9  order-1 order-lg-2 mb-5 mb-lg-0">

					<div class="row">

						@yield('xem_tat_ca_va_san_pham_loai')
						
					</div>

				</div>
			</div>
		</div>
	</section>


@endsection