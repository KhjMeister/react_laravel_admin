<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\User;
use App\Models\Contacts;
use App\Models\Session;
use Illuminate\Support\Facades\Auth;
use Livewire\WithPagination;


class Users extends Component
{
    // use WithPagination;
    // protected $paginationTheme = 'bootstrap';
    public     $contacts,$contact , $user, $user_id,$allsessions,$thisUserSession;
    public     $phone, $username, $semat;

    public $search = '';

    public function mount()
    {
        $this->user_id = Auth::user()->id;
        $this->user    = User::find($this->user_id)->first();
        $this->allsessions = $this->getendedSession();
        $this->thisUserSession =$this->getnotEndedSessions();
        
        $this->GetOnline_contacts();

    }
    public function updatingSearch()
    {
        $this->resetPage();
    }
    public function getnotEndedSessions()
    {
        if(Session::where([['u_id',$this->user_id],['is_ended',0]])->get())
            return Session::where([['u_id',$this->user_id],['is_ended',0]])->get();
        else
            return False; 
    }
    public function getendedSession()
    {
        if(Session::where([['u_id',$this->user_id],['is_ended',1]])->get())
            return Session::where([['u_id',$this->user_id],['is_ended',1]])->get();
        else
            return False; 
    }
    public function render()
    {
        return view('livewire.admin.users',[
            'contacts'=> Contacts::where([
                    ['u_id', '=', $this->user_id],
                    ['username', 'like', '%'.$this->search.'%'],
                ])->get()
            
        ]);
        // [
        //     'users'=> USSer::where([
        //         ['role','!=','admin'],
        //         ['name', 'like', '%'.$this->search.'%'],
        //     ])->orWhere([
        //         ['role','!=','admin'],
        //         ['phone', 'like', '%'.$this->search.'%'],
        //     ])->orWhere([
        //         ['role','!=','admin'],
        //         ['email', 'like', '%'.$this->search.'%'],
        //     ])->paginate(3)
        // ]
    }
    public function GetOnline_contacts()
    {
        $this->contacts = Contacts::where([
            ['u_id', '=', $this->user_id], 
            ['username', 'like', '%'.$this->search.'%'],
        ])->get();
    }

    public function storeContact()
    {
        $validatedDate = $this->validate([
            'username' => ['required', 'string', 'max:255','unique:Contacts'], 
            'phone' => ['required', 'string', 'max:255','unique:Contacts'],
            'semat' => ['required', 'string', 'max:255'],
        ]);
        Contacts::create([
            'username' => $validatedDate['username'],
            'phone' => $validatedDate['phone'],
            'semat' => $validatedDate['semat'],
            'u_id' => $this->user_id,
            'created_at' => now()
       ]);

       $this->GetOnline_contacts();
       $this->resetForm();
    }

    public function resetForm()
    {
        $this->phone = '';
        $this->username = '';
        $this->semat = '';
    }

    public function getOneContact($id)
    {
        $this->resetForm();
        $this->contact = Contacts::find($id);
        $this->phone = $this->contact->phone;
        $this->username = $this->contact->username;
        $this->semat = $this->contact->semat;
    }

    public function deleteContact($id)
    {
        Contacts::find($id)->delete();
        $this->resetForm();
        $this->GetOnline_contacts();
    }

    public function updateContact()
    {
        $cont = Contacts::find($this->contact->id);
        
        $validatedDate = $this->validate([
            'username' => ['required', 'string', 'max:255'], 
            'phone' => ['required', 'string', 'max:255'],
            'semat' => ['required', 'string', 'max:255'],
        ]);
        $cont->update([
           'username' => $validatedDate['username'],
            'phone' => $validatedDate['phone'],
            'semat' => $validatedDate['semat']
        ]);
       $this->GetOnline_contacts();

        $this->resetForm();
        
    }

    public function createModal()
    {
        $this->resetForm();
    }

    public function deletesession($id)
    {
        Session::find($id)->delete();
        $this->thisUserSession =$this->getnotEndedSessions();
    }
}
