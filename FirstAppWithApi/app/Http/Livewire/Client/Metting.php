<?php

namespace App\Http\Livewire\Client;

use Livewire\Component;


use App\Models\Session;
use App\Models\Session_contact;
use App\Models\Contacts;
use \Morilog\Jalali\Jalalian;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class Metting extends Component
{
    public $is_time = 1; //1 for not started , 2 for started  , 3 for ended
    public $link,$now;
    public $s_id,$session,$start_date,$start_time,$sesscunt,$c_id,$contact,$username;
    public  $its_now_date,
            $its_now_time,
            $carbon_date_start,
            $carbon_date_now,
            $now_date_fa,
            $its_start_date,
            $its_start_time,
            $start_date_fa,
            $s_year,
            $s_month,
            $s_day;

    public $startBtn=False;
    public $endBtn=False;

    public $user_type=0;
    public $jitci_link,$is_started,$is_ended;
    public $otp_token;
    public $authenticated=False;
    public $ostad=False;

    public function render()
    {
        return view('livewire.client.metting');
    }
    public function mount()
    {
        if(Session::where([['sess_token','=',$this->link]])->first()){
            $this->session = Session::where([['sess_token','=',$this->link]])->first();
            // if( session('c_id')){
            //     $this->c_id = session('c_id');
            //     $this->authenticated=True;
            //     if(session('ostad')){
            //         $this->ostad = True;
            //     }
            // }
            $this->s_id = $this->session->id;
            $this->jitci_link = "https://video.videorayan.com/".$this->session->sess_token;
           
            $this->start_time = $this->session->start_time;
            $this->start_date = $this->session->start_date;
            $this->start_date = Jalalian::fromFormat('d/m/Y', $this->start_date)->toCarbon();

            
            $this->session_started();
           
        }else{
            return abort(404);
        }
    }
    public function sartSession()
    {
        Session::where('id',$this->s_id)->update([
            'is_started'   => 1,
        ]);
        $this->endBtn=True;
    }
    public function end_session()
    {       
        Session::where('id',$this->s_id)->update([
            'is_ended'     => 1
        ]);
        $this->dispatchBrowserEvent('alert',[
            'type'=>'success',
            'message'=>"جلسه با موفقیت پایان یافت !!"
        ]);

        $this->is_time = 3;
        
    }
    public function session_started()
    {
        $this->is_started = $this->session->is_started;
        $this->is_ended = $this->session->is_ended;

        if($this->is_started===0 and $this->is_ended===0)
        {
            $this->is_time = 1;
        }
        elseif($this->is_started===1 and $this->is_ended===0)
        {
            $this->is_time = 2;

        }elseif($this->is_started===1 and $this->is_ended===1)
        {
            $this->is_time = 3;
        }
        $this->setDate();
        $this->getStartTimes();
        
    }
    public function getStartTimes()
    {
        // if($this->carbon_date_start->isSameDay( $this->carbon_date_now) ){
        //     $this->shooo ="jsjjsjsjsj";
        // }
        
        $this->s_year   = Jalalian::fromDateTime(date('Y/m/d', strtotime($this->start_date)))->getYear();
        $this->s_month  = Jalalian::fromDateTime(date('Y/m/d', strtotime($this->start_date)))->getMonth();
        $this->s_day    = Jalalian::fromDateTime(date('Y/m/d', strtotime($this->start_date)))->getDay();
        $this->now_date_fa = $this->s_year.'/'.$this->s_month.'/'.$this->s_day;        
        
    }
    public function setDate()
    { 
        $this->session = Session::where([['sess_token','=',$this->link]])->first();

        $this->its_now_date = date('Y/m/d', strtotime(Carbon::now()));
        // $this->carbon_date_now =Carbon::parse($this->its_now_date);
        $this->its_now_time = date('H:i', strtotime(Carbon::now()));

        $this->its_start_date = date('Y/m/d', strtotime($this->start_date));
        // $this->carbon_date_start =Carbon::parse($this->its_start_date);
        $this->its_start_time = date('H:i', strtotime($this->start_time));    

        if($this->its_start_date == $this->its_now_date ){
            if($this->its_start_time == $this->its_now_time){
                $this->startBtn =True;
            }elseif($this->its_start_time <= $this->its_now_time){
                $this->startBtn =True;
            }elseif($this->its_start_time > $this->its_now_time){
                $this->startBtn =False;
            }
        }elseif($this->its_start_date > $this->its_now_date ){
                $this->startBtn =False;
        }
    }

    // public function setAuthSession()
    // {
    //     session()->flash('cid', $this->c_id);
    // }
    // public function setOstadSession()
    // {
    //     session()->flash('ostad', True);
    // }

    public function checkAuth()
    {
        // if(!session('c_id')){
            if($this->authenticated==False){
                $this->sesscunt = Session_contact::where([['s_id','=',$this->s_id]])->get();

                foreach ($this->sesscunt as $sess) {
                    
                    if($sess->token===$this->otp_token){
                        $this->authenticated=True;
                        $this->c_id = $sess->c_id;
                        if($sess->ostad_flag==1){
                            $this->ostad = True;
                            // $this->setOstadSession();
                        }
                        // $this->setAuthSession();
                    }
                }
            }
        // }else{
        //     $this->c_id = session('cid');
        //     $this->authenticated=True;
        //     if(session('ostad')){
        //         $this->ostad == True;
        //     }
        // }

        if($this->authenticated==False){
            $this->dispatchBrowserEvent('alert',[
                'type'=>'error',
                'message'=>"شما مجاز به ورود نمی باشید"
            ]);
        }else{
            $this->getOneContact();

            $this->dispatchBrowserEvent('alert',[
                'type'=>'success',
                'message'=>"خوش آمدید ".$this->username
            ]);
        }
        
    }

    public function getOneContact()
    {
        $this->contact = Contacts::where([['id',$this->c_id]])->first();
        $this->username= $this->contact->username;
    }

   


}
