<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class SessionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function session()
    {
        $thisRoute = 'session';
        return view('client.session',compact('thisRoute'));   
    }
    public function listSession()
    {
        $thisRoute = 'listSession';

        return view('client.list-session',compact('thisRoute'));   
    }
    public function historyMetting()
    {
        $thisRoute = 'historyMetting';

        return view('client.history-metting',compact('thisRoute'));   
    }
}
