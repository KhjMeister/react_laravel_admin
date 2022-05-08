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
					<h3>ارتباط با ما</h3>
				</div>
				<ol class="breadcrumb p-0 m-0">
				  <li class="breadcrumb-item"><a href="{{ route('videorayan') }}">خانه</a></li>
				  <li class="breadcrumb-item text-red">ارتباط با ما</li>
				</ol>
			</div>
		</div>
	</div>
</section>

<!--====  End of Page Title  ====-->




<section class="section contact-form">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="section-title">
					<h3 class="alternate-v"> در ارتباط<span class="text-dark mr-1">باشید</span></h3>
					<p>
 برای ثبت سفارش و پرسش های خود میتوانید از طریق راه های زیر سفارش خود را ثبت نمایید
                     </p>
				</div>
			</div>
        <diiv class="col-xl-5 col-12 mb-4 col-md-4">
            <p class="font-18 mb-2 text-dark contact mb-4">راه های ارتباطی</p>
            <ul class="list-group col-12 ul-footer pr-0 pl-2">
                <li class="list-group-item text-dark">
                    <span class="fa text-red ml-2 font-18 fa-phone"></span>
                    054-33290440 (ساعت7 تا 15 ظهر)
                </li>

                <li class="list-group-item text-dark">
                    <span class="fa text-red ml-2 font-18 fa-address-book"></span>
                    زاهدان خیابان دانشگاه روبروی دانشگاه ادبیات  پارک علم وفناورری  شرکت بهبود رایان
                </li>
                <li class="list-group-item text-dark">
                    <span class="fa text-red ml-2 font-18 fa-envelope"></span>
                    videorayan@gmail.com
                </li>
            </ul>
        </diiv>
		<form action="#" class="row col-xl-7 col-12 col-md-8">
			<div class="col-md-6">
				<input type="text" class="form-control main" name="name" id="name" placeholder="نام ونام خانوادگی">
			</div>
			<div class="col-md-6">
				<input type="email" class="form-control main" name="email" id="email" placeholder="ایمیل">
			</div>
			<div class="col-md-12">
				<input type="text" class="form-control main" name="phone" id="phone" placeholder="شماره موبایل">
			</div>
			<div class="col-md-12">
				<textarea name="message" id="message" class="form-control main" rows="10" placeholder="متن مورد نظر"></textarea>
			</div>
			<div class="col-12 text-right">
				<button type="submit" class="btn btn-main-md">ارسال</button>
			</div>
		</form>
	</div>
    </div>
</section>



 @endsection
