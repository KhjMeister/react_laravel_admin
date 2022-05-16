<?php

namespace App\Http\Livewire\Client;

use Livewire\Component;
use App\Models\Contacts;
use App\Models\Session as Sessions;
use App\Models\Session_contact;
use Illuminate\Support\Facades\Auth;
use Livewire\WithPagination;

class HistoryMetting extends Component
{
    use WithPagination;
    public $search="";
    public $descAsc=false;
    public $ostadFlag ;
    public $editSessionFlag= false;
    
    public $session,$session_id,$start_time,$start_date;

    public function render()
    {
        return view('livewire.client.history-metting',[
            'allsessions'=>Sessions::where([
                ['u_id',$this->u_id],
                ['is_ended',1],
                ['name', 'like', '%'.$this->search.'%']
            ])->orderBy('start_date','desc')->paginate(100)
        ]);
    }
    
    public function mount()
    {
        $this->u_id = Auth::user()->id;
    }
    public function backTosessionList()
    {
        $this->editSessionFlag = False;
    }
    public function getAllSession()
    {
        $this->allsessions = Sessions::where([
            ['u_id',$this->u_id],
            ['is_ended',1],
            ['name', 'like', '%'.$this->search.'%']
        ])->orderBy('start_date','desc')->get();
    }
    public function editeSessionContacts($sid)
    {
        $this->editSessionFlag = True;
        $this->session_id =$sid;
        $this->session  = Sessions::find($sid);
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
            ['is_ended',1],
            ['name', 'like', '%'.$this->search.'%']
        ])->orderBy('start_date',$flag)->get();
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
    
}
