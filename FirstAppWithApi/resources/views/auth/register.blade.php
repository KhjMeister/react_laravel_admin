@extends('layouts.reg')

@section('content')

    <div class="container">
       <div class="row bg-light mt-2" style="border-radius: 1rem;">
           <div class="col-lg-5">
            <div class="container">
                <div class="d-flex justify-content-center align-items-center flex-column mt-2" >
                <form id="register_form" method="POST" enctype="multipart/form-data" action="{{ route('register') }}">
                @csrf

                  <div class="LR-content">
                    <div class="container">
                      <div class="d-flex align-items-center">
                        <div>
                          <img style="width: 50px; height: 50px" src="{{asset('rv/img/log.png')}}" alt="videoRayan"
                          />
                        </div>
                        <h3>ویدیو رایان</h3>
                      </div>
                      <div class="mb-4 mt-0 font-weight-bold">
                        <h3 style="margin-top: 0px">خوش آمدید ، لطفا ثبت نام کنید</h3>
                      </div>
                      <div class="col-lg-12 offset-lg-1 my-5">
                        <div class="form-group text-muted" style="direction: rtl">
                            <input id="username" type="text" class="mt-1 form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus aria-describedby="emailHelp"  />
                            <label for="username">نام کاربری</label>
                            @error('username')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="form-group text-muted" style="direction: rtl">
                            <input id="email" type="email" class="mt-1 form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" />
                            <label for="email">ایمیل</label>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
      
                        <div class="form-group text-muted" style="direction: rtl">
                          <input id="password" type="password" class="mt-1 form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" />
                          <label for="password"> پسورد</label>
                          @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
      
                        <div class="form-group text-muted" style="direction: rtl">
                          <input type="password" class=" mt-1 form-control" name="password_confirmation" required autocomplete="new-password" id="CPassword" />
                          <label for="CPassword">تکرار پسورد</label>
                        </div>

                        <div class="form-group text-muted" style="direction: rtl">
                            <input type="text" class=" mt-1 form-control" name="phone" required autocomplete="09154235678" id="phone" />
                            <label for="phone">شماره موبایل</label>
                            @error('phone')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                         <input id="files1" name="image_url" hidden />

                        <button type="submit"  id="register_btn" class="icon-login">
                          <h3>ثبت نام</h3>
                        </button>
                      </div>
                    </div>
                  </div>
                  </form>
                </div>
              </div> 
           </div>
           <div class="col-lg-6 mt-5 login-img section-img-login " >
                <div class="contentarea" style="margin-top: 42px;">
                 <div id="camer" class="camera">
                    <video style="width: 30rem;height: 22.49rem;" class="cart" id="video">ویدیو نیست</video>
                </div>

                <div id="take_pic">
                    <svg id="startbutton" xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-camera take-pic2" viewBox="0 0 16 16" >
                    <path d="M15 12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V6a1 1 0 0 1 1-1h1.172a3 3 0 0 0 2.12-.879l.83-.828A1 1 0 0 1 6.827 3h2.344a1 1 0 0 1 .707.293l.828.828A3 3 0 0 0 12.828 5H14a1 1 0 0 1 1 1v6zM2 4a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2h-1.172a2 2 0 0 1-1.414-.586l-.828-.828A2 2 0 0 0 9.172 2H6.828a2 2 0 0 0-1.414.586l-.828.828A2 2 0 0 1 3.172 4H2z" />
                    <path d="M8 11a2.5 2.5 0 1 1 0-5 2.5 2.5 0 0 1 0 5zm0 1a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7zM3 6.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0z" />
                  </svg>

                </div>
                
                <canvas  id="canvas"></canvas>

                <div class="output" >
                    <img class="cart" id="photo" >
                </div>
                </div>
            </div>

        </div>
    </div>



@endsection
