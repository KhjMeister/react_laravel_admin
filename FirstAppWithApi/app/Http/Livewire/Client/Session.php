<?php

namespace App\Http\Livewire\Client;

use Livewire\Component;
use App\Models\User;
use App\Models\Category as Categories;
use App\Models\Contacts;
use App\Models\Session as Sessions;
use Illuminate\Support\Facades\Auth;
use Livewire\WithPagination;

class Session extends Component
{
    use WithPagination;

    public $createPart = 1;
    public $categories,$u_id;
    public $username,$phone,$semat;
    public $baseUrl = "http://localhost:8000/meetting/"; 
    public $search = '';
    public $session_type=0;
    public  $session_id,
            $jalase_type,
            $name,
            $sess_token,
            $video_link,
            $total_number,
            $end_at,
            $is_started,
            $is_ended,
            $start_time,
            $start_date;      

    protected $rules = [
        'name'       =>'required|min:4|unique:sessions',
        'start_time'  =>'required',
        'start_date'  =>'required',         
    ];

    protected $messages = [
        'name.required'         => 'عنوان جلسه را باید وارد کنید',
        'start_time.required'   => 'زمان شروع جلسه باید وارد شود',
        'start_date.required'   => 'تاریخ شروع جلسه باید وارد شود',
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
                'session_type' => $this->session_type,
                'start_time'   => $validatedData['start_time'],
                'start_date'   => $validatedData['start_date'],
                'sess_token'   => $this->sess_token,
                'video_link'   => $this->video_link,
                'total_number' => $this->total_number,
                'u_id'         => $this->u_id,
                'is_started'   => $this->is_started,
                'is_ended'     => $this->is_ended,
                'end_at'       => $this->end_at,
                'jalase_type'  => $this->jalase_type,
                ]);  
        }catch(\Exception $e){
            $this->dispatchBrowserEvent('alert',[
                'type'=>'error',
                'message'=>"مشکلی پیش آمده لطفا دوباره امتحان کنید!!"
            ]);
        }
    }

}
