@extends('layout.layout')
@section('tieu_de','Thanh Toán Mua Ngay')


@section('noidung')

<div class="page-top-info">

	<!-- checkout section  -->
	<section class="checkout-section spad">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 order-2 order-lg-1">
					<form action="{{ url('post-thanh-toan-mua-ngay') }}"
					class="checkout-form" method="POST">
						{{ csrf_field() }}
						<div class="cf-title">Địa Chỉ Thanh Toán</div>
						<div class="row">
							<div class="col-md-7">
								<p>*Thông Tin Thanh Toán</p>
							</div>
						</div>
						<div class="row address-inputs">
							<div class="col-md-6">
								<input type="text" placeholder="Họ Và Tên"
								style="border-radius:30px;background-color:#d9d9d9;" name="txt_ho_ten">

								<p style="color:red;font-style:italic;">
			                      {{ $errors->first('txt_ho_ten') }}
			                    </p>

							</div>

							<div class="col-md-6">
								<input type="text" placeholder="Số điện thoại"
								style="border-radius:30px;background-color:#d9d9d9;" name="txt_sdt" id="mobile" onblur="kiem_tra();">
								<p style="color:red;font-style:italic;">
			                      {{ $errors->first('txt_sdt') }}
			                    </p>
							</div>

                            <div class="col-md-6">
                                <input type="text" placeholder="Địa chỉ email"
                                       style="border-radius:30px;background-color:#d9d9d9;" name="txt_email">

                                <p style="color:red;font-style:italic;">
                                    {{ $errors->first('txt_email') }}
                                </p>
                            </div>

                            <div class="col-md-6">
                                <input type="text" placeholder="Ngày giao Hàng"
                                       style="border-radius:30px;background-color:#d9d9d9;" name="txt_ngay_nhan_hang">

                                <p style="color:red;font-style:italic;">
                                    {{ $errors->first('txt_ngay_nhan_hang') }}
                                </p>
                            </div>

							<div class="col-md-12">
								<input type="text" placeholder="Địa chỉ"
								style="border-radius:30px;background-color:#d9d9d9;"
								name="txt_dia_chi">

								<p style="color:red;font-style:italic;">
			                      {{ $errors->first('txt_dia_chi') }}
			                    </p>
							</div>

							<div class="col-md-12">
								<textarea class="form-control" rows="3"
								placeholder="Nhập ghi chú"
								style="border-radius:30px;background-color:#d9d9d9;"
								name="txt_ghi_chu"></textarea>

								<p style="color:red;font-style:italic;">
			                      {{ $errors->first('txt_ghi_chu') }}
			                    </p>
							</div>

						</div>
						<ul class="payment-list">
							<li>Thanh toán khi nhận được sản phẩm</li>
						</ul>
						<button class="site-btn submit-order-btn btn-block" type="submit">
							ĐẶT HÀNG
						</button>
					</form>
				</div>
				<div class="col-lg-4 order-1 order-lg-2">
					<div class="checkout-cart">
						<h3>Giỏ hàng của bạn</h3>

					@if(session('buy_now'))
	                <?php $total = 0; ?>

	                @foreach(session('buy_now') as $id => $data)
	                @if($loop->last)
					<?php $tong_gia = $data['gia_ban'] * $data['so_luong']; ?>

						<ul class="product-list">
							<li>
								<div class="pl-thumb">
									<img src="{{ url('public/image_product/'.$data['hinh_anh']) }}">
								</div>
								<h6>{{ $data['ten_san_pham'] }}</h6>
								<p>Giá: {{ number_format($data['gia_ban']) }} VND</p>
								<p>Số lượng: {{ $data['so_luong'] }}</p>
							</li>
						</ul>
						<ul class="price-list">
							<li>Tổng Cộng:  {{ number_format($tong_gia) }} VND</li>
							<li>Giao Hàng Miễn Phí</li>
							<li class="total">
								Phải Thanh Toán:
								{{ number_format($tong_gia) }} VND
							</li>
						</ul>

					@endif
					@endforeach
					@endif

					</div>
				</div>
			</div>
		</div>
	</section>


    <script type="text/javascript">
        function kiem_tra() {
            var vnf_regex = /((09|03|07|08|05)+([0-9]{8})\b)/g;
            var mobile = $('#mobile').val();
            if(mobile !==''){
                if (vnf_regex.test(mobile) == false)
                {
                    alert('Số điện thoại của bạn không đúng định dạng!');
                    document.forms["myForm"]["txt_sdt"].value = "";
                    document.getElementById("mobile").focus();
                }else{
                    return true;
                }
            }
        }
    </script>


	@endsection
