<!DOCTYPE html>
<html lang="en">
<head>
	<title>Đăng Nhập</title>
	<link rel="icon" href="{{ url('public/images-icon/logo1.png') }}" type="image/icon type">
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="{{ url('public/dang_nhap/images/icons/favicon.ico') }}"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ url('public/dang_nhap/vendor/bootstrap/css/bootstrap.min.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ url('public/dang_nhap/fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ url('public/dang_nhap/fonts/Linearicons-Free-v1.0.0/icon-font.min.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ url('public/dang_nhap/vendor/animate/animate.css') }}">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="{{ url('public/dang_nhap/vendor/css-hamburgers/hamburgers.min.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ url('public/dang_nhap/vendor/select2/select2.min.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ url('public/dang_nhap/css/util.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ url('public/dang_nhap/css/main.css') }}">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100" style="background-image: url('images/img-01.jpg');">
			<div class="wrap-login100 p-t-190 p-b-30" style="padding-top:1px;">

				<form class="login100-form validate-form" action="{{url('post-dang-nhap')}}" method="POST">
					{{ csrf_field() }}

					<div class="login100-form-avatar">
						<img src="{{url('public/images-icon/9.png')}}" alt="AVATAR">
					</div>

					<span class="login100-form-title p-t-20 p-b-45" style="color:#FFCC33;">
						WATCH_STORE
					</span>

					@if(session()->has('message'))
                      <div class="alert alert-success">
                          {{ session()->get('message') }}
                      </div>
                  	@endif

					<div class="wrap-input100 validate-input m-b-10" 
					data-validate = "Chưa nhập tên tài khoản">
						<input class="input100" type="text" name="txt_ten_tai_khoan" placeholder="nhập tên tài khoản">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-user"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input m-b-10" 
					data-validate = "Chưa nhập mật khẩu">
						<input class="input100" type="password" name="txt_mat_khau" placeholder="nhập mật khẩu">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock"></i>
						</span>
					</div>

					<div class="container-login100-form-btn p-t-10">
						<button class="login100-form-btn" 
						style="background-color: #FFCC33 ; color: #3366CC">
							<b style="color:white;">Đăng Nhập</b>
						</button>
					</div>

				
				</form>
			</div>
		</div>
	</div>
	
	

	
<!--===============================================================================================-->	
	<script src="{{url('public/dang_nhap/vendor/jquery/jquery-3.2.1.min.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{url('public/dang_nhap/vendor/bootstrap/js/popper.js')}}"></script>
	<script src="{{url('public/dang_nhap/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{url('public/dang_nhap/vendor/select2/select2.min.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{url('public/dang_nhap/js/main.js')}}"></script>

</body>
</html>