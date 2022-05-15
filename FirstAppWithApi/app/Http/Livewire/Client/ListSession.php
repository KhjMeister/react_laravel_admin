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
    public $editSessionFlag= false;
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
        ])->get();
    }
    public function editeSessionContacts($sid)
    {
        $this->editSessionFlag = True;
        $this->session_id =$sid;
        $this->session  = Sessions::find($sid);
    }
        // foreach ($this->session->contacts as $contact) {
        // }

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
    // public function changeOstadFlag($cid)
    // {
    //     $flag =False;
    //     $lastcid=0;
    //     if(!$this->session_id==Null){
    //         $sesscont = Session_contact::where([['s_id',$this->session_id]])->get();
    //         try {
    //             foreach ($sesscont as $key ) {
    //                 if(!$key->ostad_flag==0){
    //                     $flag = True;
    //                     $lastcid=$key->c_id;
    //                     break;
    //                 }
    //             }
    //             if($flag==False){
    //                 $this->changOneFlag($cid,1,$this->session_id);
    //                 $this->dispatchBrowserEvent('alert',[
    //                     'type'=>'success',
    //                     'message'=>" استاد با موفقیت تعیین شد!!"
    //                 ]);
    //             }else{
    //                 $this->changOneFlag($cid,1,$this->session_id);
    //                 $this->changOneFlag($lastcid,0,$this->session_id);
    //                 $this->dispatchBrowserEvent('alert',[
    //                     'type'=>'success',
    //                     'message'=>" استاد با موفقیت تغییر کرد!!"
    //                 ]);
    //             }
    //         } catch (\Exception $e) {
    //             $this->dispatchBrowserEvent('alert',[
    //                 'type'=>'error',
    //                 'message'=>"مشکلی پیش آمده لطفا دوباره امتحان کنید!!"
    //             ]);
    //         }
            
    //     }
    // }
    // public function changOneFlag($cid,$ostadFlag,$s_id)
    // {
        
    //     Session_contact::where([['c_id',$cid],['s_id',$s_id]])->update([
    //         'ostad_flag' => $ostadFlag
    //     ]); 
    // }
}
