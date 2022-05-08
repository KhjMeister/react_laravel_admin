@extends('layouts.admin')

@section('content')

<main style="direction: rtl">
        <div class="layout">
            <div class="navigation active">
                <div class="container">
                    <div class="inside">
                        <div class="nav nav-tab menu">
                            <a href="#settings" class="settingsW" data-toggle="tab" title="User Setting">
                                <i class="ti-panel"></i>
                                پروفایل
                            </a>
                            <a href="#members" class="membersW" data-toggle="tab" title="All members">
                                <i class="ti-user"></i>
                                مخاطبین
                            </a>
                            <a href="#discussions" class="discussionsW active" data-toggle="tab" title="Chat">
                                <i class="ti-comment-alt"></i>
                                پیام ها و تماس ها
                            </a>
                            <a href="#metting" class="discussionsW " data-toggle="tab" title="Chat">
                                <i class="ti-comment-alt"></i>
                                تاریخه جلسات
                            </a>
                            <a class="btn power" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                <i class="ti-power-off"></i>
                               
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" >
                                @csrf
                            </form>
                           

                        </div>
                    </div>
                </div>
            </div><!-- Navigation -->

            
            <livewire:admin.users />
        
          



            <div class="main bg" id="chat-dialog">

                <div class="bg-image" style="background-color: #e6e6e6"></div>
                <div class="tab-content" id="nav-tabContent">

                    <!-- welcome page -->
                <div class="babble tab-pane fade active show" role="tabpanel" aria-labelledby="list-empty-list">
                    <!-- Start of Chat -->
                    <div class="chat">
                        <div class="content empty welcome">
                            <div class="container">
                                <div class="col-md-12">
                                    <div class="d-flex flex-column justify-content-center align-items-center">
                                        <div style="">
                                            <img style="border-radius: 50% ;width: 17rem; height: 17rem;"
                                                src="{{ asset('rv/img/meeting.jpg') }}" alt="">
                                        </div>
                                        <form class="form-inline mt-3" style="">
                                            <div class="form-group width mr-0 mb-2">
                                                <label for="inputPassword2" class="sr-only">لینک پخش زنده</label>
                                                <input type="password" class="form-control" id="inputPassword2"
                                                    placeholder="لینک پخش زنده">
                                            </div>
                                            <button type="submit" class="btn btn-vip mb-2 text-white"
                                                style="line-height: 1.5; padding: .3rem .75rem;">تایید
                                            </button>
                                        </form>
                                        <p class="text-muted mt-2">
                                            {{ Auth::user()->name}} عزیز خوش آمدید
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End of Chat -->
                </div>
                <!-- End of welcome -->
                    

                </div>
            </div>
        </div> <!-- Layout -->
</main>
 
@endsection
