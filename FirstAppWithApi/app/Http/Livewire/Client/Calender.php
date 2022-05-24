<?php

namespace App\Http\Livewire\Client;

use Livewire\Component;
use App\Models\Session as Sessions;
use Illuminate\Support\Facades\Auth;
use \Morilog\Jalali\Jalalian;
use Carbon\Carbon;

class Calender extends Component
{
    public $allsessions, $selectedSessions;
    public $items = array() ;

    public function render()
    {
        return view('livewire.client.calender');
    }
    public function mount()
    {
        $this->u_id = Auth::user()->id;
        $this->allsessions = Sessions::where([['u_id',$this->u_id]])->get();
        
        // foreach($this->allsessions as $sess){

        //     $start_date = Jalalian::fromFormat('d/m/Y', $sess->start_date)->toCarbon();
        //     $this->selectedSessions['id']   = $sess->id;
        //     $this->selectedSessions['name']  = $sess->name;
        //     $this->selectedSessions['start'] = $start_date;

        //     $this->items = array($this->selectedSessions);

        // }
    }
}
