<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Session;
use App\Models\session_contact;
use App\Models\Contacts;
use \Morilog\Jalali\Jalalian;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Models\User;



class Metting extends Component
{
    public $jitci_link ;
    public $start_btn =1,$end_btn=0;
    public $is_time = 1; //1 for not started, 2 for started , 3 for ended
    public $its_now;
    public $s_year,$s_month,$s_day,$s_hour,$s_minute,$s_second;
    public $e_year,$e_month,$e_day,$e_hour,$e_minute,$e_second;
    public $n_year,$n_month,$n_day,$n_hour,$n_minute,$n_second;

    public $link,$token,$is_strted,$is_ended;

    public $user,$user_id;

    public $sess_token = null;

    public $session = null;

    public $auth = 0;

    public $contact_id;

    public $contact = null;

    protected $started_at;
    protected $end_at;
    protected $now;

    

    public function mount()
    {
        if(Session::where([['sess_token','=',$this->link]])->first()){
            $this->session = Session::where([['sess_token','=',$this->link]])->first();
        }else{
            return abort(404);
        }

        $this->jitci_link = "https://192.168.100.100:8081/".$this->session->sess_token;
        $this->is_started = $this->session->is_started;
        $this->is_ended = $this->session->is_ended;

        if($this->is_started and $this->is_ended) {
            $this->start_btn = 0;
            $this->end_btn = 0;
        }
        

        $this->auth_if_session_public();
        $this->setDate();
        $this->session_started();  
        if(Auth::user()){
            $this->user_id = Auth::user()->id;
            $this->user    = User::find($this->user_id)->first();
            $this->check_creator();
        }
    }
    public function check_creator()
    {
        if($this->session->u_id=== $this->user_id){
            $this->auth = 2;
        }
    }
    public function setDate()
    {
        
         
        // $this->s_year   = Jalalian::fromDateTime(date('d/M/Y H:i:s', strtotime($this->session->started_at)))->getYear();
        // $this->s_month  = Jalalian::fromDateTime(date('d/M/Y H:i:s', strtotime($this->session->started_at)))->getMonth();
        // $this->s_day    = Jalalian::fromDateTime(date('d/M/Y H:i:s', strtotime($this->session->started_at)))->getDay();
        // $this->s_hour   = Jalalian::fromDateTime(date('d/M/Y H:i:s', strtotime($this->session->started_at)))->getHour();
        // $this->s_minute = Jalalian::fromDateTime(date('d/M/Y H:i:s', strtotime($this->session->started_at)))->getMinute();
        // $this->s_second = Jalalian::fromDateTime(date('d/M/Y H:i:s', strtotime($this->session->started_at)))->getSecond();
        
        // $this->e_year   = Jalalian::fromDateTime(date('d/M/Y H:i:s', strtotime($this->session->end_at)))->getYear();
        // $this->e_month  = Jalalian::fromDateTime(date('d/M/Y H:i:s', strtotime($this->session->end_at)))->getMonth();
        // $this->e_day    = Jalalian::fromDateTime(date('d/M/Y H:i:s', strtotime($this->session->end_at)))->getDay();
        // $this->e_hour   = Jalalian::fromDateTime(date('d/M/Y H:i:s', strtotime($this->session->end_at)))->getHour();
        // $this->e_minute = Jalalian::fromDateTime(date('d/M/Y H:i:s', strtotime($this->session->end_at)))->getMinute();
        // $this->e_second = Jalalian::fromDateTime(date('d/M/Y H:i:s', strtotime($this->session->end_at)))->getSecond();
        
        $this->n_year   = Jalalian::fromDateTime(Carbon::now())->getYear();
        $this->n_month  = Jalalian::fromDateTime(Carbon::now())->getMonth();
        $this->n_day    = Jalalian::fromDateTime(Carbon::now())->getDay();
        $this->n_hour   = Jalalian::fromDateTime(Carbon::now())->getHour();
        $this->n_minute = Jalalian::fromDateTime(Carbon::now())->getMinute();
        $this->n_second = Jalalian::fromDateTime(Carbon::now())->getSecond();

        $this->its_now = $this->n_year.'/'.$this->n_month.'/'.$this->n_day.'--'.$this->n_hour.':'.$this->n_minute.':'.$this->n_second;

       

    }
    public function session_started()
    {
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

        // if( $this->n_hour === $this->s_hour and $this->n_hour <= $this->e_hour ){
        //     if( $this->n_minute === $this->s_minute ){
        //         $this->is_time = 2;      
        //     }elseif($this->n_minute > $this->s_minute and $this->n_minute <= $this->e_minute){
        //         $this->is_time = 2;
        //     }elseif($this->n_minute > $this->s_minute and  $this->n_minute > $this->e_minute){
        //         $this->is_time = 3;
        //     }else{
        //         $this->is_time = 1;  
        //     }
        // }elseif( $this->n_hour > $this->s_hour and  $this->n_hour <= $this->e_hour){
        //     if( $this->n_minute > $this->s_minute and  $this->n_minute <= $this->e_minute){
        //         $this->is_time = 2;      
        //     }elseif($this->n_minute > $this->s_minute and  $this->n_minute > $this->e_minute){
        //         $this->is_time = 3;
        //     }
        // }elseif($this->n_hour < $this->s_hour and  $this->n_hour < $this->e_hour){
        //     $this->is_time = 1;  
        // }

    }
    public function auth_if_session_public()
    {
        if(!$this->session->session_type){
            $this->auth = 1;
        }
    }

    public function is_authenticate()
    {
        
        $this->sess_token = session_contact::where([['token','=',$this->token]])->first();
        
        if($this->sess_token)
        {
            if($this->sess_token->token == $this->token)
            {
                $this->auth = 1;
                $this->contact_id = $this->sess_token->c_id;
                $this->getContact();
            }else
            {
                session()->flash('message', 'notInvite');
            }
        }else
        {
            session()->flash('message', 'notInvite');
        }

    }
    public function start_session()
    {
        $this->start_btn = 0;
        $this->end_btn   = 1;
       
        Session::where('id',$this->session->id)->update([
            'is_started'   => 1,
            'is_ended'     => 0,
        ]);
    }
    public function end_session()
    {
        $this->start_btn = 0;
        $this->end_btn   = 0;
       
        Session::where('id',$this->session->id)->update([
            'is_started'   => 1,
            'is_ended'     => 1,
            'end_at'     => $this->its_now,
        ]);
        session()->flash('message', 'ended_session');
    }

    public function getContact()
    {
        $this->contact = Contacts::find($this->contact_id);
    }
    public function render()
    {
        return view('livewire.metting');
    }
}
