<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'username' => ['required', 'string', 'max:255','unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => ['required', 'min:11', 'max:11', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            
        ]);
    }
    // protected function validator(array $data): \Illuminate\Contracts\Validation\Validator
    // {
    //     $image = $data['image_url']; 
    //     $imageName = '1.jpg';
    //     $data['image_url']= 'storage/'.$data['name'].'/'.$imageName;
    //     $image_url= 'public/'.$data['name'].'/'.$imageName;
    //     if (preg_match('/^data:image\/(\w+);base64,/', $image)) {
    //         $dataa = substr($image, strpos($image, ',') + 1);
        
    //         $dataa = base64_decode($dataa);
    //         Storage::disk('local')->put($image_url, $dataa);
        
    //     }
        
    //     // Storage::disk('local')->put("1.png", $dataa);
    //     // File::put(storage_path(). '/' . $imageName, base64_decode($image));
    
    //     return Validator::make($data, [
    //         'name' => ['required', 'string', 'max:255'],
    //         'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
    //         'password' => ['required', 'string', 'min:8', 'confirmed'],
    //         'image_url' => ['required'],
    //         'phone' => ['required']
    //     ]);
    // }



    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {

        return User::create([
            'username' => $data['username'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            // 'image_url'=> Crypt::encryptString($data['password']),
            'image_url'=> '',
            'password' => Hash::make($data['password']),           
        ]);
    }
    

     
        

}
