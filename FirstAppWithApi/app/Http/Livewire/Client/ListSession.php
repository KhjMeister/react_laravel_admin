<?php

namespace App\Http\Livewire\Client;

use Livewire\Component;
use App\Models\Contacts;
use App\Models\Session as Sessions;
use App\Models\Session_contact;
use Illuminate\Support\Facades\Auth;
use Livewire\WithPagination;

class ListSession extends Component
{
    use WithPagination;
    public $search="";
    public $descAsc=false;
    public $session,$session_id,$start_time,$start_date;
    

    public function render()
    {
        return view('livewire.client.list-session',[
            'allsessions'=>Sessions::where([
                ['u_id',$this->u_id],
                ['is_ended',0],
                ['name', 'like', '%'.$this->search.'%']
            ])->paginate(100)
        ]);
    }
    
    public function mount()
    {
        $this->u_id = Auth::user()->id;
    }
    public function getAllSession()
    {
        $this->allsessions = Sessions::where([
            ['u_id',$this->u_id],
            ['is_ended',0],
            ['name', 'like', '%'.$this->search.'%']
        ])->get();
    }
    public function editeSession($sid)
    {
        
    }
    public function getSessionsByAscOrDesc($flag)
    {
        if($flag=="asc"){
            $this->descAsc =True;
        }else{
            $this->descAsc =False;
        }
        $this->allsessions = Sessions::where([
            ['u_id',$this->u_id],
            ['is_ended',0],
            ['name', 'like', '%'.$this->search.'%']
        ])->orderBy('start_date',$flag)->get();
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
}
