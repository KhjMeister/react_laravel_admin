<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Auth;
use App;

class DashboardController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth')->except('labels');
    }

    public function dashboard()
    {
        $thisRoute = "dashboard";
        return view('client.dashboard',compact('thisRoute'));
    }

    // public function change(Request $request)
    // {
    //     App::setLocale($request->lang);
    //     session()->put('locale', $request->lang);
    //     return redirect()->back();
    // }

    //  public function labels()
    // {
    //     DB::table('users')->select('name')->all();
    //     return response()->json(DB::table('users')->select('name')->get(),200);
    // }
}
