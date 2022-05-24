<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class calenderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function calender()
    {
        return view('client.calender');
        
    }
}
