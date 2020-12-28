@extends('layout.layout')
@section('tieu_de','Sản phẩm chi tiết')



@section('noidung')

    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

	<script>
	    var msg = '{{Session::get('mes_error')}}';
	    var exist = '{{Session::has('mes_error')}}';
	    if(exist){
	        Swal.fire({
	        position: 'center',
	        icon: 'error',
	        title: 'Bạn chỉ đánh giá sao một lần duy nhất!',
	        showConfirmButton: false,
	        timer: 3000
	      })
	    }
	</script>

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

    <script>
	    var msg = '{{Session::get('rating_star')}}';
	    var exist = '{{Session::has('rating_star')}}';
	    if(exist){
	        Swal.fire({
	        position: 'center',
	        icon: 'success',
	        title: 'Đã đánh giá sao',
	        showConfirmButton: false,
	        timer: 1800
	      })
	    }
	</script>


    <style>
        .starrating > input {display: none;}
        .starrating > label:before {
            content: "\f005";
            margin: 2px;
            font-size: 2.5em;
            font-family: FontAwesome;
            display: inline-block;
        }
        .starrating > label
        {
            color: #222222;
        }
        .starrating > input:checked ~ label
        { color: #ffca08 ; }
        .starrating > input:hover ~ label
        { color: #ffca08 ;  }


        .glyphicon { margin-right:5px;}
        .rating .glyphicon {font-size: 20px;}
        .rating-num { margin-top:0px;font-size: 20px; }
        .progress { margin-bottom: 10px;}
        .progress-bar { text-align: left; }
        .rating-desc .col-md-3 {padding-right: 0px;}
        .sr-only { margin-left: 5px;overflow: visible;clip: auto; }
    </style>


	<!-- product section -->
	<section class="product-section">
		<div class="container">
			<div class="row">
				<div class="col-lg-6">
					<div class="product-pic-zoom">
						<img class="product-big-img"
						src="{{ url('public/image_product/'.$xem_san_phams->hinh_anh) }}">
					</div>
				</div>
				<div class="col-lg-6 product-details">
					<h2 class="p-title">
						{{ $xem_san_phams->ten_san_pham }}
					</h2>
					<h3 class="p-price">
						Giá bán: {{ number_format($xem_san_phams->gia_ban) }} VND
					</h3>
					<div class="quantity">
						<p>Số lượng</p>
                        <div class="pro-qty">
                        	<input type="text" value="1" id="quantity" name="txt_quantity">
                        </div>
                    </div>



                    <!-- ========================================== -->
		              <!-- Nhấp mua ngay sẻ gọi đến hàm (buy_now) bên dưới thực hiện route
		              đường dẫn (buy-now-watch) trong thẻ script -->
		              <button class="site-btn" data-id="{{ $xem_san_phams->id }}"
		              onclick="buy_now({{ $xem_san_phams->id }} + ',' + quantity.value)">
		                <i class="fa fa-shopping-bag" style="color:white;"></i>
		                <b style="color:white;">Mua ngay</b>
		              </button>
		            <!-- ========================================== -->

		            <!-- ========================================== -->
		            <!-- Nhấp vào thêm giỏ hàng thực hiện route đường dẫn (add-cart-buy-now) trong form -->
		              <button style="background-color:green;" class="site-btn"
		              data-id="{{ $xem_san_phams->id }}"
		              onclick="add_cart_buy_now({{ $xem_san_phams->id }} + ',' + quantity.value)">
		                <i class="fa fa-cart-plus"></i>
		                <b>Thêm giỏ hàng</b>
		              </button>
		            <!-- ========================================== -->


					<div id="accordion" class="accordion-area">
						<div class="panel">
							<div class="panel-header" id="headingOne">
								<button class="panel-link active" data-toggle="collapse"
								data-target="#collapse1" aria-expanded="true" aria-controls="collapse1">
									Miêu tả
								</button>
							</div>
							<div id="collapse1" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
								<div class="panel-body">
									<p>{!! $xem_san_phams->mieu_ta !!}</p>
								</div>
							</div>
						</div>
					</div>

                    <div class="panel">
                        <div class="panel-header">
                            <h3 class="panel-link">
                                Đánh giá sao
                            </h3>
                        </div>
                        <div class="panel-body">

                            @if(Auth::check())
                            <form action="{{ url('post-rating-star/'.$xem_san_phams->id) }}" method="post" id="myForm">
                                @csrf
                                <div class="container">
                                    <div class="starrating risingstar d-flex justify-content-center flex-row-reverse">
                                        <input type="radio" id="star5" name="rating" value="5" onclick="Rating()"/><label for="star5" title="5 star">5</label>
                                        <input type="radio" id="star4" name="rating" value="4" onclick="Rating()"/><label for="star4" title="4 star">4</label>
                                        <input type="radio" id="star3" name="rating" value="3" onclick="Rating()"/><label for="star3" title="3 star">3</label>
                                        <input type="radio" id="star2" name="rating" value="2" onclick="Rating()"/><label for="star2" title="2 star">2</label>
                                        <input type="radio" id="star1" name="rating" value="1" onclick="Rating()"/><label for="star1" title="1 star">1</label>
                                    </div>
                                </div>
                            </form>
                            @else
                                <div class="container">
                                    <div class="starrating risingstar d-flex justify-content-center flex-row-reverse">
                                        <input type="radio" id="star5" name="rating" value="5" onclick="report()"/><label for="star5" title="5 star">5</label>
                                        <input type="radio" id="star4" name="rating" value="4" onclick="report()"/><label for="star4" title="4 star">4</label>
                                        <input type="radio" id="star3" name="rating" value="3" onclick="report()"/><label for="star3" title="3 star">3</label>
                                        <input type="radio" id="star2" name="rating" value="2" onclick="report()"/><label for="star2" title="2 star">2</label>
                                        <input type="radio" id="star1" name="rating" value="1" onclick="report()"/><label for="star1" title="1 star">1</label>
                                    </div>
                                </div>
                            @endif

                            <div class="container">
                                <div class="row">
                                    <div class="col-xs-12 col-md-12">
                                        <div class="well well-sm">
                                            <div class="row">
                                                <div class="col-xs-12 col-md-12 text-center">
                                                    <h1 class="rating-num" style="font-size:30px;">
                                                        @php($avg_star = DB::table('danh_gia_saos')->where('id_sp',$xem_san_phams->id)->avg('number_star'))
                                                        {{ round($avg_star,2) }} / 5.0
                                                        <span class="glyphicon glyphicon-star" style="color:orange;"></span>
                                                    </h1>
                                                </div>
                                                <div class="col-xs-12 col-md-6">
                                                    <div class="row rating-desc">
                                                        <div class="col-xs-3 col-md-3 text-right">
                                                            <span class="glyphicon glyphicon-star"></span>5
                                                        </div>
                                                        <div class="col-xs-8 col-md-9">
                                                            <div class="progress progress-striped">
                                                                <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="20"
                                                                     aria-valuemin="0" aria-valuemax="100" style="width: 100%">
                                                                    <span style="text-align: center;">
                                                                        @php($count_star5 = DB::table('danh_gia_saos')->where([['id_sp','=',$xem_san_phams->id],['number_star','=',5]])->count())
                                                                        {{ $count_star5 }} Lượt
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- end 5 -->
                                                        <div class="col-xs-3 col-md-3 text-right">
                                                            <span class="glyphicon glyphicon-star"></span>4
                                                        </div>
                                                        <div class="col-xs-8 col-md-9">
                                                            <div class="progress">
                                                                <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="20"
                                                                     aria-valuemin="0" aria-valuemax="100" style="width: 70%">
                                                                    <span style="text-align: center;">
                                                                        @php($count_star4 = DB::table('danh_gia_saos')->where([['id_sp','=',$xem_san_phams->id],['number_star','=',4]])->count())
                                                                        {{ $count_star4 }} Lượt
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- end 4 -->
                                                        <div class="col-xs-3 col-md-3 text-right">
                                                            <span class="glyphicon glyphicon-star"></span>3
                                                        </div>
                                                        <div class="col-xs-8 col-md-9">
                                                            <div class="progress">
                                                                <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="20"
                                                                     aria-valuemin="0" aria-valuemax="100" style="width: 50%">
                                                                    <span style="text-align: center;">
                                                                        @php($count_star3 = DB::table('danh_gia_saos')->where([['id_sp','=',$xem_san_phams->id],['number_star','=',3]])->count())
                                                                        {{ $count_star3 }} Lượt
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- end 3 -->
                                                        <div class="col-xs-3 col-md-3 text-right">
                                                            <span class="glyphicon glyphicon-star"></span>2
                                                        </div>
                                                        <div class="col-xs-8 col-md-9">
                                                            <div class="progress">
                                                                <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="20"
                                                                     aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                                                                    <span style="text-align: center;">
                                                                        @php($count_star2 = DB::table('danh_gia_saos')->where([['id_sp','=',$xem_san_phams->id],['number_star','=',2]])->count())
                                                                        {{ $count_star2 }} Lượt
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- end 2 -->
                                                        <div class="col-xs-3 col-md-3 text-right">
                                                            <span class="glyphicon glyphicon-star"></span>1
                                                        </div>
                                                        <div class="col-xs-8 col-md-9">
                                                            <div class="progress">
                                                                <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="80"
                                                                     aria-valuemin="0" aria-valuemax="100" style="width: 30%">
                                                                    <span style="text-align: center;">
                                                                        @php($count_star1 = DB::table('danh_gia_saos')->where([['id_sp','=',$xem_san_phams->id],['number_star','=',1]])->count())
                                                                        {{ $count_star1 }} Lượt
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- end 1 -->
                                                    </div>
                                                    <!-- end row -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

				</div>
			</div>
		</div>
	</section>
	<!-- product section end -->


	<!-- RELATED PRODUCTS section -->
	<section class="related-product-section">
		<div class="container">
			<div class="section-title">
				<h2>SẢN PHẨM</h2>
			</div>
			<div class="product-slider owl-carousel">
			@php($get_products = DB::table('san_phams')->latest()->get())
			@foreach($get_products as $data)
				<div class="product-item">
					<div class="pi-pic">
						<a href="{{ url('san-pham-chi-tiet/'.$data->id) }}">
						<img src="{{ url('public/image_product/'.$data->hinh_anh) }}"
						style="max-width:100%;height:300px;">
						</a>
						<div class="pi-links">
							<a href="{{ url('add-to-cart-click/'.$data->id) }}" class="add-card">
								<i class="flaticon-bag"></i>
								<span>Giỏ hàng</span>
							</a>
						</div>
					</div>
					<div class="pi-text">
						<h6>{{ number_format($data->gia_ban) }} VND</h6>
						<p>{{ $data->ten_san_pham }}</p>
					</div>
				</div>
			@endforeach
			</div>
		</div>
	</section>

    <script type="text/javascript">
        function Rating() {
            document.getElementById('myForm').submit();
        }
        function report() {
            alert('Vui lòng đăng nhập để đánh giá sản phẩm!');
        }
    </script>


	<script type="text/javascript">
	    function buy_now(e) {
	        var ele = e.split(",");
	        var watch_id = ele[0];
	        // var quantity = ele[1];
	        //alert(ele);
          	$.ajax({
              	url: '{{ url('buy-now-watch') }}/' + watch_id,
              	type: 'GET',
              	data: { id: ele[0], txt_quatity: ele[1] },
              	success: function (result) {
                  	location.href = '{{ url('thanh-toan-mua-ngay') }}';
              	}
        	});
	    }
	</script>

	<script type="text/javascript">
	    function add_cart_buy_now(e) {
	        var ele = e.split(",");
	        var watch_id = ele[0];
	        // var quantity = ele[1];
	        //alert(ele);
          	$.ajax({
              	url: '{{ url('add-card-buy-now-watch') }}/' + watch_id,
              	type: 'GET',
              	data: { id: ele[0], txt_quatity: ele[1] },
              	success: function (result) {

                  	Swal.fire({
				        position: 'center',
				        icon: 'success',
				        title: 'Đã thêm giỏ hàng',
				        showConfirmButton: false,
				        timer: 2000
				    });
                  	location.reload();
              	}
        	});
	    };
	</script>

@endsection
