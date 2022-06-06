<?php

namespace App\Http\Controllers\Admin\Auth;

use Validator;
use Session;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Admin;

class AuthController extends Controller
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
    protected $redirectTo = '/admin/login';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function getLogin()
    {
        return view('admin.login');
    }

    /**
     * Show the application loginprocess.
     *
     * @return \Illuminate\Http\Response
     */
    public function postLogin(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);
        if (auth()->attempt(['email' => $request->input('email'), 'password' => $request->input('password')]))
        {
            if (auth()->user()->role == "admin") {
                return redirect()->route('adminDashboard');
            }else{
                return redirect()->route('dashboard');
            }

            $user = auth()->user();
            
            \Session::put('success','شما با موفقیت وارد شدید!!');
            return redirect()->route('adminDashboard');
            
        } else {
            return back()->with('error','یوزر نیم یا پسورد اشتباه است.');
        }

    }

    /**
     * Show the application logout.
     *
     * @return \Illuminate\Http\Response
     */
    public function logout()
    {
        auth()->logout();
        \Session::flush();
        \Sessioin::put('success','با موفقیت خارج شدید');        
        return redirect(route('adminLogin'));
    }
}