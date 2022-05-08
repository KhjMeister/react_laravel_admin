<div>
    <!--sidebar-left-menu-->
    <div class="sidebar" id="sidebar">
                <div class="container" style="padding: 0 7px">
                    <div class="col-md-12 p-0">
                        <div class="tab-content">
                            <!-- Start of Settings -->
                            <div wire:ignore.self class="tab-pane fade" id="settings">
                                <div class="settings">
                                    <div class="profile">
                                        <img class="avatar-xl" src="storage/{{Auth::user()->name}}/1.jpg " alt="avatar">
                                        <h1><a href="#"> {{ Auth::user()->name }} </a></h1>
                                        <span> </span>

                                    </div>
                                    <div style="overflow:scroll" class="categories" id="accordionSettings">
                                        <h1 class="text-right">تنظیمات</h1>
                                        <!-- Start of My Account -->
                                        <div class="category" >
                                            <a href="#" class="title collapsed" id="headingOne" data-toggle="collapse"
                                                data-target="#collapseOne" aria-expanded="true"
                                                aria-controls="collapseOne">
                                                <i class="ti-user"></i>
                                                <div class="data">
                                                    <h5>حساب کاربری شما</h5>
                                                    <p>جزئیات پروفایل</p>
                                                </div>
                                                <i class="ti-angle-down"></i>
                                            </a>
                                            <div class="collapse" id="collapseOne" aria-labelledby="headingOne"
                                                data-parent="#accordionSettings">
                                                <div class="content">
                                                    <form class="text-right">

                                                        <div class="field">
                                                            <label for="text">نام کاربری <span>*</span></label>
                                                            <input type="text" class="form-control" id="text"
                                                                placeholder="name namezehi" value="{{ $user->name }}" readonly>
                                                        </div>
                                                        <div class="field">
                                                            <label for="text">پست الکترونیک <span>*</span></label>
                                                            <input type="text" class="form-control" id="text"
                                                                placeholder="test@gmail.com" value="{{ $user->email }}" readonly>
                                                        </div>
                                                        <div class="field">
                                                            <label for="tel">شماره تماس</label>
                                                            <input type="tel" class="form-control" id="tel"
                                                                placeholder="09332521236" value="{{ $user->phone }}" readonly>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End of My Account -->
                                    </div>
                                </div>
                            </div>
                            <!-- End of Settings -->
                            <!-- Start of all friends -->
                            <div wire:ignore.self class="tab-pane fade" id="members">
                                <div class="d-flex align-items-center">
                                    <figure class="setting m-0">
                                        <i class="fa fa-ellipsis-v ml-3 mr-2"></i>
                                        <img class="avatar-xl" src="storage/{{Auth::user()->name}}/1.jpg " alt="avatar">
                                    </figure>
                                    <span class="logo mr-4"><img src="{{ asset('rv/img/logo.gif') }}" alt="" width="125px"></span>
                                </div>

                                <div class="search">
                                    <form class="form-inline position-relative">
                                        <input type="search" class="form-control" id="people" placeholder="جستجو...">
                                        <button type="button" class="btn btn-link loop"><i
                                                class="ti-search"></i></button>
                                    </form>
                                </div>
                                <div class="contacts">
                                    <div  class="list-group" id="contacts" role="tablist">
                                       @foreach($contacts as $contact)
                                        <a href="#"  class="filterMembers all online contact">
                                            <img class="avatar-md" src="{{ asset('rv/img/avatars/profile.png') }}"
                                                data-toggle="tooltip" data-placement="top" title="Sarah" alt="avatar">
                                            <div class="status {{ $contact->status ? 'online' : 'offline' }}"></div>
                                            <div class="data" data-toggle="modal" data-target="#edite" wire:click="getOneContact({{ $contact->id }})">
                                                <h5>{{ $contact->username }}</h5>
                                                <p>{{ $contact->semat }}</p>
                                            </div>
                                            <div class="person-add" wire:click.prevent="deleteContact({{ $contact->id }})">

                                                <i class="ti-trash" ></i>
                                            </div>
                                        </a>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <!-- End of Contacts -->
                            <!-- Start of Discussions -->
                            <div wire:ignore.self id="discussions" class="tab-pane fade in active show">
                                <div class="d-flex align-items-center">
                                    <figure class="setting m-0">
                                        <i class="fa fa-ellipsis-v ml-3 mr-2"></i>
                                        <img class="avatar-xl" src="storage/{{Auth::user()->name}}/1.jpg " alt="avatar">
                                    </figure>
                                    <span class="logo mr-4"><img src="{{ asset('rv/img/logo.gif') }}" alt="" width="125px"></span>
                                </div>
                                <div class="search">
                                    <form class="form-inline position-relative">
                                        <button type="button" class="btn btn-link loop"><i
                                                class="ti-search"></i></button>
                                        <input type="search" class="form-control" id="conversations"
                                            placeholder="جستجو...">
                                    </form>
                                </div>


                                <div class="discussions">
                                    <div class="row btn-calls mb-3" >
                                        <div class="col-6">
                                            <button wire:click="createModal()" class="btn btn-outline-danger w-100" data-toggle="modal" data-target="#startnewVoice"><i class="fa fa-phone ml-2"></i>ایجاد مخاطب
                                            </button>
                                        </div>
                                        <div class="col-6">
                                            <button class="btn btn-outline-danger w-100" data-toggle="modal" data-target="#showsession">
                                                <!-- <a href="{{ route('session') }}"> -->
                                                    <i class="fa fa-video-camera ml-2"></i> مدیریت جلسات
                                                <!-- </a> -->
                                            </button>
                                        </div>
                                    </div>


                                    <div class="list-group chat-items" id="chats" role="tablist">
                                       @if(!count($contacts) > 0)
                                            <a class="filterDiscussions all unread single "
                                            id="list-chat-list" data-toggle="list" role="tab" style="cursor: pointer;">
                                            
                                          

                                            <div class="data d-flex justify-content-between">
                                                <div >
                                                    <div class="d-flex ">
                                                        <h5> مخاطبی  وجود ندارد</h5>
                                                       
                                                    </div>
                                                    <div class="d-flex">
                                                       
                                                    </div>
                                                </div>
                                                
                                            </div>
                                        </a>
                                       @endif
                                       @foreach( $contacts as $oncontact)
                                        <a   class="filterDiscussions all unread single "
                                             style="cursor: pointer;">
                                            <img class="avatar-md" src="{{ asset('rv/img/avatars/profile.png') }}"
                                                data-toggle="tooltip" data-placement="top" title="Sarah" alt="avatar">
                                            <div class="status {{ $oncontact->status ? 'online' : 'offline' }}"></div>

                                            <div class="data d-flex justify-content-between">
                                                <div data-toggle="modal" data-target="#edite" wire:click="getOneContact({{ $oncontact->id }})">
                                                    <div class="d-flex ">
                                                        <h5> {{ $oncontact->username }}</h5>
                                                        <!-- <div class="new bg-red mr-2">
                                                            <span>tyu</span>
                                                        </div> -->
                                                    </div>
                                                    <div class="d-flex">
                                                        <p>
                                                        {{ $oncontact->phone }}
                                                        
                                                        </p>
                                                    </div>
                                                </div>
                                                
                                                    <button style="border-radius: 50%;" class="btn btn-danger  person-add" wire:click.prevent="deleteContact({{ $oncontact->id }})">
                                                        <i class="ti-trash" ></i>
                                                    </button>                                                
                                            </div>
                                        </a>
                                       @endforeach

                                    </div>
                                </div>
                            </div>
                            <!-- End of Discussions -->

                            <!-- Start of metting -->
                            <div wire:ignore.self id="metting" class="tab-pane fade ">
                                <div class="d-flex align-items-center">
                                    <figure class="setting m-0">
                                        <i class="fa fa-ellipsis-v ml-3 mr-2"></i>
                                        <img class="avatar-xl" src="storage/{{Auth::user()->name}}/1.jpg " alt="avatar">
                                    </figure>
                                    <span class="logo mr-4"><img src="{{ asset('rv/img/logo.gif') }}" alt="" width="125px"></span>
                                </div>
                                <div class="search">
                                    <form class="form-inline position-relative">
                                        <button type="button" class="btn btn-link loop"><i
                                                class="ti-search"></i></button>
                                        <input type="search" class="form-control" id="conversations"
                                            placeholder="جستجو...">
                                    </form>
                                </div>


                                <div class="discussions">
                                    <div class="categories" id="accordionSettings">
                                        <!-- Start of My Account -->
                                        <div class="category text-right">
                                            @foreach($allsessions as $sesss)
                                            <a href="#" class="title collapsed" id="headingOne" data-toggle="collapse"
                                                data-target="#collapseOne" aria-expanded="true"
                                                aria-controls="collapseOne">
                                                <div class="data">
                                                    <h5>{{ $sesss->name }}</h5>
                                                    <p>تاریخ اتمام جلسه 
                                                    <!-- <i class="ti-angle-down"></i> -->
                                                    &nbsp;
                                                    {{ $sesss->end_at }}
                                                    </p>
                                                </div>
                                            </a>
                                            @endforeach
                                            <!-- <div class="collapse" id="collapseOne" aria-labelledby="headingOne"
                                                data-parent="#accordionSettings">
                                                <div class="content">
                                                
                                                    <a href="#list-chat" class="filterDiscussions all unread single "
                                                        id="list-chat-list" data-toggle="list" role="tab">
                                                        <img class="avatar-md" src="{{ asset('rv/img/avatars/avatar-female-1.jpg') }}"
                                                            data-toggle="tooltip" data-placement="top" title="Sarah"
                                                            alt="avatar">
                                                        <div class="data d-flex justify-content-between">
                                                            <div>
                                                                <div class="d-flex ">
                                                                    <h5></h5>
                                                                </div>
                                                            </div>
                                                            <div class="float-left"><span></span></div>
                                                        </div>
                                                    </a>
                                                    
                                                </div>
                                            </div> -->
                                        </div>
                                        <!-- End of My Account -->
                                    </div>
                                </div>
                            </div>
                            <!-- End of metting -->
                        </div>
                    </div>
                </div>
            </div>
            <!--end Sidebar-left-menu -->

           
        <!--modal Add your friends-->
        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="requests">
                                <div class="title">
                                    <h1>Add your friends</h1>
                                    <button type="button" class="btn" data-dismiss="modal" aria-label="Close"><i
                                            class="ti-close"></i></button>
                                </div>
                                <div class="content">
                                    <form>
                                        <div class="form-group">
                                            <label for="user">Username:</label>
                                            <input type="text" class="form-control" id="user" placeholder="Add recipient..."
                                                required>
                                            <div class="user" id="contact">
                                                <img class="avatar-sm" src="storage/{{Auth::user()->name}}/1.jpg " alt="avatar">
                                                <h5>Karen joye</h5>
                                                <button type="reset" class="btn"><i class="ti-close"></i></button>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="welcome">Message:</label>
                                            <textarea class="text-control" id="welcome"
                                                placeholder="Send your welcome message...">Hi Karen joye, I'd like to add you as a contact.</textarea>
                                        </div>
                                        <button type="submit" class="btn button w-100">Send Friend Request</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div><!-- Add Friends -->

                    @include('livewire.admin.addcontact')
                    @include('livewire.admin.editcontact')
                    @include('livewire.admin.showsessions')

</div>