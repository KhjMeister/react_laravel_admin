<?php

namespace App\Http\Livewire\Client;
use App\Models\User;
use App\Models\Category as Categories;
use App\Models\Contacts;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;


class Contact extends Component
{
    use WithPagination;
    protected $paginationTheme = 'simple-tailwind';

    public $categories,$cid,$name,$u_id,$del_id;
    public $contact_id,$username,$phone,$semat,$ca_id;
    public $contacts_visablity=false;
    public $search = '';



    public $delModal ='display:none;' ;
    public $addModal ='display:none;' ;
    public $editModal ='display:none;' ;

    protected $listeners = [
        'showDeleteModal' => 'showDeleteModal',
        'closeDeleteModal' => 'closeDeleteModal',
        'showAddModal' => 'showAddModal',
        'closeAddModal' => 'closeAddModal',
        'showEditeModal' => 'showEditeModal',
        'closeEditeModal' => 'closeEditeModal',
    ];

 

    public function showAddModal()
    {
        $this->addModal = 'display:block;';
        $this->resetForm();
    }
    public function closeAddModal()
    {
        $this->addModal = 'display:none;';
    }

    public function showEditeModal()
    {
        $this->editModal = 'display:block;';
    }
    public function closeEditeModal()
    {
        $this->editModal = 'display:none;';
    }
    public function showDeleteModal()
    {
        $this->delModal = 'display:block;';
    }
    public function closeDeleteModal()
    {
        $this->delModal = 'display:none;';
    }
    public function setSearchFun($cid)
    {
        $this->search = $cid;
    }
    protected $rules = [
        'username'=>'required|min:4|unique:contacts',
        'u_id'=>'required',
        'ca_id'=>'required',
        'phone'=>'required|digits:11|unique:contacts',
        'semat'=>'required|min:5',
    ];
    protected $messages = [
        'ca_id.required' => 'دسته بندی را ایجاد کنید',
        'semat.required'=>'سمت را وارد کنید',
        'semat.min'=>'سمت باید بیشتر از 5 کاراکتر باشد',
    ];
    public function render()
    {
        return view('livewire.client.contact',[
            'contacts'=>Contacts::where([
                ['u_id', '=', $this->u_id],
                ['username', 'like', '%'.$this->search.'%']
            ])->orWhere([
                ['u_id', '=', $this->u_id],
                ['phone', 'like', '%'.$this->search.'%']
            ])->orWhere([
                ['u_id', '=', $this->u_id],
                ['semat', 'like', '%'.$this->search.'%']
            ])->orWhere([
                ['u_id', '=', $this->u_id],
                ['ca_id', 'like', '%'.$this->search.'%']
            ])->paginate(6)
        ]);
    }

    public function mount()
    {
        
        $this->u_id = Auth::user()->id;
        if($this->categoryVisibility()){
            $this->categories = null;
            
            $this->getAllCategories();
            // $this->getAllContacts();
            
            if($this->contactsVisibility()){
                $this->contacts_visablity = true;
            }
        }else{
            $this->categories = null;
            
            if($this->contactsVisibility()){
                $this->contacts_visablity = true;
            }
            
        }
    }
    public function updatingSearch()
    {
        $this->resetPage();
    }
    
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
    public function resetForm()
    {
        $this->username="";
        $this->phone="";
        $this->semat="";
    }
    public function contactsVisibility()
    {
        $var = Contacts::where('u_id',$this->u_id)->first();
        if(isset($var)){
            return  true;
        }else{
            return  false;
        }
    }
    public function categoryVisibility()
    {
        $var = Categories::where('u_id',$this->u_id)->first();
        if(isset($var)){
            return  true;
        }else{
            return  false;
        }
    }
    public function getAllCategories()
    {
        $this->ca_id = Categories::where([
            ['u_id', '=', $this->u_id],
        ])->first()->id;
        $this->categories = Categories::where([
            ['u_id', '=', $this->u_id],
        ])->get();    
    }
   
    public function getAllContacts()
    {
        $this->contacts = Contacts::where([
            ['u_id', '=', $this->u_id],
            ['username', 'like', '%'.$this->search.'%']
        ])->orWhere([
            ['u_id', '=', $this->u_id],
            ['phone', 'like', '%'.$this->search.'%']
        ])->orWhere([
            ['u_id', '=', $this->u_id],
            ['semat', 'like', '%'.$this->search.'%']
        ])->get();  
    }
    public function getCategory($id)
    {
        return Categories::where('id', $id)->first()->name;
    }
    public function storeContact()
    {
        $validatedData = $this->validate();

        try{
            Contacts::create($validatedData);
            // $this->getAllContacts();
            
            if($this->contactsVisibility()){
                $this->contacts_visablity = true;
            }
            $this->closeAddModal();
            $this->dispatchBrowserEvent('alert',[
                'type'=>'success',
                'message'=>"مخاطب با موفقیت ثبت شد!!"
            ]);
        }catch(\Exception $e){
            $this->dispatchBrowserEvent('alert',[
                'type'=>'error',
                'message'=>"مشکلی پیش آمده لطفا دوباره امتحان کنید!!"
            ]);
        }
    }
    public function modalDeleteContact($did)
    {
        $this->showDeleteModal();
        $this->del_id = $did;
        $this->username = Contacts::find($this->del_id)->username;
    }
    public function deleteContact()
    {
        try{
            Contacts::find($this->del_id)->delete();
            
            // $this->getAllContacts();
            
            if(!$this->contactsVisibility()){
                $this->contacts_visablity = false;  
            }
            $this->closeDeleteModal();

            $this->dispatchBrowserEvent('alert',[
                'type'=>'success',
                'message'=>"مخاطب با موفقیت حذف شد!!"
            ]);
        }catch(\Exception $e){
            $this->dispatchBrowserEvent('alert',[
                'type'=>'error',
                'message'=>"مشکلی پیش آمده لطفا دوباره امتحان کنید!!"
            ]);
        
        }
    }
    public function editeContact($id)
    {
        $contact = Contacts::find($id);
        $this->cid = $id;
        $this->username = $contact->username;
        $this->ca_id = $contact->ca_id;
        $this->username= $contact->username;
        $this->phone= $contact->phone;
        $this->semat= $contact->semat;

        $this->showEditeModal();
    } 
    public function updateContact()
    {
        // $validatedData = $this->validate();
        try{
            
            Contacts::where('id',$this->cid)->update([
                'username' => $this->username,
                'ca_id'=>$this->ca_id,
                'phone'=>$this->phone,
                'semat'=>$this->semat,
            ]); 
            // $this->getAllContacts();
            $this->closeEditeModal();

            $this->dispatchBrowserEvent('alert',[
                'type'=>'success',
                'message'=>"مخاطب با موفقیت ویرایش شد!!"
            ]);
    
         
        }catch(\Exception $e){
            $this->dispatchBrowserEvent('alert',[
                'type'=>'error',
                'message'=>"مشکلی پیش آمده لطفا دوباره امتحان کنید!!"
            ]);
         
        }
    }

    
}
