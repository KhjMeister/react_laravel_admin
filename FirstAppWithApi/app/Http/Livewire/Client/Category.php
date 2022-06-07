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
    public $cid,$name,$u_id;
    public $categories_visablity=false;
    // public $isCreateClicked = false;

    protected $rules = [
        'name'=>'required|min:4|unique:categories',
        'u_id'=>'required'
    ];
    public function render()
    {
        return view('livewire.client.category',[
            'categories'=> Categories::where([
                ['u_id', '=', $this->u_id]
            ])->paginate(2)
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
        ])->paginate(2);
    }
    
    public function deleteCategory($id)
    {
        try{
            Categories::find($id)->delete();
            
            // $this->getAllCategories();
            
            if(!$this->categoryVisibility()){
                $this->categories_visablity = false;  
            }
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
            $this->getAllCategories();

            if($this->categoryVisibility()){
                $this->categories_visablity = true;
            }
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

    }     
    public function updateCategory()
    {
        // $validatedData = $this->validate();

        try{
            
            Categories::where('id',$this->c_id)->update([
                'name' => $this->name
            ]); 
            // $this->getAllCategories();
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
