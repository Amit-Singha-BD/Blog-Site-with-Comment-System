<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class BlockUserAccess
{

    public function handle(Request $request, Closure $next): Response {
        if(Auth::user()->role === "User"){
            return redirect()->back()
                             ->with("error", "You do not have permission to access this page.");
        }
        return $next($request);
    }
}
