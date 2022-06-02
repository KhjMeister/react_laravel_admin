<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Resources\SessionResource;
use App\Http\Resources\ContactResource;

use Illuminate\Support\Str;
use App\Models\Session;
use App\Models\Contacts;
use App\Models\User;
use App\Models\Session_contact;
use SoapClient;
use Validator;

class SessionController extends Controller
{
    public $baseUrl = "https://test.videorayan.com/metting/";
    public $user_id,$candidate_contacts ; 

    public function __construct() {
        $this->middleware('auth:api');
        $this->user_id= auth('api')->user()->id;
    }
    
    public function index()
    { 
        $sessions = Session::latest()->where([['u_id', '=', $this->user_id],])->get();
        return response()->json(["sessions"=>SessionResource::collection($sessions)]);
    }
    
    public function store(Request $request) {

        $sess_token   = Str::random(20);
        $video_link   = $this->baseUrl.$sess_token;
        $total_number = 0;
        $end_at       = "";
        $is_ended     =  0;
        $is_started   =  0;
        $jalase_type  =  1;

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
            'name'         => $request->name,
            'start_time'   => $request->start_time,
            'start_date'   => $request->start_date,
            'session_type' => $request->session_type,
            'u_id'         => $this->user_id,
            'sess_token'   => $sess_token,
            'video_link'   => $video_link,
            'total_number' => $total_number,
            'end_at'       => $end_at,
            'is_ended'     => $is_ended,
            'is_started'   => $is_started,
            'jalase_type'   => $jalase_type,
         ]);
        
        return response()->json([' جلسه با موفقیت ایجاد شد .', new SessionResource($session)]);
    }

    public function update(Request $request,Session $session)
    { 

        $validator = Validator::make($request->all(),[
            'name' => ['required','string','max:255','min:4','unique:sessions,name'],
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
        $session->u_id  =  $this->user_id;
        $session->save();
        return response()->json(['جلسه با موفقیت ویرایش شد .', new SessionResource($session)]);
    }
    
    public function show($id)
    {
        $session = User::find($this->user_id)->sessions()->find($id);
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
    
    public function notEndedSessions()
    { 
        $sessions = Session::latest()->where([['u_id', '=', $this->user_id],['is_ended','=',0]])->get();
        return response()->json(["started"=>SessionResource::collection($sessions)]);
    }
    public function endedSessions()
    { 
        $sessions = Session::latest()->where([['u_id', '=', $this->user_id],['is_ended','=',1]])->get();
        return response()->json(["ended"=>SessionResource::collection($sessions)]);
    }

    public function addContactToSession(Request $request) {
        $validator = Validator::make($request->all(),[
            'c_id' => 'required',
            's_id' => 'required',
        ]);
        if($validator->fails()){
            return response()->json($validator->errors());       
        }
        if(!$this->checkIfContactIn($request->c_id,$request->s_id)){
            $session_contact = Session_contact::create([
                'c_id'   => $request->c_id,
                's_id'   => $request->s_id,
                'sms_status'   => 0,
                'ostad_flag'   => 0,
                'token'  => rand(11111, 99999)
             ]);
            return response()->json([' مخاطب با موفقیت به جلسه اضافه شد ']);
        }else{
            return response()->json([' مخاطب در جلسه موجود است  ']);
        }  
    }

    public function checkIfContactIn($contact_id,$session_id)
    {
        $var = Session_contact::where([['c_id',$contact_id],['s_id',$session_id]])->first();
        if(isset($var)){
            return  True;
        }else{
            return  false;
        }
    }

    public function setOstad(Request $request) {
        $validator = Validator::make($request->all(),[
            'c_id' => 'required',
            's_id' => 'required',
        ]);
        if($validator->fails()){
            return response()->json($validator->errors());       
        }
        $flag =False;
        $lastcid=0;
        if(!$request->s_id==Null){
            $sesscont = Session_contact::where([['s_id',$request->s_id]])->get();
            
            foreach ($sesscont as $key ) {
                if(!$key->ostad_flag==0){
                    $flag = True;
                    $lastcid=$key->c_id;
                    break;
                }
            }
            if($flag==False){
                $this->changOneFlag($request->c_id,1,$request->s_id);
                return response()->json(['استاد تعیین شد ']);
            }else{
                $this->changOneFlag($lastcid,0,$request->s_id);
                $this->changOneFlag($request->c_id,1,$request->s_id);
                return response()->json([' استاد تغییر کرد ']);
            }
        }
    }
    public function changOneFlag($cid,$ostadFlag,$s_id)
    {
        Session_contact::where([['c_id',$cid],['s_id',$s_id]])->update([
            'ostad_flag' => $ostadFlag
        ]); 
    }

    public function sendMessageToContacts(Request $request)
    {
        $validator = Validator::make($request->all(),[
            's_id' => 'required',
        ]);
        if($validator->fails()){
            return response()->json($validator->errors());       
        }
        $session = $this->getSession($request->s_id);
        $this->getThisSessionContacts($request->s_id);
        $allreadySended = true;
        $client = new SoapClient("http://ippanel.com/class/sms/wsdlservice/server.php?wsdl");

            foreach ($this->candidate_contacts as $key ) {
               
                if($key->sms_status==0){
                    $receptor = Contacts::where('id',$key->c_id)->first()->phone;
                    $usersms = "09153257202"; 
                    $passsms = "123deamond"; 
                    $fromNum = "+9850002040325721"; 
                    $toNum = array($receptor); 
                    $pattern_code = "vungc8h5x1jgg9z"; 
                    $input_data = array( "jalaseName" => $session->name,
                                        "JalaseUrl"  => $session->video_link,
                                        "verificationCode" => $key->token
                                        ); 
                    $client->sendPatternSms($fromNum,$toNum,$usersms,$passsms,$pattern_code,$input_data);
                    $this->changeSmsStatus($key->id);
                    
                }
            }
            return response()->json(['پیام به مخاطبان ارسال شد ']);
    }
    public function checkSmsSended(Request $request)
    {
        $validator = Validator::make($request->all(),[
            's_id' => 'required',
            'c_id' => 'required',
        ]);
        if($validator->fails()){
            return response()->json($validator->errors());       
        }
        $var = Session_contact::where([['c_id',$request->c_id],['s_id',$request->s_id]])->first();
        if(isset($var)){
            if($var->sms_status==1)
            return response()->json([' ارسال شده ']);
            else
            return response()->json([' ارسال نشده ']);
        }else{
            return response()->json([' کاربر در جلسه عضو نیست . ']);
        }
    }
    public function getThisSessionContacts($sid)
    {
        $this->candidate_contacts = Session_contact::where('s_id',$sid)->get();
    }
    public function changeSmsStatus($id)
    {
        Session_contact::where([['id',$id]])->update([
            'sms_status' => 1
        ]); 
    }
    public function getSession($sid)
    {
        return Session::find($sid);
    }

    public function contacts(Request $request)
    {
        $validator = Validator::make($request->all(),[
            's_id' => 'required',
        ]);
        if($validator->fails()){
            return response()->json($validator->errors());       
        }
        $session  = Session::find($request->s_id);
        return response()->json(["contacts"=>ContactResource::collection($session->contacts)]);
    }
    public function getByToken($token)
    {
        $session = Session::where([['sess_token','=',$token]])->first();
        if (is_null($session)) {
            return response()->json(' جلسه پیدا نشد', 404); 
        }
        return response()->json(["session"=>new SessionResource($session)]);
    }

    public function startSession($id)
    {
        $session = Session::find($id);
        $session->is_started = 1;
        $session->save();
        return response()->json(['جلسه با موفقیت شروع شد .']);
    
    }
    public function endSession($id)
    {
        $session = Session::find($id);
        $session->is_ended = 1;
        $session->save();
        return response()->json(['جلسه با موفقیت پایان یافت شد .']);
    }
}
