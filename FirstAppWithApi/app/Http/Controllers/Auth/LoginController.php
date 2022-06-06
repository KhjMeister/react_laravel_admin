<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */


    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */

    // public function change(Request $request)
    // {
    //     App::setLocale($request->lang);
    //     session()->put('locale', $request->lang);
    //     return redirect()->back();
    // }

    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function credentials(Request $request)
      {
        if(is_numeric($request->get('email'))){
          return ['phone'=>$request->get('email'),'password'=>$request->get('password')];
        }
        elseif (filter_var($request->get('email'), FILTER_VALIDATE_EMAIL)) {
          return ['email' => $request->get('email'), 'password'=>$request->get('password')];
        }else{
          return ['email' => $request->get('email'), 'password'=>$request->get('password')];
        }
      }

      // public function login(Request $request)
      // {   
      //     $input = $request->all();

      //     $this->validate($request, [
      //         'email' => 'required|email',
      //         'password' => 'required',
      //     ]);
  
      //     if(auth()->attempt(array('email' => $input['email'], 'password' => $input['password'])))
      //     {
      //         if (auth()->user()->role == "admin") {
      //             return redirect()->route('adminDashboard');
      //         }else{
      //             return redirect()->route('dashboard');
      //         }
      //     }else{
      //         return redirect()->route('login')->with('error','ایمیل یا پسورد اشتباه است');
      //     }
      // }
}
