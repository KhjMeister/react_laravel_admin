<?php

namespace App\Http\Livewire\Client;

use Livewire\Component;
use App\Models\Contacts;
use App\Models\Category as Categories;
use App\Models\Session as Sessions;
use App\Models\Session_contact;
use Illuminate\Support\Facades\Auth;
use Livewire\WithPagination;
use \Morilog\Jalali\Jalalian;

use SoapClient;

class ListSession extends Component
{
    use WithPagination;
    protected $paginationTheme = 'simple-tailwind';

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
           $contacts,
           $del_id;
    public $start_date_en;
    public $session;

    public $delModal ='display:none;' ;   


    protected $rules = [
        'name'       =>'required|min:4',
        'start_time'  =>'required',
        'start_date'  =>'required|date_format:d/m/Y',         
    ];
    protected $listeners = [
        'backToListChild' => 'backToList',
        'showDeleteModal' => 'showDeleteModal',
        'closeDeleteModal' => 'closeDeleteModal',
];

    protected $messages = [
        'name.required'         => 'عنوان جلسه را باید وارد کنید',
        'name.min'         => 'عنوان جلسه را باید بیشتر از 4 کاراکتر باشد',
        'start_time.required'   => 'زمان شروع جلسه باید وارد شود',
        'start_date.required'   => 'تاریخ شروع جلسه باید وارد شود',
        'start_date.after'   => 'تاریخ شروع جلسه باید از امروز به بعد باشد',
        'start_date.date_format'   => 'فرمت تاریخ اشتباه است',
        
    ];
    public function showDeleteModal()
    {
        $this->delModal = 'display:block;';
    }
    public function closeDeleteModal()
    {
        $this->delModal = 'display:none;';
    }
    public function backToList()
    {
        $this->editSessionFlag = false;
    }
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
            ])->orderBy('start_date','desc')->paginate(6)
        ]);
    }
    
    public function mount()
    {
        $this->u_id = Auth::user()->id;
        
        // $this->getAllContacts();
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

    public function modalDeleteSession($sid)
    {
        $this->showDeleteModal();
        $this->del_id = $sid;
        $this->name = Sessions::find($this->del_id)->name;
    }

    public function deleteSession()
    {
        try{
            Sessions::find($this->del_id)->delete();
            
            // $this->getAllSession();
            
            $this->closeDeleteModal();
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
    
   
    
}
