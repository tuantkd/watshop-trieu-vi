@extends('layout.layout')
@section('tieu_de','Giỏ Hàng')


@section('noidung')

	<!-- cart section end -->
	<section class="cart-section spad">
		<div class="container">
			<div class="row">
				@if(session('cart'))

				<div class="col-lg-8">
					<div class="cart-table">
						<h3>Giỏ Hàng Của Bạn</h3>
						<div class="cart-table-warp">
							<table>
							<thead>
								<tr>
									<th class="product-th">Sản Phẩm</th>
									<th class="quy-th">Số Lượng</th>
									<th class="total-th">Giá</th>
									<th class="total-th">Tùy chọn</th>
								</tr>
							</thead>
							<tbody>

							<?php $total = 0; $i=1; ?>
			                @foreach(session('cart') as $id => $data)

			                <?php $total = $total + $data['gia_ban'] * $data['so_luong'] ?>
			                <?php $totalprice = $data['gia_ban'] * $data['so_luong'] ?>

								<tr>
									<td class="product-col">
										<img src="{{ url('public/image_product/'.$data['hinh_anh']) }}">
										<div class="pc-title">
											<p>{{ $data['ten_san_pham'] }}</p>
											<p>{{ number_format($data['gia_ban']) }} VND</p>
										</div>
									</td>
									<td>
										<input type="number" value="{{ $data['so_luong'] }}"
										onchange="update_cart({{ $id }} + ',' + this.value)"
										style="width:55px;border-radius:5px;border:1px solid gray;
										padding-left:10px;padding-bottom:5px;">
									</td>
									
									<td class="total-col">
										<h4>{{ number_format($totalprice) }} VND</h4>
									</td>

									<td class="total-col ">
										<button class="remove-from-cart" data-id="{{ $id }}"
										style="border-radius:5px;">
					                        <i class="fa fa-trash" 
					                        style="color:red;font-size:20px;"></i> 
				                      	</button>
									</td>
								</tr>

							@endforeach
								
							</tbody>
						</table>
						</div>
						<div class="total-cost">
							<h6>Tổng thanh toán: <span>{{ number_format($total) }} VND</span></h6>
						</div>
					</div>
				</div>

				<div class="col-lg-4 card-right">
					<a href="{{url('thanh-toan-gio-hang')}}" class="site-btn">Tiến Hành Đặt Hàng</a>
					<a href="{{url('xem-san-pham')}}" class="site-btn sb-dark">Tiếp Tục Mua Hàng</a>
				</div>

				@else
				<div class="container">
					<div class="row">
						<div class="col-lg-12">
							<div class="cart-table" style="text-align:center;padding-bottom:35px;">
								<h2 style="color:#FF3333">Giỏ hàng của bạn không có sản phẩm</h2>
							</div>
						</div>
					</div>
				</div>
				@endif

			</div>
		</div>
	</section>
	<!-- cart section end -->

	<!-- Related product section -->


	<script type="text/javascript">
      $(".remove-from-cart").click(function (e) {

          e.preventDefault();

          var ele = $(this);

          if(confirm("Bạn có chắc chắn xóa?")) {

              $.ajax({
                  url: '{{ url('remove-cart') }}',
                  method: "DELETE",
                  data: {_token: '{{ csrf_token() }}',
                  id: ele.attr("data-id")},
                  success: function (response) {
                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'Đã xóa sản phẩm',
                        showConfirmButton: false,
                        timer: 2000
                    });
                    window.setTimeout(function(){ 
                        location.reload();
                    } ,1000);
                  }
              });
          }
      });
    </script>



    <script type="text/javascript">
	    function update_cart(e) {
	        var ele = e.split(",");
	        //alert(ele);
	        $.ajax({
	           url: '{{ url('update-cart') }}',
	           method: "patch",
	           data: {_token: '{{ csrf_token() }}',
	           id: ele[0],
	           quantity: ele[1]},
	           success: function (response) {
	              Swal.fire({
	                  position: 'center',
	                  icon: 'success',
	                  title: 'Đã cập nhật số lượng',
	                  showConfirmButton: false,
	                  timer: 2000
	              });
	              window.setTimeout(function(){ 
	                  location.reload();
	              } ,1000);
	           }
	        });
	    }
	</script>
	

@endsection