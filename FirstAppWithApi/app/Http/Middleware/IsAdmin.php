<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class IsAdmin
{
    public function handle($request, Closure $next)

    {

        if(auth()->user()->role == "admin"){

            return $next($request);

        }
        return redirect('adminLogin')->with('error',"You don't have admin access.");

    }
}
