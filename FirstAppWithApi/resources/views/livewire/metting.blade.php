<div >
  @if($this->auth==0)
    
    <div class="bg-light" >
        <div class="box-security">
            @if (session()->has('message') && session('message')==='notInvite')
                <div class="alert alert-danger " style="margin-buttom:10px;">
                    کد شما اشتباه می باشد
                </div>
            @endif
            <div class="col-12 text-center">
                <img src="{{ asset('rv/img/enter.png') }}" class="img-security" alt="احزار هویت">
            </div>
        
            <form class="form-security col-12">
                <h6 class="h6 text-center text-black margin-top">احزار هویت</h6>
                <input name="token" type="text" class="form-control input-security margin-top" wire:model="token" placeholder="کد احزار هویت خود را وارد نمایید">
                <button type="button" wire:click.prevent="is_authenticate()" class="btn margin-top btn-security">تایید</button>
            </form>
        </div>
    </div>
    @elseif($this->auth==1)

    <div class="container">
        
          <div class="row" >
              <div class="col-lg-7 m-auto">
                  <img class="img-fluid  imgloginmeeting" src="{{ asset('rv/img/work.png') }}">
              </div>
              <div class="col-lg-5 text-right mright">
                @if($this->is_time === 1)
                  <h2 class="fw-bold textsectionright">
                      جلسه شروع نشده است
                  </h2>
                  
                  <h6 class="fw-bold mt-3 textsectionright2">
                     جلسه از تاریخ {{ $this->session->started_at }}
                      <br>
                    تا تاریخ {{ $this->session->end_at }} برگزار می گردد
                  </h6>
                @elseif($this->is_time === 2)
                  <a class="mt-3 buttonlogin" href="{{ $this->jitci_link }}" target="_blank">
                        پیوستن به جلسه 
                  </a>
                @elseif($this->is_time === 3)
                <h2 class="fw-bold textsectionright">
                      جلسه تمام شده است
                  </h2>
                @endif
              </div>
              
          </div>
      </div>
    @elseif($this->auth==2)
        <div class="container">
            @if (session()->has('message') && session('message')==='ended_session')
                <div class="alert alert-warning " style="margin-buttom:10px;">
                  جلسه تمام شد
                </div>
            @endif
            <div class="row" >
                <div class="col-lg-7 m-auto">
                    <img class="img-fluid  imgloginmeeting" src="{{ asset('rv/img/work.png') }}">
                </div>
                <div class="col-lg-5 text-right mright">
                    <h2 class="fw-bold textsectionright">
                        خوش آمدید {{ $user->name }} 
                    </h2>
                    <br>
                    <br>
                   @if($this->start_btn and !$this->end_btn)
                    <a wire:click="start_session()" class="mt-3 buttonlogin" href="{{ $this->jitci_link }}" target="_blank">
                        شروع جلسه
                    </a>

                    @elseif(!$this->start_btn and $this->end_btn)
                    <a  class="mt-3 buttonlogin ml-1" href="{{ $this->jitci_link }}" target="_blank">
                        پیوستن به جلسه
                    </a>

                    <a wire:click="end_session()" class="mt-3 buttonlogin" >
                         اتمام جلسه
                    </a>
                    @elseif(!$this->start_btn and !$this->end_btn)
                    <h2 class="fw-bold textsectionright">
                        جلسه تمام شده است
                    </h2>
                    @endif
                </div>
                
            </div>
        </div>
    @endif
</div>
