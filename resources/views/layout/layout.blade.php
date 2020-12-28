<!DOCTYPE html>
<html lang="zxx">
<head>
	<title>@yield('tieu_de')</title>
	<meta charset="UTF-8">
	<link rel="icon" href="{{ url('public/images-icon/9.png') }}" type="image/icon type">
	<meta name="description" content=" Divisima | eCommerce Template">
	<meta name="keywords" content="divisima, eCommerce, creative, html">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Favicon -->
	<link href="img/favicon.ico" rel="shortcut icon"/>

	<!-- Google Font -->
	<link href="https://fonts.googleapis.com/css?family=Playfair+Display&display=swap"
	rel="stylesheet">

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>


	<!-- Stylesheets -->
	<link rel="stylesheet" href="{{ url('public/home/css/bootstrap.min.css') }}"/>
	<link rel="stylesheet" href="{{ url('public/home/css/font-awesome.min.css') }}"/>
	<link rel="stylesheet" href="{{ url('public/home/css/flaticon.css') }}"/>
	<link rel="stylesheet" href="{{ url('public/home/css/slicknav.min.css') }}"/>
	<link rel="stylesheet" href="{{ url('public/home/css/jquery-ui.min.css') }}"/>
	<link rel="stylesheet" href="{{ url('public/home/css/owl.carousel.min.css') }}"/>
	<link rel="stylesheet" href="{{ url('public/home/css/animate.css') }}"/>
	<link rel="stylesheet" href="{{ url('public/home/css/style.css') }}"/>


	<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

</head>
<body style="font-family: 'Playfair Display', serif;">

    <style>
        /* Dropdown Button */
        .dropbtn {
            background-color:#282828;
            color: white;
            padding: 16px;
            font-size: 16px;
            border: none;a

        }

        /* The container <div> - needed to position the dropdown content */
        .dropdown {
            position: relative;
            display: inline-block;
        }

        /* Dropdown Content (Hidden by Default) */
        .dropdown-content {
            display: none;
            position: absolute;
            background-color:  rgba(0,0,0,0.7);
            border-radius: 7px;
            min-width: 150px;
            box-shadow: 0px 8px 8px 0px rgba(0,0,0,0.8);
            z-index: 5;

        }

         /*Links inside the dropdown */
        .dropdown-content a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }

        /* Change color of dropdown links on hover */
        .dropdown-content a:hover {color:#f51851;}

        /* Show the dropdown menu on hover */
        .dropdown:hover .dropdown-content {display: block;}

        /* Change the background color of the dropdown button when the dropdown content is shown */
        .dropdown:hover .dropbtn {color: #f51851;}
    </style>

	<!-- Header section -->

	<header class="header-section">
		<div class="header-top">
			<div class="container">
				<div class="row">
					<div class="col-lg-2 text-center text-lg-left">
						<!-- logo -->
						<a href="{{ url('/') }}" class="site-logo">
							<img src="{{url('public/images-icon/logo.png')}}"
							style="max-width: 100%;height: 40px;">
						</a>
					</div>
					<div class="col-xl-6 col-lg-3">
						<form class="header-search-form"
						action="{{ url('xem-san-pham') }}" method="GET">
							<input type="text" placeholder="Tìm kiếm sản phẩm ..."
							name="txt_search"
							style="font-style:italic;">
							<button><i class="flaticon-search"></i></button>
						</form>
					</div>
					<div class="col-xl-4 col-lg-5">
						<div class="user-panel">
							<div class="up-item">
								<a href="#"></a><a href="#"></a>
							</div>
							<div class="up-item">
								<div class="shopping-card">
									<i class="flaticon-bag"></i>
									<span>
										{{ Session::has('cart') ? count(session('cart')) : '0' }}
									</span>
								</div>
								<a href="{{url('gio-hang')}}">Giỏ Hàng</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<nav class="main-navbar">
			<div class="container">
				<!-- menu -->
				<ul class="main-menu">
					<li><a href="{{url('/')}}">Trang Chủ</a></li>
					<li><a href="{{url('xem-san-pham')}}">Sản Phẩm</a></li>
					<li><a href="{{url('lien-he')}}">Liên Hệ</a></li>
                    @if(!Auth::check())
					<li ><a href="{{url('login')}}">Đăng Nhập</a></li>
					<li ><a href="{{url('dang-ky')}}">Đăng Ký</a></li>
                    @else
                        <li>
                            <div class="dropdown">
                                <button class="dropbtn">{{ Auth::user()->username }}</button>
                                <div class="dropdown-content">
                                    <a href="{{ url('logout') }}">Đăng Xuất</a>
                                </div>
                            </div>
                        </li>
                    @endif
				</ul>
		</nav>
	</header>
	<!-- Header section end -->

{{--======================================================================== banner --}}

	<!-- Hero section -->
	@yield('banner')
	<!-- Hero section end -->

	<!-- Features section -->
	@yield('noidung')

	<!-- Product filter section end -->

	<!-- Footer section -->
	<section class="footer-section">
		<div class="container">
			<div class="footer-logo text-center">
				<a href="index.html"><img src="public/images-icon/logo.png" alt=""></a>
			</div>
			<div class="row">
				<div class="col-lg-3 col-sm-8">
					<div class="footer-widget about-widget">
						<h2>Thông Tin</h2>
						<p>Shop không có chi nhánh</p>
						<img src="img/cards.png" alt="">
					</div>
				</div>
				<div class="col-lg-3 col-sm-6">
					<div class="footer-widget about-widget">
					</div>
				</div>
				<div class="col-lg-3 col-sm-6">
					<div class="footer-widget about-widget">
					</div>
				</div>
				<div class="col-lg-3 col-sm-6">
					<div class="footer-widget contact-widget">
						<h2>Liên Hệ</h2>
						<div class="con-info">
							<span>Store.</span>
							<p>WatchStore</p>
						</div>
						<div class="con-info">
							<span>Address.</span>
							<p>Cần Thơ</p>
						</div>
						<div class="con-info">
							<span>ĐT.</span>
							<p>0123456789</p>
						</div>
						<div class="con-info">
							<span>Email.</span>
							<p>nhantrieuvi@gmail.com</p>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="social-links-warp">

<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
<p class="text-white text-center mt-5">Copyright &copy;<script>document.write(new Date().getFullYear());</script> by WATCHSTORE <i class="fa fa-heart-o" aria-hidden="true"></i> <a href="https://colorlib.com" target="_blank"></a></p>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->

			</div>
		</div>
	</section>
	<!-- Footer section end -->

	<!--====== Javascripts & Jquery ======-->
	<script src="{{url('public/home/js/jquery-3.2.1.min.js')}}"></script>
	<script src="{{url('public/home/js/bootstrap.min.js')}}"></script>
	<script src="{{url('public/home/js/jquery.slicknav.min.js')}}"></script>
	<script src="{{url('public/home/js/owl.carousel.min.js')}}"></script>
	<script src="{{url('public/home/js/jquery.nicescroll.min.js')}}"></script>
	<script src="{{url('public/home/js/jquery.zoom.min.js')}}"></script>
	<script src="{{url('public/home/js/jquery-ui.min.js')}}"></script>
	<script src="{{url('public/home/js/main.js')}}"></script>

    <script>
        toggle between hiding and showing the dropdown content */
        function myFunction() {
            document.getElementById("myDropdown").classList.toggle("show");
        }

        // Close the dropdown menu if the user clicks outside of it
        window.onclick = function(event) {
            if (!event.target.matches('.dropbtn')) {
                var dropdowns = document.getElementsByClassName("dropdown-content");
                var i;
                for (i = 0; i < dropdowns.length; i++) {
                    var openDropdown = dropdowns[i];
                    if (openDropdown.classList.contains('show')) {
                        openDropdown.classList.remove('show');
                    }
                }
            }
        }
    </script>

	</body>
</html>
