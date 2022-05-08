@extends('layouts.landing')

@section('content')



<!--============================
=            Banner            =
=============================-->

<section class="banner bg-banner-one overlay">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<!-- Content Block -->
				<div class="block">
					<!-- Coundown Timer -->

					<h1 class="text-header">ویدیو رایان</h1>

					<h6 class="mt-4 text-font col-12 col-lg-7 p-0 text-shadow">
						مانند یک حرفه ای در هر مکان و در هر زمان , به روشی که برای
						شما کار میکند بزرگ نمایی کنید دوره های  درخواستی , آموزش های ویدیویی سریع و جلسات اموزشی زنده
					</h6>
					<!-- Action Button -->
					<a class="btn btn-white-md iransans" href="#tarefeh">خرید اشتراک</a>
				</div>
			</div>
		</div>
	</div>
</section>


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
					<h2>درباره<span class="alternate-v">ویدیو رایان</span></h2>
					<div class="description-one">
						<p class="p-about font-14">
                               ویدیو رایان وبسایتی با نگاه متفاوت سعی داشته مانند سایر ویسایت های خارجی امکاناتی ویژه ددراختیار کاربران خود
							به صورت رابگان دراختیار قرار داده تا شما عزیزان یه ویدیو کنفرانس مطلوب وعالی داشته باشید
							ما تیمی حرفه وعالی سعی میکنیم تا بهترین ارائه خدمات را برای شما عزیزان داشته باشیم.
						</p>
					</div>

					<ul class="list-inline p-0">
						<li class="list-inline-item">
							<a href="about-us.html" class="btn btn-main-md">بیشتر بدانید</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</section>

<!--====  End of About  ====-->

<!--==============================
=            Speakers            =
===============================-->
<section class="section speakers bg-speaker overlay-lighter">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<!-- Section Title -->
				<div class="section-title white">
					<h3 class="font-32">ویژگی<span class="alternate-v">ویدیو رایان</span></h3>
					<!--	<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit sed do eiusm tempor incididunt ut labore</p>-->
				</div>
			</div>
		</div>
		<div class="row justify-content-center">
			<div class="col-lg-3 col-md-4 col-sm-6  col-9">
				<!-- Speaker 1 -->
				<div class="speaker-item">
					<div class="image">
						<img src="{{ asset('landing/images/New%20message-bro.png') }}" alt="speaker" class="img-fluid">
						<div class="primary-overlay"></div>
						<div class="socials py-2 px-3 feature-rayan">
							راه حل چت ما که در حساب شما گنجانده شده است، گردش کار را ساده می کند، بهره وری را افزایش می دهد و تضمین می کند که کارمندان می توانند به طور ایمن همکاری کنند، چه داخلی و چه خارجی
						</div>
					</div>
					<div class="content text-center">
						<h5><a href="single-speaker.html" class="iransans mb-4">چت انلاین بین کاربران</a></h5>
					</div>
				</div>
			</div>
			<div class="col-lg-3 col-md-4 col-sm-6 col-9">
				<!-- Speaker 2 -->
				<div class="speaker-item">
					<div class="image">
						<img src="{{ asset('landing/images/Remote%20team-bro.png') }}" alt="speaker" class="img-fluid">
						<div class="primary-overlay"></div>
						<div class="socials py-2 px-3 feature-rayan">
							روابط قوی‌تری ایجاد کنید، همکاری‌های فوق‌العاده‌ای ایجاد کنید و تجربه‌ای جذاب از جلسه را با ویدیو و صدای HD برای حداکثر 1000 شرکت‌کننده ایجاد کنید.						</div>
					</div>
					<div class="content text-center">
						<h5><a href="single-speaker.html" class="iransans mb-4">کنفرانس تصویری</a></h5>
					</div>
				</div>
			</div>
			<div class="col-lg-3 col-md-4 col-sm-6 col-9">
				<!-- Speaker 3 -->
				<div class="speaker-item">
					<div class="image">
						<img src="{{ asset('landing/images/Online%20world-bro.png') }}" alt="speaker" class="img-fluid">
						<div class="primary-overlay"></div>
						<div class="socials py-2 px-3 feature-rayan">
							اتاق‌های کنفرانس خود را با تغییر نیازهای نیروی کار تطبیق دهید و در عین حال تجربه‌های اداری و راه دور را با ویدیو و صدا HD، اشتراک‌گذاری محتوای بی‌سیم و تخته سفید تعاملی متعادل کنید.

						</div>
					</div>
					<div class="content text-center">
						<h5><a href="single-speaker.html">اتاق ویدیو رایان</a></h5>
					</div>
				</div>
			</div>
			<div class="col-lg-3 col-md-4 col-sm-6 col-9">
				<!-- Speaker 4 -->
				<div class="speaker-item">
					<div class="image">
						<img src="{{ asset('landing/images/Webinar-pana%20(2).png') }}" alt="speaker" class="img-fluid">
						<div class="primary-overlay"></div>
						<div class="socials  px-3 feature-rayan">
							ویدیو رایان وبینارهای ویدئویی  تجربیات مجازی ایجاد کنید که شرکت کنندگان آن را دوست داشته باشند. همین امروز با رویدادهای ویدیو رایان و وبینارهای ویدیویی شروع کنید.
						</div>
					</div>
					<div class="content text-center">
						<h5><a href="single-speaker.html">وبینار</a></h5>
					</div>
				</div>
			</div>
			<div class="col-lg-3 col-md-4 col-sm-6 col-9">
				<!-- Speaker 1 -->
				<div class="speaker-item">
					<div class="image">
						<img src="{{ asset('landing/images/Conference-pana.png') }}" alt="speaker" class="img-fluid">
						<div class="primary-overlay"></div>
						<div class="socials py-2 px-3 feature-rayan">
							میتوانید زمان برگزاری همایش ومکان برگزاری همایش خود مدیریت وجزئیات ان را برای افراد شرح دهید
						</div>
					</div>
					<div class="content text-center">
						<h5><a href="single-speaker.html" class="iransans mb-4">مدیریت همایش</a></h5>
					</div>
				</div>
			</div>
			<div class="col-lg-3 col-md-4 col-sm-6 col-9">
				<!-- Speaker 2 -->
				<div class="speaker-item">
					<div class="image">
						<img src="{{ asset('landing/images/Conference%20speaker-amico.png') }}" alt="speaker" class="img-fluid">
						<div class="primary-overlay"></div>
						<div class="socials py-2 px-3 feature-rayan">
							شما عزیزان میتوانید زمان شروع وپایان وجزئیات ان و همچنین  سخنران ها خود را مشخص ومدیریت کنید
						</div>
					</div>
						<div class="content text-center">
							<h5><a href="single-speaker.html" class="iransans mb-4">مدیریت سخنرانی ها</a></h5>
						</div>
					</div>
				</div>
			<div class="col-lg-3 col-md-4 col-sm-6 col-9">
				<!-- Speaker 3 -->
				<div class="speaker-item">
					<div class="image">
						<img src="{{ asset('landing/images/Judge-pana.png') }}" alt="speaker" class="img-fluid">
						<div class="primary-overlay"></div>
						<div class="socials py-2 px-3 feature-rayan">
							برای داوران خود یک بخش مدریریت درست کرده و فعالبت انها را در بخش پنل مدیریت داوران اناه را مدیریت کنید
						</div>
					</div>
					<div class="content text-center">
						<h5><a href="single-speaker.html">مدیریت داوران</a></h5>
					</div>
				</div>
			</div>
			<div class="col-lg-3 col-md-4 col-sm-6 col-9">
				<!-- Speaker 4 -->
				<div class="speaker-item">
					<div class="image">
						<img src="{{ asset('landing/images/Personal%20files-amico.png') }}" alt="speaker" class="img-fluid">
						<div class="primary-overlay"></div>
						<div class="socials  px-3 feature-rayan">
							مینوانید شرکت کننده های خود را مدیریت خضور وغیاب کرده ونمره برای انها ثبت کرده وبه خوبی مدیریت کرده
						</div>
					</div>
					<div class="content text-center">
						<h5><a href="single-speaker.html">مدیریت شرکت کنندگان</a></h5>
					</div>
				</div>
			</div>

		</div>
	</div>
</section>

<!--====  End of Speakers  ====-->

<!--==============================
=            Schedule            =
===============================-->



<!--====  End of Schedule  ====-->

<!--==================================
=            Registration            =
===================================-->

<section class="gallery-full section pb-0">
	<div class="container-fluid p-0">
		<div class="row">
			<div class="col-12">
				<div class="section-title">
					<div class="section-title">
						<h3 class="font-28">گالری<span class="alternate-v">ویدیو رایان</span></h3>
						<!--	<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit sed do eiusm tempor incididunt ut labore</p>-->
					</div>
				</div>
			</div>
			<div class="row no-gutters">
				<!-- Gallery Image -->
				<div class="col-lg-3 col-md-4">
					<div class="image">
						<img src="{{ asset('landing/images/gallery/galler.jpg') }}" alt="gallery-image" class="img-fluid">
						<div class="primary-overlay">
							<a class="image-popup" data-effect="mfp-with-zoom" href="images/gallery/galler.jpg"><i class="fa fa-picture-o"></i></a>
						</div>
					</div>
				</div>
				<!-- Gallery Image -->
				<div class="col-lg-3 col-md-4">
					<div class="image">
						<img src="{{ asset('landing/images/gallery/7.jpg') }}" alt="gallery-image" class="img-fluid">
						<div class="primary-overlay">
							<a class="image-popup" data-effect="mfp-with-zoom" href="images/gallery/9.jpg"><i class="fa fa-picture-o"></i></a>
						</div>
					</div>
				</div>
				<!-- Gallery Image -->
				<div class="col-lg-3 col-md-4">
					<div class="image">
						<img src="{{ asset('landing/images/gallery/1.jpg') }}" alt="gallery-image" class="img-fluid">
						<div class="primary-overlay">
							<a class="image-popup" data-effect="mfp-with-zoom" href="images/gallery/1.jpg"><i class="fa fa-picture-o"></i></a>
						</div>
					</div>
				</div>
				<!-- Gallery Image -->
				<div class="col-lg-3 col-md-4">
					<div class="image">
						<img src="{{ asset('landing/images/gallery/3.jpg') }}" alt="gallery-image" class="img-fluid">
						<div class="primary-overlay">
							<a class="image-popup" data-effect="mfp-with-zoom" href="images/gallery/3.jpg"><i class="fa fa-picture-o"></i></a>
						</div>
					</div>
				</div>
				<!-- Gallery Image -->
				<div class="col-lg-3 col-md-4">
					<div class="image">
						<img src="{{ asset('landing/images/gallery/4.jpg') }}" alt="gallery-image" class="img-fluid">
						<div class="primary-overlay">
							<a class="image-popup" data-effect="mfp-with-zoom" href="images/gallery/4.jpg"><i class="fa fa-picture-o"></i></a>
						</div>
					</div>
				</div>
				<!-- Gallery Image -->
				<div class="col-lg-3 col-md-4">
					<div class="image">
						<img src="{{ asset('landing/images/gallery/2.jpg') }}" alt="gallery-image" class="img-fluid">
						<div class="primary-overlay">
							<a class="image-popup" data-effect="mfp-with-zoom" href="images/gallery/2.jpg"><i class="fa fa-picture-o"></i></a>
						</div>
					</div>
				</div>
				<!-- Gallery Image -->
				<div class="col-lg-3 col-md-4">
					<div class="image">
						<img src="{{ asset('landing/images/gallery/5.jpg') }}" alt="gallery-image" class="img-fluid">
						<div class="primary-overlay">
							<a class="image-popup" data-effect="mfp-with-zoom" href="images/gallery/5.jpg"><i class="fa fa-picture-o"></i></a>
						</div>
					</div>
				</div>
				<!-- Gallery Image -->
				<div class="col-lg-3 col-md-4">
					<div class="image">
						<img src="{{ asset('landing/images/gallery/6.jpg') }}" alt="gallery-image" class="img-fluid">
						<div class="primary-overlay">
							<a class="image-popup" data-effect="mfp-with-zoom" href="images/gallery/8	.jpg"><i class="fa fa-picture-o"></i></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	</div>
</section>


<!--====  End of Registration  ====-->


<!--===================================
=            Pricing Table            =
====================================-->

<section class="section pricing" id="tarefeh">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="section-title">
					<h3 class="font-32">خرید <span class="alternate-v">اشتراک</span></h3>
					<!--<p>Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusm tempor incididunt ut labore</p>-->
				</div>
			</div>
		</div>
                <ul class="nav nav-pills p-0 col-12 justify-content-center mb-4 border-ul" role="tablist">
                    <li class="nav-item px-2 px-sm-4"><a class="nav-link active" href="#official" data-toggle="pill">اداری</a></li>
                    <li class="nav-item px-2 px-sm-4"><a class="nav-link" href="#educational" data-toggle="pill">اموزشی</a></li>
                    <li class="nav-item px-2 px-sm-4"><a class="nav-link" href="#business" data-toggle="pill">کسب وکار</a></li>
                </ul>
        <div class="tab-content">
            <div class="tab-pane active" id="official">
		     <div class="row justify-content-center">
			<div class="col-xl-4 col-lg-4 col-md-6 col-sm-9 col-11 mb-4">
				<!-- Pricing Item -->
				<div class="pricing-item featured">
					<div class="pricing-heading ">
						<!-- Title -->
						<div class="title">
							<h6 class="font-18 ">سرویس ۵۰  کاربره</h6>
						</div>
						<!-- Price -->

					</div>
					<div class="pricing-body">
						<!-- Feature List -->
						<ul class="feature-list m-0 p-0 ">
                            <div class="subscription mb-3">
                                <div class="row">
							<li><p><span class="fa fa-check-circle available"></span>جلسات باظرفیت ۵۰ </p></li>
							<li><p><span class="fa fa-check-circle available"></span>12ویدیوهمزمان</p></li>
							<li><p><span class="fa fa-check-circle available"></span>احزار هویت با چهره</p></li>
							<li><p><span class="fa fa-check-circle available"></span>تخت وایت برد انلاین</p></li>
							<li><p><span class="fa fa-check-circle available"></span>زیرنویس انلاین</p></li>
							<li><p><span class="fa fa-check-circle available"></span>کنفرانس ویژه</p></li>
                            <li><p><span class="fa fa-check-circle available"></span>زمان برگزاری نامحدود</p></li>
                                </div>
                            </div>
                            <li class="price-ticket"><p class="zaman">یک ماهه</p><span>20%</span><p class="price-mah">1,000,000 تومان</p></li>
                            <li class="price-ticket"><p class="zaman">سه ماهه</p><span>30%</span><p  class="price-mah">2,500,000 تومان</p></li>
                            <li class="price-ticket"><p class="zaman">شش ماهه</p><span>35%</span><p  class="price-mah">3,500,000 تومان</p></li>
                            <li class="price-ticket"><p class="zaman">یکساله ماهه</p><span>45%</span><p  class="price-mah">4,500,000 تومان</p></li>
						</ul>
					</div>
					<div class="pricing-footer text-center">
						<a href="contact.html" class="btn btn-main-md">سفارش</a>
					</div>
				</div>
			</div>
				 <div class="col-xl-4 col-lg-4 col-md-6 col-sm-9 col-11 mb-4">
                <!-- Pricing Item -->
                <div class="pricing-item">
                    <div class="pricing-heading">
                        <!-- Title -->
                        <div class="title">
                            <h6 class="font-18 ">سرویس ۱۰۰  کاربره</h6>
                        </div>
                        <!-- Price -->

                    </div>
                    <div class="pricing-body">
                        <!-- Feature List -->
                        <ul class="feature-list m-0 p-0">
							<div class="subscription mb-3">
								<div class="row">
									<li><p><span class="fa fa-check-circle available"></span>جلسات باظرفیت ۱۰۰ </p></li>
									<li><p><span class="fa fa-check-circle available"></span>12ویدیوهمزمان</p></li>
									<li><p><span class="fa fa-check-circle available"></span>احزار هویت با چهره</p></li>
									<li><p><span class="fa fa-check-circle available"></span>تخت وایت برد انلاین</p></li>
									<li><p><span class="fa fa-check-circle available"></span>زیرنویس انلاین</p></li>
									<li><p><span class="fa fa-check-circle available"></span>کنفرانس ویژه</p></li>
									<li><p><span class="fa fa-check-circle available"></span>زمان برگزاری نامحدود</p></li>
								</div>
							</div>
                            <li class="price-ticket"><p class="zaman">یک ماهه</p><span>20%</span><p class="price-mah">1,000,000 تومان</p></li>
                            <li class="price-ticket"><p class="zaman">سه ماهه</p><span>30%</span><p  class="price-mah">2,500,000 تومان</p></li>
                            <li class="price-ticket"><p class="zaman">شش ماهه</p><span>35%</span><p  class="price-mah">3,500,000 تومان</p></li>
                            <li class="price-ticket"><p class="zaman">یکساله ماهه</p><span>45%</span><p  class="price-mah">4,500,000 تومان</p></li>
                        </ul>
                    </div>
                    <div class="pricing-footer text-center">
                        <a href="contact.html" class="btn btn-transparent-md">سفارش</a>
                    </div>
                </div>
            </div>
				 <div class="col-xl-4 col-lg-4 col-md-6 col-sm-9 col-11 mb-4">
				<!-- Pricing Item -->
				<div class="pricing-item">
					<div class="pricing-heading ">
						<!-- Title -->
						<div class="title">
							<h6 class="font-18">سرویس ۲۵۰  کاربره</h6>
						</div>
						<!-- Price -->

					</div>
					<div class="pricing-body">
						<!-- Feature List -->
						<ul class="feature-list m-0 p-0">
							<div class="subscription mb-3">
								<div class="row">
									<li><p><span class="fa fa-check-circle available"></span>جلسات باظرفیت ۲۵۰ </p></li>
									<li><p><span class="fa fa-check-circle available"></span>12ویدیوهمزمان</p></li>
									<li><p><span class="fa fa-check-circle available"></span>احزار هویت با چهره</p></li>
									<li><p><span class="fa fa-check-circle available"></span>تخت وایت برد انلاین</p></li>
									<li><p><span class="fa fa-check-circle available"></span>زیرنویس انلاین</p></li>
									<li><p><span class="fa fa-check-circle available"></span>کنفرانس ویژه</p></li>
									<li><p><span class="fa fa-check-circle available"></span>زمان برگزاری نامحدود</p></li>
								</div>
							</div>
                            <li class="price-ticket"><p class="zaman">یک ماهه</p><span>20%</span><p class="price-mah">1,000,000 تومان</p></li>
                            <li class="price-ticket"><p class="zaman">سه ماهه</p><span>30%</span><p  class="price-mah">2,500,000 تومان</p></li>
                            <li class="price-ticket"><p class="zaman">شش ماهه</p><span>35%</span><p  class="price-mah">3,500,000 تومان</p></li>
                            <li class="price-ticket"><p class="zaman">یکساله ماهه</p><span>45%</span><p  class="price-mah">4,500,000 تومان</p></li>
						</ul>
					</div>
					<div class="pricing-footer text-center">
						<a href="contact.html" class="btn btn-transparent-md">سفارش</a>
					</div>
				</div>
			</div>
             </div>
            </div>
            <div class=" tab-pane" id="educational">
                <div class="row justify-content-center">
					<div class="col-xl-4 col-lg-4 col-md-6 col-sm-9 col-11 mb-4">
                        <!-- Pricing Item -->
                        <div class="pricing-item featured">
                            <div class="pricing-heading">
                                <!-- Title -->
                                <div class="title">
                                    <h6 class="font-18">سرویس ۵۰  کاربره</h6>
                                </div>
                                <!-- Price -->

                            </div>
                            <div class="pricing-body">
                                <!-- Feature List -->
                                <ul class="feature-list m-0 p-0 ">
									<div class="subscription mb-3">
										<div class="row">
                                    <li><p><span class="fa fa-check-circle available"></span>جلسات باظرفیت ۵۰ </p></li>
									<li><p><span class="fa fa-check-circle available"></span>6ویدیوهمزمان</p></li>
									<li><p><span class="fa fa-check-circle available"></span>احزار هویت با چهره</p></li>
									<li><p><span class="fa fa-check-circle available"></span>تخت وایت برد انلاین</p></li>
									<li><p><span class="fa fa-check-circle available"></span>زیرنویس انلاین</p></li>
                                    <li><p><span class="fa fa-check-circle available"></span>زمان برگزاری نامحدود</p></li>
										</div>
									</div>
                                    <li class="price-ticket"><p class="zaman">یک ماهه</p><p class="price-mah">400,000 تومان</p></li>
                                    <li class="price-ticket"><p class="zaman">سه ماهه</p><span>30%</span><p  class="price-mah">800,000 تومان</p></li>
                                    <li class="price-ticket"><p class="zaman">شش ماهه</p><span>35%</span><p  class="price-mah">1,900,000 تومان</p></li>
                                    <li class="price-ticket"><p class="zaman">یکساله ماهه</p><span>45%</span><p  class="price-mah">3,300,000 تومان</p></li>
                                </ul>
                            </div>
                            <div class="pricing-footer text-center">
                                <a href="contact.html" class="btn btn-main-md">سفارش</a>
                            </div>
                        </div>
                    </div>
					<div class="col-xl-4 col-lg-4 col-md-6 col-sm-9 col-12 mb-4">
                        <!-- Pricing Item -->
                        <div class="pricing-item">
                            <div class="pricing-heading">
                                <!-- Title -->
                                <div class="title">
                                    <h6 class="font-18 ">سرویس ۱۰۰  کاربره</h6>
                                </div>
                                <!-- Price -->

                            </div>
                            <div class="pricing-body">
                                <!-- Feature List -->
                                <ul class="feature-list m-0 p-0">
									<div class="subscription mb-3">
										<div class="row">
											<li><p><span class="fa fa-check-circle available"></span>جلسات باظرفیت ۱۰۰ </p></li>
											<li><p><span class="fa fa-check-circle available"></span>6ویدیوهمزمان</p></li>
											<li><p><span class="fa fa-check-circle available"></span>احزار هویت با چهره</p></li>
											<li><p><span class="fa fa-check-circle available"></span>تخت وایت برد انلاین</p></li>
											<li><p><span class="fa fa-check-circle available"></span>زیرنویس انلاین</p></li>
											<li><p><span class="fa fa-check-circle available"></span>زمان برگزاری نامحدود</p></li>
										</div>
									</div>
                                    <li class="price-ticket"><p class="zaman">یک ماهه</p><p class="price-mah">800,000 تومان</p></li>
                                    <li class="price-ticket"><p class="zaman">سه ماهه</p><span>22%</span><p  class="price-mah">1,600,000 تومان</p></li>
                                    <li class="price-ticket"><p class="zaman">شش ماهه</p><span>27%</span><p  class="price-mah">4,000,000 تومان</p></li>
                                    <li class="price-ticket"><p class="zaman">یکساله ماهه</p><span>45%</span><p  class="price-mah">8,000,000 تومان</p></li>
                                </ul>
                            </div>
                            <div class="pricing-footer text-center">
                                <a href="contact.html" class="btn btn-transparent-md">سفارش</a>
                            </div>
                        </div>
                    </div>
					<div class="col-xl-4 col-lg-4 col-md-6 col-sm-9 col-11 mb-4">
                        <!-- Pricing Item -->
                        <div class="pricing-item">
                            <div class="pricing-heading">
                                <!-- Title -->
                                <div class="title">
                                    <h6 class="font-18">سرویس ۲۵۰  کاربره</h6>
                                </div>
                                <!-- Price -->

                            </div>
                            <div class="pricing-body">
                                <!-- Feature List -->
                                <ul class="feature-list m-0 p-0">
									<div class="subscription mb-3">
										<div class="row">
											<li><p><span class="fa fa-check-circle available"></span>جلسات باظرفیت ۲۵۰ </p></li>
											<li><p><span class="fa fa-check-circle available"></span>6ویدیوهمزمان</p></li>
											<li><p><span class="fa fa-check-circle available"></span>احزار هویت با چهره</p></li>
											<li><p><span class="fa fa-check-circle available"></span>تخت وایت برد انلاین</p></li>
											<li><p><span class="fa fa-check-circle available"></span>زیرنویس انلاین</p></li>
											<li><p><span class="fa fa-check-circle available"></span>زمان برگزاری نامحدود</p></li>
										</div>
									</div>
                                    <li class="price-ticket"><p class="zaman">یک ماهه</p><p class="price-mah">1,800,000 تومان</p></li>
                                    <li class="price-ticket"><p class="zaman">سه ماهه</p><span>30%</span><p  class="price-mah">5,000,000 تومان</p></li>
                                    <li class="price-ticket"><p class="zaman">شش ماهه</p><span>35%</span><p  class="price-mah">9,500,000 تومان</p></li>
                                    <li class="price-ticket"><p class="zaman">یکساله ماهه</p><span>45%</span><p  class="price-mah">15,500,000 تومان</p></li>
                                </ul>
                            </div>
                            <div class="pricing-footer text-center">
                                <a href="contact.html" class="btn btn-transparent-md">سفارش</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane" id="business">
                <div class="row justify-content-center">
					<div class="col-xl-4 col-lg-4 col-md-6 col-sm-9 col-11 mb-4">
                        <!-- Pricing Item -->
                        <div class="pricing-item featured">
                            <div class="pricing-heading">
                                <!-- Title -->
                                <div class="title">
                                    <h6 class="font-18 ">سرویس ۵۰  کاربره</h6>
                                </div>
                                <!-- Price -->

                            </div>
                            <div class="pricing-body">
                                <!-- Feature List -->
                                <ul class="feature-list m-0 p-0 ">
									<div class="subscription mb-3">
										<div class="row">
                                    <li><p><span class="fa fa-check-circle available"></span>جلسات باظرفیت ۵۰ </p></li>
									<li><p><span class="fa fa-check-circle available"></span>10ویدیوهمزمان</p></li>
									<li><p><span class="fa fa-check-circle available"></span>احزار هویت با چهره</p></li>
									<li><p><span class="fa fa-check-circle available"></span>تخت وایت برد انلاین</p></li>
									<li><p><span class="fa fa-check-circle available"></span>زیرنویس انلاین</p></li>
                                    <li><p><span class="fa fa-check-circle available"></span>زمان برگزاری نامحدود</p></li>
										</div>
									</div>
                                    <li class="price-ticket"><p class="zaman">یک ماهه</p><span>20%</span><p class="price-mah">1,800,000 تومان</p></li>
                                    <li class="price-ticket"><p class="zaman">سه ماهه</p><span>30%</span><p  class="price-mah">5,000,000 تومان</p></li>
                                    <li class="price-ticket"><p class="zaman">شش ماهه</p><span>35%</span><p  class="price-mah">9,500,000 تومان</p></li>
                                    <li class="price-ticket"><p class="zaman">یکساله ماهه</p><span>45%</span><p  class="price-mah">15,500,000 تومان</p></li>
                                </ul>
                            </div>
                            <div class="pricing-footer text-center">
                                <a href="contact.html" class="btn btn-main-md">سفارش</a>
                            </div>
                        </div>
                    </div>
					<div class="col-xl-4 col-lg-4 col-md-6 col-sm-9 col-11 mb-4">
                        <!-- Pricing Item -->
                        <div class="pricing-item">
                            <div class="pricing-heading">
                                <!-- Title -->
                                <div class="title">
									<h6 class="font-18">سرویس ۲۵۰  کاربره</h6>
                                </div>
                                <!-- Price -->

                            </div>
                            <div class="pricing-body">
                                <!-- Feature List -->
                                <ul class="feature-list m-0 p-0">
									<div class="subscription mb-3">
										<div class="row">
                                    <li><p><span class="fa fa-check-circle available"></span>جلسات باظرفیت ۱۰۰ </p></li>
									<li><p><span class="fa fa-check-circle available"></span>10ویدیوهمزمان</p></li>
									<li><p><span class="fa fa-check-circle available"></span>احزار هویت با چهره</p></li>
									<li><p><span class="fa fa-check-circle available"></span>تخت وایت برد انلاین</p></li>
									<li><p><span class="fa fa-check-circle available"></span>زیرنویس انلاین</p></li>
                                    <li><p><span class="fa fa-check-circle available"></span>زمان برگزاری نامحدود</p></li>
										</div>
									</div>
                                    <li class="price-ticket"><p class="zaman">یک ماهه</p><span>20%</span><p class="price-mah">3,500,000 تومان</p></li>
                                    <li class="price-ticket"><p class="zaman">سه ماهه</p><span>30%</span><p  class="price-mah">8,000,000 تومان</p></li>
                                    <li class="price-ticket"><p class="zaman">شش ماهه</p><span>35%</span><p  class="price-mah">17,500,000 تومان</p></li>
                                    <li class="price-ticket"><p class="zaman">یکساله ماهه</p><span>45%</span><p  class="price-mah">25,500,000 تومان</p></li>
                                </ul>
                            </div>
                            <div class="pricing-footer text-center">
                                <a href="contact.html" class="btn btn-transparent-md">سفارش</a>
                            </div>
                        </div>
                    </div>
					<div class="col-xl-4 col-lg-4 col-md-6 col-sm-9 col-11 mb-4">
                        <!-- Pricing Item -->
                        <div class="pricing-item">
                            <div class="pricing-heading ">
                                <!-- Title -->
                                <div class="title">
									<h6 class="font-18">سرویس ۲۵۰  کاربره</h6>
                                </div>
                                <!-- Price -->

                            </div>
                            <div class="pricing-body">
                                <!-- Feature List -->
                                <ul class="feature-list m-0 p-0">
									<div class="subscription mb-3">
										<div class="row">
                                    <li><p><span class="fa fa-check-circle available"></span>جلسات باظرفیت ۲۵۰ </p></li>
									<li><p><span class="fa fa-check-circle available"></span>10ویدیوهمزمان</p></li>
									<li><p><span class="fa fa-check-circle available"></span>احزار هویت با چهره</p></li>
									<li><p><span class="fa fa-check-circle available"></span>تخت وایت برد انلاین</p></li>
									<li><p><span class="fa fa-check-circle available"></span>زیرنویس انلاین</p></li>
									<li><p><span class="fa fa-check-circle available"></span>زمان برگزاری نامحدود</p></li>
										</div>
									</div>
                                    <li class="price-ticket"><p class="zaman">یک ماهه</p><span>20%</span><p class="price-mah">7,200,000 تومان</p></li>
                                    <li class="price-ticket"><p class="zaman">سه ماهه</p><span>30%</span><p  class="price-mah">15,500,000 تومان</p></li>
                                    <li class="price-ticket"><p class="zaman">شش ماهه</p><span>35%</span><p  class="price-mah">34,275,000 تومان</p></li>
                                    <li class="price-ticket"><p class="zaman">یکساله ماهه</p><span>45%</span><p  class="price-mah">60,000,000 تومان</p></li>
                                </ul>
                            </div>
                            <div class="pricing-footer text-center">
                                <a href="contact.html" class="btn btn-transparent-md">سفارش</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    </div>
</section>

<!--====  End of Pricing Table  ====-->


<!--===========================================
=            Call to Action Ticket            =
============================================-->



<!--====  End of News Posts  ====-->



<!--==============================================
=            Call to Action Subscribe            =
===============================================-->



 @endsection
