<?php

namespace App\Http\Middleware;

use Closure;
use App\User;
use Auth;
class UpdateLastActivity
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
        User::where('id', Auth::user()->id)->update(['last_activity'=>date('Y-m-d H:i')]);
        return $next($request);
    }
}
