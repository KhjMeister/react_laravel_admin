<?php

namespace App\Http\Livewire\Client;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use \Morilog\Jalali\Jalalian;
use Carbon\Carbon;

use App\Models\User;
use App\Models\Category as Categories;
use App\Models\Contacts;
use App\Models\Session as Sessions;
use App\Models\Session_contact;



class Calender extends Component
{
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
    public $start_date_en;

    public $allsessions, $selectedSessions;
    public $items = array() ;

    public function render()
    {
        return view('livewire.client.calender');
    }
    public function mount()
    {
        $this->u_id = Auth::user()->id;
        $this->getAllCategories();
        $this->allsessions = Sessions::where([['u_id',$this->u_id]])->get();
        
        foreach($this->allsessions as $sess){

            $sess->start_date = Jalalian::fromFormat('d/m/Y', $sess->start_date)->toCarbon();
            // $this->selectedSessions['id']   = $sess->id;
            // $this->selectedSessions['name']  = $sess->name;
            // $this->selectedSessions['start'] = $start_date;

            // $this->items = array($this->selectedSessions);

        }
    }
    public function getAllCategories()
    {
        $this->categories = Categories::where([
            ['u_id', '=', $this->u_id],
        ])->get();    
    }
}
