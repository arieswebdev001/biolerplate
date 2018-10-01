<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class IsUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(Auth::user()->level == 0)
            return response()->json(['error'=>'forbidden_action', 'message'=>'Not allowed for this action.'], 403);
            
        return $next($request);
    }
}
