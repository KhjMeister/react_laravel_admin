<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Resources\SessionResource;
use App\Models\Session;
use App\Models\Contacts;
use App\Models\User;
use Validator;

class SessionController extends Controller
{
    public function __construct() {
        $this->middleware('auth:api');
    }
    
    public function index()
    {
        $user_id = auth('api')->user()->id;   
        $sessions = Session::latest()->where([['u_id', '=', $user_id],])->get();
        return response()->json(["sessions"=>SessionResource::collection($sessions)]);
    }

    public function store(Request $request) {
        
        $user_id = auth('api')->user()->id;   
        $validator = Validator::make($request->all(),[
            'name' => 'required|string|max:255|min:4|unique:sessions',
            'start_time' => 'required',
            'start_date' => 'required',
            'session_type' => 'required',
        ]);

        if($validator->fails()){
            return response()->json($validator->errors());       
        }

        $session = Session::create([
            'name' => $request->name,
            'start_time'    => $request->start_time,
            'start_date'    => $request->start_date,
            'session_type'    => $request->session_type,
            'u_id'     => $user_id,
         ]);
        
        return response()->json([' جلسه با موفقیت ایجاد شد .', new SessionResource($session)]);
    
    }

    public function update(Request $request,Session $session)
    {
        $user_id = auth('api')->user()->id;   

        $validator = Validator::make($request->all(),[
            'name' => ['required','string','max:255','min:4','unique:sessions,username'],
            'start_time' => ['required'],
            'start_date' => ['required'],
            'session_type' => ['required'],
        ]);

        if($validator->fails()){
            return response()->json($validator->errors());       
        }

        $session->name   = $request->name;
        $session->session_type =  $request->session_type;
        $session->start_date =  $request->start_date;
        $session->start_time =  $request->start_time;
        $session->u_id  =  $user_id;
        $session->save();
        
        return response()->json(['جلسه با موفقیت ویرایش شد .', new SessionResource($session)]);
   
    }
    
    public function show($id)
    {
        $user_id = auth('api')->user()->id; 
        $session = User::find($user_id)->sessions()->find($id);
        if (is_null($session)) {
            return response()->json(' جلسه پیدا نشد', 404); 
        }
        return response()->json(["session"=>new SessionResource($session)]);
    }

    public function destroy(Session $session)
    {
        $session->delete();
        return response()->json(' جلسه  با موفقیت حذف شد');
    }
}
