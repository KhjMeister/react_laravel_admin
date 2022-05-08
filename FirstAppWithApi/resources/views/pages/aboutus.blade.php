@extends('layouts.landing')

@section('content')



<!--================================
=            Page Title            =
=================================-->

<section class="page-title bg-title overlay-dark">
	<div class="container">
		<div class="row">
			<div class="col-12 text-center">
				<div class="title">
					<h3>درباره ما</h3>
				</div>
				<ol class="breadcrumb p-0 m-0">
				  <li class="breadcrumb-item"><a href="{{ route('videorayan') }}">خانه</a></li>
				  <li class="breadcrumb-item text-red">درباره ما</li>
				</ol>
			</div>
		</div>
	</div>
</section>

<!--====  End of Page Title  ====-->


<!--===========================
=            About            =
============================-->

<section class="section about">
	<div class="container">
		<div class="row">
			<div class="col-lg-4 col-md-6 align-self-center">
				<div class="image-block bg-about">
					<img class="img-fluid" src="{{ asset('landing/images/speakers/single-speaker.jpg') }}" alt="">
				</div>
			</div>
			<div class="col-lg-8 col-md-6 align-self-center">
				<div class="content-block">
					<h2>درباره <span class="alternate-v">ویدئو رایان</span></h2>
					<div class="description-one">
						<p>
							ویدیو رایان وبسایتی با نگاه متفاوت سعی داشته مانند سایر ویسایت های خارجی امکاناتی ویژه ددراختیار کاربران خود به صورت رابگان دراختیار قرار داده تا شما عزیزان یه ویدیو کنفرانس مطلوب وعالی داشته باشید ما تیمی حرفه وعالی سعی میکنیم تا بهترین ارائه خدمات را برای شما عزیزان داشته باشیم.
						</p>
					</div>
					
				
				</div>
			</div>
		</div>
	</div>
</section>

<!--====  End of About  ====-->

<!--==============================================
=            Call to Action Subscribe            =
===============================================-->

<section class="cta-subscribe bg-subscribe overlay-dark mt-1">
	<div class="container">
		<div class="row">
			<div class="col-md-6 mr-auto">
				<!-- Subscribe Content -->
				<div class="content">
					<h3>عضویت در <span class="alternate-v">خبرنامه ما</span></h3>
					<p>جهت اطلاع از آخرین اخبار سایت ایمیل خود را وارد کنید</p>
				</div>
			</div>
			<div class="col-md-6 ml-auto align-self-center">
				<!-- Subscription form -->
				<form action="#" class="row">
					<div class="col-lg-8 col-md-12">
						<input type="email" class="form-control main white mb-lg-0" placeholder="ایمیل ">
					</div>
					<div class="col-lg-4 col-md-12">
						<div class="subscribe-button">
							<button class="btn btn-main-md">عضویت</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</section>

<!--====  End of Call to Action Subscribe  ====-->




 @endsection
