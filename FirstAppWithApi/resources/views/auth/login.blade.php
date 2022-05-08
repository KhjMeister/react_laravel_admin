@extends('layouts.client.login')

@section('content')
<div class="content">
        <div class="img-login">
            <img class="descktop" src="./client/assets/images/IMG-20210104-WA0002 1.jpg" alt="">
            <img class="mobile" src="./client/assets/images/mobilelogin.jpg" alt="">
        </div>
        <div class="form-login">
            <div class="items">
                <div class="detail">
                    <h3>خوش آمدید</h3>
                    
                    <h6><span>به ویدیو رایان</span></h6>
                    <p>
                        ابزار حرفه ای برای مدیریت کلیه جلسات حضوری و مجازی
                    </p>
                </div>
                <form id="login_form" method="POST" action="{{ route('login') }}" >
                    @csrf
                    <div class="form-group">
                        <label for="Email">آدرس ایمیل یا شماره تلفن</label>
                        <input class="@error('email') is-invalid @enderror" name="email"  autocomplete="email" id="Email" placeholder=" ایمیل یا شماره تلفن خود را وارد کنید">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="password-field">کلمه عبور</label>
                        <input  name="password" autocomplete="current-password" id="password-field" type="password" class="@error('password') is-invalid @enderror"  placeholder="کلمه عبور خود را وارد کنید">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <!-- <div class="form-group ">
                        <div class="form-check row">
                            <input class="form-check-input " type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label class="form-check-label col-6 text-muted" for="remember">
                            &nbsp;{{ __('Remember Me') }}
                            </label>
                        </div>
                    </div> -->

                    <button type="submit"> ورود </button>
                </form>
                <a href="{{route('register')}}" style="margin-top:10px;margin-right:260px;">ثبت نام </a>
            </div>
        </div>
    </div>

@endsection



