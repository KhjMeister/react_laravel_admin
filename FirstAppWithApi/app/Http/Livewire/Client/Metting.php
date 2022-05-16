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
    
    public $link,$now;
    public $s_id,$session,$start_date,$start_time,$sesscunt,$c_id,$contact,$username;
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
            if( session('c_id')){
                $this->c_id = session('c_id');
                $this->authenticated=True;
                if(session('ostad')){
                    $this->ostad = True;
                }
            }
            $this->s_id = $this->session->id;
            $this->jitci_link = "https://192.168.100.100:8081/".$this->session->sess_token;
            $this->is_started = $this->session->is_started;
            $this->is_ended = $this->session->is_ended;
            $this->start_time = $this->session->start_time;
            $this->start_date = $this->session->start_date;
        }else{
            return abort(404);
        }
    }
    public function setAuthSession()
    {
        session()->flash('cid', $this->c_id);
    }
    public function setOstadSession()
    {
        session()->flash('ostad', True);
    }

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
                            $this->setOstadSession();
                        }
                        $this->setAuthSession();

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
