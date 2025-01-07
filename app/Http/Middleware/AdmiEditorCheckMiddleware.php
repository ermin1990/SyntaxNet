<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdmiEditorCheckMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param Closure(Request): (Response) $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        if (Auth::check()){
        if (Auth::user()->role != "admin" && Auth::user()->role != "editor") {
            return redirect()->route("home");
        }
        return $next($request);
    }else{
        return redirect()->route("home");
    }
    }
}
