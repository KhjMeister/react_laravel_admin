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
        return view('client.session');   
    }
    public function listSession()
    {
        return view('client.list-session');   
    }
    public function historyMetting()
    {
        return view('client.history-metting');   
    }
}
