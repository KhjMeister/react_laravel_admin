<!doctype html>
<html dir="rtl" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link  href="{{ asset('rv/img/favicon2.gif') }}" type="image/png" rel="icon">

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'ویدیو رایان') }}</title>

    <link href="{{ asset('landing/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
	<link href="{{ asset('landing/plugins/font-awsome/css/font-awesome.min.css') }}" rel="stylesheet">
	<link href="{{ asset('landing/plugins/magnific-popup/magnific-popup.css') }}" rel="stylesheet">
	<link href="{{ asset('landing/plugins/slick/slick.css') }}" rel="stylesheet">
	<link href="{{ asset('landing/plugins/slick/slick-theme.css') }}" rel="stylesheet">
	<link href="{{ asset('landing/css/style.css') }}" rel="stylesheet">
	<link rel="stylesheet" href="{{ asset('landing/css/indexrayan.css') }}">


    @livewireStyles
        
</head>
<body class="body-wrapper" style="direction: rtl"  data-spy="scroll" data-target=".navbar" data-offset="50">

<!--========================================
=            Navigation Section            =
=========================================-->

<nav class="navbar main-nav border-less fixed-top navbar-expand-lg p-0">
  <div class="container-fluid p-0">
      <!-- logo -->
      <a class="navbar-brand a_logo" href="#">
        <img src="{{ asset('landing/images/log.png') }}" class="logo" alt="ویدیو رایانُ">
		  <p class="text-logo">ویدیو رایان</p>
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="fa fa-bars"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav mx-auto p-0 menu-rayan">
        <li class="nav-item dropdown active dropdown-slide">
          <a class="nav-link" href="{{route('videorayan')}}">خانه
            <span></span>
          </a>
          <!-- Dropdown list -->
        </li>
        <li class="nav-item">
			<a class="nav-link" href="{{ route('aboutus')}}">درباره ما
            <span></span>
			</a>
        </li>
        <li class="nav-item dropdown dropdown-slide">
          <a class="nav-link" href="#tarefeh">تعرفه<span></span></a>
        </li>


		  <li class="nav-item">
			  <a class="nav-link" href="{{ route('contactus')}}">ارتباط باما<span></span></a>
		  </li>

      </ul>
		  <a href="{{ route('login')}}" class=" ticket mr-0 mr-lg-5">
			  <span class="fa fa-user text-white iransans"></span>
			  <p class="p-share">ورود / عضویت </p>
		  </a>

      </div>
  </div>
</nav>

<!--====  End of Navigation Section  ====-->



<!--============================
=            Banner            =
=============================-->

    @yield('content')

<!--============================
=            Footer            =
=============================-->

<footer class="footer-main">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="block text-center">
            <div class="footer-logo text-right">
				<img src="images/log.png" class="logo mb-0" alt="ویدیو رایانُ">
				<p class="p-video">ویدیو رایان</p>
            </div>
			  <div class="col-12 mt-3">
				  <div class="row">
			  <ul class="list-group col-lg-3 col-md-6 ul-footer">
				  <p class="title-footer text-white font-16">دسترسی سریع</p>
				  <li class="list-group-item"><a href="">خانه</a></li>
				  <li class="list-group-item"><a href="">درباره ما</a></li>
				  <li class="list-group-item"><a href="">ارتباط با ما</a></li>
			  </ul>
			  <ul class="list-group col-lg-3 col-md-6 ul-footer">
				  <p class="title-footer text-white font-16">خدمات</p>
				  <li class="list-group-item"><a href="">ارتباط با پشتیبان</a></li>
				  <li class="list-group-item"><a href="">راهنما</a></li>
			  </ul>
					  <ul class="social-links-footer col-md-6 list-inline text-right  col-lg-3 mb-2">
						  <p class="title-footer text-white font-16  mb-4">مارا دنبال کنید</p>
						  <li class="list-inline-item mr-0">
							  <a href="#"><i class="fa fa-facebook"></i></a>
						  </li>
						  <li class="list-inline-item">
							  <a href="#"><i class="fa fa-twitter"></i></a>
						  </li>
						  <li class="list-inline-item mr-3">
							  <a href="#"><i class="fa fa-instagram"></i></a>
						  </li>
					  </ul>
			  <ul class="list-group col-lg-3 col-md-6 ul-footer ">
				  <p class="title-footer text-white font-16">راه های ارتباطی</p>
                <li class="list-group-item text-light2">
					<span class="fa  fa-address-book"></span>
					زاهدان پارک علم وفناورری  شرکت بهبود رایان
				</li>
				  <li class="list-group-item text-light2">
					  <span class="fa  fa-phone"></span>
                       054-33290440 (ساعت7 تا 15 ظهر)
				  </li>
				  <li class="list-group-item text-light2">
					  <span class="fa  fa-envelope"></span>
					  videorayan@gmail.com
				  </li>
			  </ul>
				  </div>
			  </div>
          </div>
			</div>
        </div>
      </div>
    </div>
</footer>
<!-- Subfooter -->
<footer class="subfooter">
  <div class="container">
    <div class="row">
      <div class="col-md-9 align-self-center">
        <div class="copyright-text">
          <p class="text-light font-14"> کلیه حقوق این سایت متعلق به ویدیو رایان می باشد</p>
        </div>
      </div>
      <div class="col-md-3">
          <a href="#" class="to-top bg-red"><i class="fa fa-angle-up"></i></a>
      </div>
    </div>
  </div>
</footer>



<script src="{{ asset('landing/plugins/jquery/jquery.js') }}"></script>
<script src="{{ asset('landing/plugins/popper/popper.min.js') }}"></script>
<script src="{{ asset('landing/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('landing/plugins/smoothscroll/SmoothScroll.min.js') }}"></script>
<script src="{{ asset('landing/plugins/isotope/mixitup.min.js') }}"></script>
<script src="{{ asset('landing/plugins/magnific-popup/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ asset('landing/plugins/slick/slick.min.js') }}"></script>
<script src="{{ asset('landing/plugins/syotimer/jquery.syotimer.min.js') }}"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBu5nZKbeK-WHQ70oqOWo-_4VmwOwKP9YQ"></script>
<script type="text/javascript" src="plugins/google-map/gmap.js') }}"></script>
<script src="{{ asset('landing/js/custom.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    
    @livewireScripts

</body>
</html>
