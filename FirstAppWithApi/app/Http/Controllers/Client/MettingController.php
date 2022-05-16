<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MettingController extends Controller
{
    public function metting($link)
    {
        return view('client.metting',compact('link'));
    }
}
