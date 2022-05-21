<?php

namespace App\Http\Livewire\Client;

use Livewire\Component;
use App\Models\Contacts;
use App\Models\Category as Categories;
use App\Models\Session as Sessions;
use App\Models\Session_contact;
use Illuminate\Support\Facades\Auth;
use Livewire\WithPagination;

class ListSession extends Component
{
    use WithPagination;
    public $level = 1;
    public $editSessionFlag= false;

    public $search="";
    public $descAsc=false;
    public $ostadFlag ;
    public $session_type,
           $jalase_type,
           $name,
           $sess_token,
           $video_link,
           $total_number,
           $end_at,
           $is_started,
           $is_ended,
           $session_id,
           $start_time,
           $start_date,
           $categories,
           $contacts;
    
    public $session;

    protected $rules = [
        'name'       =>'required|min:4',
        'start_time'  =>'required',
        'start_date'  =>'required|date_format:Y-m-d|after:yesterday',         
    ];

    protected $messages = [
        'name.required'         => 'عنوان جلسه را باید وارد کنید',
        'name.min'         => 'عنوان جلسه را باید بیشتر از 4 کاراکتر باشد',
        'start_time.required'   => 'زمان شروع جلسه باید وارد شود',
        'start_date.required'   => 'تاریخ شروع جلسه باید وارد شود',
        'start_date.after'   => 'تاریخ شروع جلسه باید از امروز به بعد باشد',
        'start_date.date_format'   => 'فرمت تاریخ اشتباه است',
        
    ];
    
    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function render()
    {
        return view('livewire.client.list-session',[
            'allsessions'=>Sessions::where([
                ['u_id',$this->u_id],
                ['is_ended',0],
                ['name', 'like', '%'.$this->search.'%']
            ])->orderBy('start_date','desc')->paginate(100)
        ]);
    }
    
    public function mount()
    {
        $this->u_id = Auth::user()->id;
        $this->getAllCategories();
        $this->getAllContacts();
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
    public function backTosessionList()
    {
        $this->editSessionFlag = False;
    }
    public function getAllSession()
    {
        $this->allsessions = Sessions::where([
            ['u_id',$this->u_id],
            ['is_ended',0],
            ['name', 'like', '%'.$this->search.'%']
        ])->orderBy('start_date','desc')->get();
    }
    public function editeSessionContacts($sid)
    {
        $this->editSessionFlag = True;
        $this->session_id =$sid;
        $this->session  = Sessions::find($sid);
        $this->session_type = $this->session->session_type;  
        $this->name = $this->session->name;  
        $this->start_time = $this->session->start_time;  
        $this->start_date = $this->session->start_date;  
        $this->video_link = $this->session->video_link;  
        
    }

    public function deleteSession($sid)
    {
        try{
            Sessions::find($sid)->delete();
            
            $this->getAllSession();
            
            $this->dispatchBrowserEvent('alert',[
                'type'=>'success',
                'message'=>"جلسه با موفقیت حذف شد!!"
            ]);
        }catch(\Exception $e){
            $this->dispatchBrowserEvent('alert',[
                'type'=>'error',
                'message'=>"مشکلی پیش آمده لطفا دوباره امتحان کنید!!"
            ]);
        }
    }
    public function funOstadFlag($cid)
    {
        $sesscont = Session_contact::where('c_id',$cid)->first();
        if($sesscont->ostad_flag==1)
        {
            return True;

        }else{
            return False;

        }
    }
    public function changeSessionState($type)
    {
        if($type == 1){ 
            $this->session_type= 0;
        }else{ 
            $this->session_type = 1;
        }   
    }
    public function updateSession()
    {
        $validatedData = $this->validate();
        try{
            // Sessions::create($validatedData);
            Sessions::find($this->session_id)->fill([
                'name'         => $validatedData['name'],
                'start_time'   => $validatedData['start_time'],
                'start_date'   => $validatedData['start_date'],
                'session_type' => $this->session_type,
                ])->save();

            $this->dispatchBrowserEvent('alert',[
                'type'=>'success',
                'message'=>"اطلاعات کلی جلسه ویرایش شد !!"
            ]);
            $this->level = 2;

        }catch(\Exception $e){
            $this->dispatchBrowserEvent('alert',[
                'type'=>'error',
                'message'=>"مشکلی پیش آمده لطفا دوباره امتحان کنید!!"
            ]);
        }
    }
    public function changOneFlag($cid,$ostadFlag,$s_id)
    {
        
        Session_contact::where([['c_id',$cid],['s_id',$s_id]])->update([
            'ostad_flag' => $ostadFlag
        ]); 
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
    public function getContactId($contact_id)
    {
        $var = Session_contact::where([['c_id',$contact_id],['s_id',$this->session_id]])->first();
        if(isset($var)){
            return  Session_contact::where([['c_id',$contact_id],['s_id',$this->session_id]])->first();
        }else{
            return  false;
        }
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
    
}
