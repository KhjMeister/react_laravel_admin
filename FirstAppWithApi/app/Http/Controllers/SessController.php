<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessController extends Controller
{
    public function index($link)
    {
        
        return view('auth.meettinglog',compact('link'));
    }
}
