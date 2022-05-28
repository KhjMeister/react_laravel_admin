<div class="container" >
        
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
                <div class="session-parent" wire:poll.1000ms="setDate">
                <div class="item-right-session" >
                
                    @if ($this->is_time == 3)
                    <h5> استاد عزیز جلسه  پایان یافته است .</h5>
                                
                    @else
                        @if($this->startBtn===False)
                                <h5> استاد عزیز جلسه شروع نشده است .</h5>
                                <p>  تاریخ و ساعت شروع جلسه {{ $this->its_start_time }}  -  {{ $this->now_date_fa }}</p>
                        @elseif($this->startBtn===True)
                            <h5> استاد عزیز </h5>
                            <p> با کلیک بر روی دکمه زیر جلسه را شروع نمایید </p> 
                            @if ($this->endBtn == True )
                                <button wire:click="end_session" class="metting-btn"> اتمام جلسه</button>
                                <a wire:click="sartSession" href="{{ $this->jitci_link }}" target="_blank" class="metting-btn"> برو به جلسه </a>
                            @elseif($this->endBtn == False)
                                <a wire:click="sartSession" href="{{ $this->jitci_link }}" target="_blank" class="metting-btn"> شروع جلسه </a>
                            @endif                                                      

                        @endif

                    @endif
                    
                    
                </div>
                <div class="item-left-session">
                    <img src="{{asset('client/assets/images/Work time-pana 2.png')}}">
                </div>
                </div>
            @else
                <div class="session-parent" wire:poll.1000ms="session_started">
                <div class="item-right-session">

                    @if($this->startBtn===False)
                            <h5> جلسه شروع نشده است .</h5>
                            <p>  تاریخ و ساعت شروع جلسه {{ $this->its_start_time }}  -  {{ $this->now_date_fa }}</p>
                    @elseif($this->startBtn===True)

                        @if ($this->is_time == 2 )
                            <h5> {{ $this->username }} عزیز </h5>
                            <p> با کلیک بر روی دکمه زیر وارد جلسه شوید </p> 
                            <a href="{{ $this->jitci_link }}" target="_blank" class="metting-btn"> ورود به جلسه </a>
                            
                        @elseif ($this->is_time == 1)
                            <h5> جلسه شروع نشده است .</h5>
                            <p>  تاریخ و ساعت شروع جلسه {{ $this->its_start_time }}  -  {{ $this->now_date_fa }}</p>
                        @elseif ($this->is_time == 3)
                            <h5> جلسه تمام شده است .</h5>
                        @endif
                            
                    @endif

                </div>
                <div class="item-left-session">
                    <img src="{{asset('client/assets/images/Work time-pana 2.png')}}">
                </div>
            </div>
            @endif
        @endif
</div>