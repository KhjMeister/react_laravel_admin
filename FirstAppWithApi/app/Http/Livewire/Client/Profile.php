<?php

namespace App\Http\Livewire\Client;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use Livewire\Component;

class Profile extends Component
{
    public $user ,$user_id ,$name, $family, $phone, $email, $password;

    protected $rules = [
        'name'=>'required|min:3',
        'family'=>'required|min:3',
        'phone'=>'required|min:11|max:11',
        'email'=>'required|email',
        'password'=>'required|min:6',

    ];
    
    public function mount()
    {
        $this->user_id = Auth::user()->id;
        $this->user    = Auth::user();
        $this->name   = $this->user->name;
        $this->family   = $this->user->family;
        $this->phone   = $this->user->phone;
        $this->email   = $this->user->email;
        $this->password   = $this->user->password;
        
    }
    public function render()
    {
        return view('livewire.client.profile');
    }
    
    public function passChange()
    {
        $this->password = Hash::make($this->password);
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function updateProfile()
    {
        $validatedData = $this->validate();

        try{

            User::find($this->user->id)->fill([
                'username'=>$this->user->name,
                'name'=>$this->name,
                'family'=>$this->family,
                'phone'=>$this->phone,
                'email'=>$this->email,
                'password'=>$this->password,
            ])->save();

            $this->dispatchBrowserEvent('alert',[
                'type'=>'success',
                'message'=>"تغییرات با موفقیت ثبت شد!!"
            ]);
    
         
        }catch(\Exception $e){
            $this->dispatchBrowserEvent('alert',[
                'type'=>'error',
                'message'=>"مشکلی پیش آمده لطفا دوباره امتحان کنید!!"
            ]);
         
        }
    }
}
