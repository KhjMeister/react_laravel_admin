<div class="bg-light" style="direction: rtl">

    <div class="container">
      <div class="row createparent text-right m-auto">
      @if (session()->has('message') && session('message')==='sendMessage')
        <div dir="rtl" class="alert alert-success text-center" style="margin-buttom:10px; width:900px;">
           <p class="m-auto">
           پیام به مخاطبان شما ارسال شد 
           </p>    
        </div>
    @endif
        <div class="col-lg-6 bg-white shadow">
          <a href="{{ route('home') }}" wire:click="zakhire()"><h6 class="mt-3 textcreateright fw-bold">
            <i class="fa fa-arrow-circle-right"></i>
            بازگشت به چت
          </h6></a>
          <h6 class="mt-4 fw-bold">عنوان جلسه</h6>
          <form class="form-inline position-relative">
            <button type="button" class="btn btn-link loop"></button>
            <input wire:model="name" type="search" class="form-control border-1 bg-light py-4" placeholder="عنوان جلسه خود را وارد نمایید" />
            <input wire:model="sess_token" hidden type="text" >
            <input wire:model="video_link" hidden type="text" >
          </form>
          <h6 class="mt-4 fw-bold">نوع جلسه</h6>
          <form class="d-flex mt-2">
            <input type="radio" name="jalasetype" wire:click="changeSessionState(1)" {{ $session_type==0 ? 'checked' : '' }} class="ml-1" />جلسه عمومی
            <input type="radio" name="jalasetype" wire:click="changeSessionState(0)" {{ $session_type==1 ? 'checked' : '' }} class="ml-1 mr-5" />جلسه خصوصی
          </form>

          <h6 class="mt-4 fw-bold">تاریخ جلسه</h6>
          <div class="d-flex mb-2">
            <label for="input1" class="mt-2" style="width: 34%">زمان شروع جلسه :</label>
            
            <input 
              type="text" 
              wire:model= "started_at"
              id="input1" 
              class="input-cal" 
              placeholder="زمان شروع جلسه "
              aria-label="date1"
              aria-describedby="date1"
              />
              <!-- <input
              type="time"
              style="width:110px !important;"/> -->
              
            <span id="span1"></span>
          
          </div>
          <div class="d-flex">
            <label for="input2" class="mt-2" style="width: 34%">زمان پایان جلسه :</label>
            
            
            <input
              type="text"
              wire:model= "end_at"
              id="input2"
              class="input-cal"
              placeholder="زمان اتمام جلسه "
              aria-label="date11"
              aria-describedby="date11"
              />
              <!-- <input
              type="time"
              style="width:110px !important;"/> -->
            
          </div>

          <h6 class="mt-4 fw-bold">افزودن مخاطب</h6>
          <button class="list-contact mt-2" id="btn">
            <i class="fa fa-phone ml-1"></i>
            افزودن از لیست مخاطب
          </button>

          <h6 class="mt-4 fw-bold">عملیات</h6>
          <div class="d-flex mt-2 mb-4">
            
        
            <button {{ $session_type ? 'hidden' : '' }} class="operation" id="inviteButton">
              <i class="fa fa-link pt-2"></i>
              لینک دعوت
            </button>
            
            <a class="operation" style="text-align:center;" {{ $session_type ? '' : 'hidden' }} href="{{$video_link}}" target="_blank" >
              <i class="fa fa-link pt-2"></i>
             برو به جلسه
            </a>
            
            <button type="button" wire:click="sendMessage()" class="operation mr-3">
              <i class="fa fa-wechat pt-2"></i>
             لینک پیام
            </button>
          </div>
        </div>
        
        <div class="col-lg-6 shadow createleft d-flex p-0">
          <img class="m-auto img-create-left" src="{{ asset('rv/img/sectionleft1.png') }}" />
        </div>
      </div>
    </div>
    <div class="g-link-parent" id="LinkModal">
        <div class=" g-link">
            <div class="input-link">
                <div class="close-btn-link" id="closeLink">
                    <i class="fa fa-close"></i>
                </div>
                <label class="text-right mt-3 font-16 mb-2" for=""><i class="fa fa-link ml-1"></i>لینک دعوت به جلسه</label>
                <div class="col-12 pb-1">
                    <div class="row">
                        <div class="col-9 col-lg-8 col-xl-9 p-0 text-center">
                            <input type="text" placeholder="عنوان جلسه" class="font-14" value="{{ $video_link }}">
                        </div>
                        <div class="col-3 col-lg-4 col-xl-3 padding-link">
                            <a target="_blank" href="{{ $video_link }}" class="text-danger btn-pop-link  font-14 mr-1">برو به  </a>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
    
    <div wire:ignore.self class="add-modal" id="startnewVoice" dir="rtl"
        style="position: absolute; top: 0;margin: auto;width: 100%;height: 100%;display: none;background: rgba(0,0,0,.35)">
        <div class="modal-dialog" role="document">
            <div class="requests">
                <div class="title pb-2" style="padding: .5rem 1rem 0;">
                    <button id="close" type="button" class="btn" data-dismiss="modal" aria-label="Close">
                        <div class="close-btn-link">
                            <i class="fa fa-close"></i>
                        </div>
                    </button>

                
                </div>
                <div>
                <div class="pl-3 pr-3" style="text-align:right;"> 
                    @if (session()->has('message') && session('message')==='create')
                        <div class="alert alert-success">
                        <button type="button" class="btn btn-close btn-sm" data-dismiss="alert" aria-label="Close"><i class="fa fa-close"></i></button>
                            کاربر به جلسه اضافه شد
                        </div>
                    @elseif(session()->has('message') && session('message')==='delete')
                        <div class="alert alert-warning">
                        <button type="button" class="btn btn-close btn-sm" data-dismiss="alert" aria-label="Close"><i class="fa fa-close"></i></button>
                            کاربر از جلسه حذف شد
                        </div>
                   
                    @endif
                 </div>
                    <h5 class="mx-3 mt-4 font-weight-bold font-16 text-right" style="font-size: 1rem">مخاطبین</h5>
                    <div class=" mr-1 " style="height: 80vh; overflow-y: scroll">
                        <div class="list-group list-contact2" id="chats" role="tablist">
                            <form action="">
                            	@foreach($contacts as $contact)
                                <div class="contact-select d-flex align-items-center justify-content-between">
                                    <a class=" d-flex py-3 px-1" data-toggle="list" role="tab">
                                        <img class="avatar-md" src="{{ asset('rv/img/avatars/profile.png') }}"
                                            data-toggle="tooltip" data-placement="top" title="Sarah" alt="avatar">
                                        <div class="data mr-3">
                                            <div class="user-contact">{{ $contact->username }}</div>
                                            <div class="text-muted text-right" style="font-size: .8rem">
                                                <span></span>
                                                <i>{{ $contact->phone }}</i>
                                            </div>
                                        </div>
                                    </a>
                                    <label class="checkbox" for="my_check_{{ $contact->id }}">
                                        <span class="checkbox__input">
                                            <input type="checkbox" wire:click="add_users_to_session({{ $contact->id }})" id="my_check_{{ $contact->id }}" >
                                            <span class="checkbox__control">
                                                <svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24'
                                                    aria-hidden="true" focusable="false">
                                                    <path fill='none' stroke='currentColor' stroke-width='3'
                                                        d='M1.73 12.91l6.37 6.37L22.79 4.59' />
                                                </svg>
                                            </span>
                                        </span>
                                    </label>
                                </div>
                                @endforeach
                               
                            </form>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('livewire.admin.addcontact')

</div>