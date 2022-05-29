<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Resources\ContactResource;
use App\Models\Category;
use App\Models\Contacts;
use App\Models\User;
use Validator;

class ContactController extends Controller
{
    public function __construct() {
        $this->middleware('auth:api');
    }
    
    public function index()
    {
        $user_id = auth('api')->user()->id;   
        $contacts = Contacts::latest()->where([['u_id', '=', $user_id],])->get();
        return response()->json(["contacts"=>ContactResource::collection($contacts)]);
    }

    public function store(Request $request) {
        
        $user_id = auth('api')->user()->id;   
        $validator = Validator::make($request->all(),[
            'username' => 'required|string|max:255|min:4|unique:contacts',
            'ca_id' => 'required',
            'phone'=>'required|digits:11|unique:contacts',
            'semat'=>'required|min:5',
        ]);

        if($validator->fails()){
            return response()->json($validator->errors());       
        }

        $contact = Contacts::create([
            'username' => $request->username,
            'ca_id' => $request->ca_id,
            'phone' => $request->phone,
            'semat' => $request->semat,
            'u_id' => $user_id,
         ]);
        
        return response()->json(['دسته بندی با موفقیت ایجاد شد .', new ContactResource($category)]);
    
    }

    public function update(Request $request,Categories $category)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required|string|max:255|min:4|unique:categories',
        ]);

        if($validator->fails()){
            return response()->json($validator->errors());       
        }

        $category->name = $request->name;
        $category->save();
        
        return response()->json(['دسته با موفقیت ویرایش شد .', new ContactResource($category)]);
   
    }
    
    public function show($id)
    {
        $user_id = auth('api')->user()->id; 
        $categorys = User::find($user_id)->category()->find($id);
        if (is_null($categorys)) {
            return response()->json('دسته بندی پیدا نشد', 404); 
        }
        return response()->json(["categorie"=>new ContactResource($categorys)]);
    }

    public function destroy(Categories $category)
    {
        $category->delete();
        return response()->json('دسته بندی با موفقیت حذف شد');
    }
}
