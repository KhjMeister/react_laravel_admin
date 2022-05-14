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

    public function render()
    {
        return view('livewire.client.list-session',[
            'allsessions'=>Sessions::where([['u_id',$this->u_id],['is_ended',0],['name', 'like', '%'.$this->search.'%']])->paginate(100)
        ]);
    }
    
    public function mount()
    {
        $this->u_id = Auth::user()->id;
    }
}
