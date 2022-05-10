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
    public $categories,$cid,$name,$u_id;
    public $contact_id,$username,$phone,$semat,$ca_id;

    public  $session_id,
            $session,
            $allsessions,
            $sname,
            $sess_token,
            $video_link,
            $total_number,
            $end_at,
            $is_started,
            $is_ended,
            $start_time,
            $start_date;

    public $search = '';

    protected $rules = [
        'sname'=>'required|min:4|unique:sessions',
        'u_id'=>'required',
        'session_type'=>'required',
        'start_time'=>'required',
        'start_date'=>'required',
    ];

    protected $messages = [
        'sname.required' => 'عنوان جلسه را باید وارد کنید',
        'session_type.required' => 'نوع جلسه باید تعیین کنید',
        'start_time.required' => 'زمان شروع جلسه باید وارد شود',
        'start_date.required' => 'تاریخ شروع جلسه باید وارد شود',
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
    public function changeCreateStatus($id)
    {
        if($id===0){$this->createPart = 0;}
        elseif($id===1){$this->createPart = 1;}
        elseif($id===2){$this->createPart = 2;}
        elseif($id===3){$this->createPart = 3;}
    }

    // public function changeSessionState($type)
    // {
    //     if($type == 1 ){
    //         Sessions::where('id',$this->session_id)->update([
    //             'session_type' => 0
    //         ]);   
    //         $this->session_type= 0;
    //     }else{
    //         Sessions::where('id',$this->session_id)->update([
    //             'session_type' => 1
    //         ]); 
    //         $this->session_type = 1;
    //     }   
    // }

}
