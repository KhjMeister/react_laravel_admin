<div class="container" wire:poll.5000ms>
    @if ($this->authenticated==False)
        <div class="otp-parent">
            <div class="item-right-otp">
                <h5>کد احراز هویت</h5>
                <p> کد احراز هویت پیامک شده به گوشیتان را وارد نمایید</p>
                <form wire:submit.prevent="checkAuth">
                    <input wire:model="otp_token" name="otptoken" type="text">
                    <button type="submit" class="btn-otp">
                        تایید
                    </button>
                </form>
                
            </div>
            <div class="item-left-otp">
                <img src="{{asset('client/assets/images/Enter OTP-pana 1.png')}}">
            </div>
        </div>
    @else
        @if ($this->ostad==True)
            osatd
        @else
            <div class="session-parent">
              <div class="item-right-session">
              
             
                  <h5>جلسه شروع نشده است</h5>
                  <p> جلسه در روز چهارشنبه ساعت 8 شب برگزار خواهد شد.</p>
                 
              </div>
              <div class="item-left-session">
                  <img src="{{asset('client/assets/images/Work time-pana 2.png')}}">
              </div>
          </div>
        @endif
    @endif
</div>