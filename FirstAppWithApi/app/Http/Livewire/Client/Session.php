<?php

namespace App\Http\Livewire\Client;

use Livewire\Component;
use App\Models\User;
use App\Models\Category as Categories;
use App\Models\Contacts;
use App\Models\Session as Sessions;
use App\Models\Session_contact;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Livewire\WithPagination;
use SoapClient;

class Session extends Component
{
    use WithPagination;

    public $createPart = 0;
    public $level = 2;
    public $categories,$u_id;
    public $candidate_contacts,$username,$phone,$semat;
    public $baseUrl = "http://localhost:8000/metting/"; 
    public $search = '';
    public $session_type=0;
    public $session_id,
           $jalase_type,
           $name,
           $sess_token,
           $video_link,
           $total_number,
           $end_at,
           $is_started,
           $is_ended,
           $start_time,
           $start_date,
           $thisSession;      
    public $searchContact = '';
    protected $rules = [
        'name'       =>'required|min:4|unique:sessions',
        'start_time'  =>'required',
        'start_date'  =>'required|date_format:Y-m-d|after:yesterday',         
    ];

    protected $messages = [
        'name.required'         => 'عنوان جلسه را باید وارد کنید',
        'name.min'         => 'عنوان جلسه را باید بیشتر از 4 کاراکتر باشد',
        'name.unique'         => 'عنوان جلسه  نباید تکراری باشد',
        'start_time.required'   => 'زمان شروع جلسه باید وارد شود',
        'start_date.required'   => 'تاریخ شروع جلسه باید وارد شود',
        'start_date.after'   => 'تاریخ شروع جلسه باید از امروز به بعد باشد',
        'start_date.date_format'   => 'فرمت تاریخ اشتباه است',
    ];

    public function render()
    {
        return view('livewire.client.session',[
            'contacts' => Contacts::where([
                    ['u_id', '=', $this->u_id],
                    ['username', 'like', '%'.$this->search.'%']
                ])->orWhere([
                    ['u_id', '=', $this->u_id],
                    ['phone', 'like', '%'.$this->search.'%']
                ])->orWhere([
                    ['u_id', '=', $this->u_id],
                    ['semat', 'like', '%'.$this->search.'%']
                ])->paginate(100)
        ]);
    }
    
    public function mount()
    {
        $this->u_id = Auth::user()->id;
        $this->getAllCategories();
    }
    public function getThisSession()
    {
        $this->thisSession = Sessions::where([
            ['id',$this->session_id],
        ])->first();
    }
    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function changeCreateStatus($id)
    {
        if    ($id===0){$this->createPart = 0;}
        elseif($id===1){$this->createPart = 1;}
        elseif($id===2){$this->createPart = 2;}
        elseif($id===3){$this->createPart = 3;}
    }

    public function changeSessionState($type)
    {
        if($type == 1){ 
            $this->session_type= 0;
        }else{ 
            $this->session_type = 1;
        }   
    }

    public function createSession(){
        $this->sess_token  = Str::random(20);
        $this->video_link  = $this->baseUrl.$this->sess_token;
        $this->total_number= 1;
        $this->end_at      = "";
        $this->is_ended    =  0;
        $this->is_started  =  0;
        $this->jalase_type =  1;
        $validatedData = $this->validate();
        try{
            // Sessions::create($validatedData);
            $this->session_id = DB::table('sessions')->insertGetId([ 
                'name'         =>  $validatedData['name'],
                'start_time'   => $validatedData['start_time'],
                'start_date'   => $validatedData['start_date'],
                'session_type' => $this->session_type,
                'sess_token'   => $this->sess_token,
                'video_link'   => $this->video_link,
                'total_number' => $this->total_number,
                'u_id'         => $this->u_id,
                'is_started'   => $this->is_started,
                'is_ended'     => $this->is_ended,
                'end_at'       => $this->end_at,
                'jalase_type'  => $this->jalase_type,
                ]);  

            $this->dispatchBrowserEvent('alert',[
                'type'=>'success',
                'message'=>"جلسه ایجاد شد مخاطبانتان را اضافه کنید"
            ]);
            $this->level = 2;

        }catch(\Exception $e){
            $this->dispatchBrowserEvent('alert',[
                'type'=>'error',
                'message'=>"مشکلی پیش آمده لطفا دوباره امتحان کنید!!"
            ]);
        }
        $this->getThisSession();

    }

    public function getAllContacts()
    {
        $this->contacts = Contacts::where([
            ['u_id', '=', $this->u_id],
            ['username', 'like', '%'.$this->search.'%']
        ])->orWhere([
            ['u_id', '=', $this->u_id],
            ['phone', 'like', '%'.$this->search.'%']
        ])->orWhere([
            ['u_id', '=', $this->u_id],
            ['semat', 'like', '%'.$this->search.'%']
        ])->get();  
    }
    public function selectedCategory($id)
    {
        $this->contacts = Categories::find($id)->contacts;
    }
    public function getAllCategories()
    {
        $this->categories = Categories::where([
            ['u_id', '=', $this->u_id],
        ])->get();    
    }

    public function addUsersToSession($contact_id)
    {
        if($sc = $this->getContactId($contact_id)){
            Session_contact::find($sc->id)->delete();
            $this->total_number -= 1;
            $this->dispatchBrowserEvent('alert',[
                'type'=>'success',
                'message'=>"مخاطب از جلسه حذف شد"
            ]);
            
        }else{
            Session_contact::create([
            'c_id'       => $contact_id,
            's_id'       => $this->session_id,
            'token'      => rand(11111, 99999),
            'sms_status' => 0
            ]);
            $this->total_number += 1;     
            $this->dispatchBrowserEvent('alert',[
                'type'=>'success',
                'message'=>"مخاطب به جلسه اضافه شد"
            ]);       
        }
    }
    public function getContactId($contact_id)
    {
        $var = Session_contact::where([['c_id',$contact_id],['s_id',$this->session_id]])->first();
        if(isset($var)){
            return  Session_contact::where([['c_id',$contact_id],['s_id',$this->session_id]])->first();
        }else{
            return  false;
        }
    }

    public function changeToSendMessages()
    {
        $this->level = 3;
        $this->getThisSessionContacts();
       
    }

    public function changeOstadFlag($cid)
    {
        $flag =False;
        $lastcid=0;
        if(!$this->session_id==Null){
            $sesscont = Session_contact::where([['s_id',$this->session_id]])->get();
            try {
                foreach ($sesscont as $key ) {
                    if(!$key->ostad_flag==0){
                        $flag = True;
                        $lastcid=$key->c_id;
                        break;
                    }
                }
                if($flag==False){
                    $this->changOneFlag($cid,1,$this->session_id);
                    $this->dispatchBrowserEvent('alert',[
                        'type'=>'success',
                        'message'=>"استاد تعیین شد !!"
                    ]);
                }else{
                    $this->changOneFlag($cid,1,$this->session_id);
                    $this->changOneFlag($lastcid,0,$this->session_id);
                    $this->dispatchBrowserEvent('alert',[
                        'type'=>'success',
                        'message'=>"استاد تغییر کرد!!"
                    ]);
                }
            } catch (\Exception $e) {
                $this->dispatchBrowserEvent('alert',[
                    'type'=>'error',
                    'message'=>"مشکلی پیش آمده لطفا دوباره امتحان کنید!!"
                ]);
            }
            
        }
    }

    public function changOneFlag($cid,$ostadFlag,$s_id)
    {
        
        Session_contact::where([['c_id',$cid],['s_id',$s_id]])->update([
            'ostad_flag' => $ostadFlag
        ]); 
    }
    public function sendMessageToContacts()
    {
        $allreadySended = true;
        // $apiKey = "1GZLY56f6u34CdC4G-7YG4KIqwn9xLcRZdRqtzcniaE=";
        // $client = new \IPPanel\Client($apiKey);
        $client = new SoapClient("http://ippanel.com/class/sms/wsdlservice/server.php?wsdl");

            foreach ($this->candidate_contacts as $key ) {
                // $message = "با سلام شما به جلسه ".$this->thisSession->name." دعوت شده اید.لینک دعوت شما ".$this->video_link." می باشد و همچنین کد احراز هویت شما ".$key->token." می باشد. با تشکر ویدیو رایان";
                if($key->sms_status==0){
                    $receptor = Contacts::where('id',$key->c_id)->first()->phone;
                    $usersms = "09153257202"; 
                    $passsms = "123deamond"; 
                    $fromNum = "+9850002040325721"; 
                    $toNum = array($receptor); 
                    // // // array_push($toNum,  );
                    $pattern_code = "vungc8h5x1jgg9z"; 
                    $input_data = array( "jalaseName" => $this->thisSession->name,
                                        "JalaseUrl"  => $this->video_link,
                                        "verificationCode" => $key->token
                                        ); 
                    $client->sendPatternSms($fromNum,$toNum,$usersms,$passsms,$pattern_code,$input_data);
                    $this->changeSmsStatus($key->id);
                    
                }
               

            }
                // $patternValues = [
                //     "jalaseName" => $this->thisSession->name,
                //     "JalaseUrl"  => $this->video_link,
                //     "verificationCode" => $key->token
                // ];

                // $bulkID = $client->sendPattern(
                //     "vungc8h5x1jgg9z",  
                //     "+98100009",      
                //     $toNum,  
                //     $patternValues,  
                // );
             
                // $apiKey = "1GZLY56f6u34CdC4G-7YG4KIqwn9xLcRZdRqtzcniaE=";
               
            
                
            $this->dispatchBrowserEvent('alert',[
                'type'=>'success',
                'message'=>"پیام به مخاطبانتان ارسال شد!"
            ]);
       
    }
    public function getThisSessionContacts()
    {
        $this->candidate_contacts = Session_contact::where('s_id',$this->session_id)->get();
    }

    public function changeSmsStatus($id)
    {
        Session_contact::where([['id',$id]])->update([
            'sms_status' => 1
        ]); 
    }
}
