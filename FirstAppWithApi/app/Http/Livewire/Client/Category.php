<?php

namespace App\Http\Livewire\Client;
use App\Models\User;
use App\Models\Category as Categories;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;


class Category extends Component
{
    use WithPagination;
    protected $paginationTheme = 'simple-tailwind';
    public $cid,$name,$u_id,$del_id;
    public $categories_visablity=false;
    // public $isCreateClicked = false;
    
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

    protected $rules = [
        'name'=>'required|min:4|unique:categories',
        'u_id'=>'required'
    ];
    public function render()
    {
        return view('livewire.client.category',[
            'categories'=> Categories::where([
                ['u_id', '=', $this->u_id]
            ])->paginate(18)
        ]);
    }
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
    public function mount()
    {
        $this->u_id = Auth::user()->id;

        // $this->getAllCategories();
        
        if($this->categoryVisibility()){
            $this->categories_visablity = true;
        }
    }
    public function categoryVisibility()
    {
        $var = Categories::where([['u_id',$this->u_id]])->first();
        if(isset($var)){
            return  true;
        }else{
            return  false;
        }
    }

    public function getAllCategories()
    {
        $this->categories = Categories::where([
            ['u_id', '=', $this->u_id],
        ])->paginate(18);
    }
    
    public function modalDeleteCategory($did)
    {
        $this->showDeleteModal();
        $this->del_id = $did;
        $this->name = Categories::find($this->del_id)->name;
        
    }

    public function deleteCategory()
    {
        try{
            Categories::find($this->del_id)->delete();
            
            // $this->getAllCategories();
            
            if(!$this->categoryVisibility()){
                $this->categories_visablity = false;  
            }

            $this->closeDeleteModal();

            $this->dispatchBrowserEvent('alert',[
                'type'=>'success',
                'message'=>"دسته با موفقیت حذف شد!!"
            ]);
        }catch(\Exception $e){
            $this->dispatchBrowserEvent('alert',[
                'type'=>'error',
                'message'=>"مشکلی پیش آمده لطفا دوباره امتحان کنید!!"
            ]);
         
        }
        
    }
    public function resetForm()
    {
        $this->name="";
        
    }
    // public function createClick()
    // {
    //     $this->isCreateClicked == false ? $this->isCreateClicked = true : $this->isCreateClicked = false;
    // }

    public function storeCategory()
    {
        $validatedData = $this->validate();

        try{
            Categories::create($validatedData);
            // $this->getAllCategories();

            if($this->categoryVisibility()){
                $this->categories_visablity = true;
            }

            $this->closeAddModal();

            $this->dispatchBrowserEvent('alert',[
                'type'=>'success',
                'message'=>"دسته با موفقیت ثبت شد!!"
            ]);
    
         
        }catch(\Exception $e){
            $this->dispatchBrowserEvent('alert',[
                'type'=>'error',
                'message'=>"مشکلی پیش آمده لطفا دوباره امتحان کنید!!"
            ]);
         
        }
    }
    public function editeCategory($id)
    {
        $category = Categories::find($id);
        $this->name = $category->name;
        $this->c_id = $id;

        $this->showEditeModal();

    }     
    public function updateCategory()
    {
        // $validatedData = $this->validate();

        try{
            
            Categories::where('id',$this->c_id)->update([
                'name' => $this->name
            ]); 
            // $this->getAllCategories();
            $this->closeEditeModal();

            $this->dispatchBrowserEvent('alert',[
                'type'=>'success',
                'message'=>"دسته با موفقیت ویرایش شد!!"
            ]);
    
         
        }catch(\Exception $e){
            $this->dispatchBrowserEvent('alert',[
                'type'=>'error',
                'message'=>"مشکلی پیش آمده لطفا دوباره امتحان کنید!!"
            ]);
         
        }
    }

}
