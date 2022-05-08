<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        
        return view('session');
    }

    public function sessionedit($sessid)
    {
        
        return view('editsess',compact('sessid'));
    }
}
