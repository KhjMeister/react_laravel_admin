<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
class langController extends Controller
{
    public function change(Request $request)
    {
        App::setLocale($request->lang);
        session()->put('locale', $request->lang);
        return redirect()->back();
    }
}
