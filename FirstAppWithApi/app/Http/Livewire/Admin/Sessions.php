<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\User;
use App\Models\Contacts;
use App\Models\Session;
use App\Models\session_contact;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class Sessions extends Component
{
    public  $session_id,
            $session,
            $allsessions,
            $name,
            $sess_token,
            $video_link,
            $total_number,
            $session_type,
            $started_at,
            $end_at,
            $user_id,
            $user,
            $candidate_contacts;
    public $baseUrl = "http://localhost:8000/meetting/"; 

    public $search = '';

	public function mount()
    {   
        $this->user_id = Auth::user()->id;
        $this->user    = User::find($this->user_id)->first();
        
    
        $this->createSession();
    }

    
    public function render()
    {
        return view('livewire.admin.sessions',[
            'contacts'=> Contacts::where([
                    ['u_id', '=', $this->user_id],
                    ['username', 'like', '%'.$this->search.'%'],
                ])->get()
        ]);
    }

    public function createSession()
    {
        
        // $testid = Session::where([['name','=','test'],['is_ended','=',0],['is_started','=',0]])->first();
        // if($testid){
        //     $this->session_id = $testid->id;
        //     $this->getCurrentSession();
        //     $this->setCurrentInfo();
        // }else{
            $this->name        = "test";
            $this->total_number= 1;
            $this->session_type= false;
            $this->started_at  = "";
            $this->end_at      = "" ;
            $this->is_ended    =  0;
            $this->is_started  =  0;
            $this->sess_token  = Str::random(20);
            $this->video_link  = $this->baseUrl.$this->sess_token;

            $validdata = $this->validate([
                'name' => ['required', 'string', 'max:255'], 
            ]);
            
            $this->session_id = DB::table('sessions')->insertGetId([ 
                'name'         =>  $validdata['name'],
                'sess_token'   => $this->sess_token,
                'video_link'   => $this->baseUrl. $this->sess_token,
                'total_number' => $this->total_number,
                'session_type' => $this->session_type,
                'u_id'         => $this->user_id,
                'is_started'   => $this->is_started,
                'is_ended'     => $this->is_ended,
                'started_at'   => $this->started_at,
                'end_at'       => $this->end_at,
                ]);        

                // $this->getCurrentSession();
                // $this->setCurrentInfo();
        // }
    }  
    public function getCurrentSession()
    {
        $this->session = Session::find($this->session_id)->first();
    }

    public function setCurrentInfo()
    {
        $this->name         = $this->session->name;
        $this->total_number = $this->session->total_number;
        $this->session_type = $this->session->session_type;
        $this->started_at   = $this->session->started_at;
        $this->end_at       = $this->session->end_at;
        $this->sess_token   = $this->session->sess_token;
        $this->video_link   = $this->session->video_link;
        $this->is_started   = $this->session->is_started;
        $this->is_ended     = $this->session->is_ended;
    }
    public function getContactId($contact_id)
    {
        $var = session_contact::where([['c_id',$contact_id],['s_id',$this->session_id]])->first();
        if(isset($var)){
            return  session_contact::where([['c_id',$contact_id],['s_id',$this->session_id]])->first();
        }else{
            return  false;
        }
    }
    public function add_users_to_session($contact_id)
    {
        if($sc = $this->getContactId($contact_id)){
            session_contact::find($sc->id)->delete();
            $this->total_number -= 1;
            session()->flash('message', 'delete');
        }else{
            session_contact::create([
            'c_id'       => $contact_id,
            's_id'       => $this->session_id,
            'token'      => rand(11111, 99999),
            'sms_status' => 0
            ]);
            $this->total_number += 1;
            
            session()->flash('message', 'create');
            
        }
    }

    public function changeSessionState($type)
    {
        if($type == 1 ){
            Session::where('id',$this->session_id)->update([
                'session_type' => 0
            ]);   
            $this->session_type= 0;
        }else{
            Session::where('id',$this->session_id)->update([
                'session_type' => 1
            ]); 
            $this->session_type = 1;
        }   
    }
    public function zakhire()
    {
        // $validdata = $this->validate([
            // 'name'     => ['required', 'string', 'max:255'], 
            // 'started_at' =>['required'],
            // 'end_at'   =>['required']
        // ]);
        
        Session::where('id',$this->session_id)->update([
            'name'         => $this->name,
            'sess_token'   => $this->sess_token,
            'video_link'   => $this->video_link,
            'total_number' => $this->total_number,
            'session_type' => $this->session_type,
            'started_at'   => $this->started_at,
            'end_at'       => $this->end_at,
            'u_id'         => $this->user_id,
            
        ]);
    }

    public function sendMessage()
    {
        $this->zakhire();
        $this->getThisSessionContacts();

        try 
        {
            
            foreach ($this->candidate_contacts as $key ) {

                if($this->session_type === 0){

                    $message = "شما به جلسه ".$this->name."دعوت شدید \n"."لینک :".$this->video_link;
                }else{
                    $message = "شما به جلسه ".$this->name."دعوت شدید \n"."لینک :".$this->video_link ."\n کد احراز هویت شما: ".$key->token;
    
                }
                $lineNumber = "210002100";
                $receptor = Contacts::where('id',$key->c_id)->first()->phone;
                // dump($receptor);
                $api = new \Ghasedak\GhasedakApi('d33ec578d69afed02d099a74f507fc10e675241a7b9554f6e19755825347f1ca');
                $api->SendSimple($receptor,$message,$lineNumber);
                
            } 
            
            session()->flash('message', 'sendMessage');
        }
        catch(\Ghasedak\Exceptions\ApiException $e){
            echo $e->errorMessage();
        }
        catch(\Ghasedak\Exceptions\HttpException $e){
            echo $e->errorMessage();
        }     
    }

    public function getThisSessionContacts()
    {
        $this->candidate_contacts = session_contact::where('s_id',$this->session_id)->get();
    }

    
}
