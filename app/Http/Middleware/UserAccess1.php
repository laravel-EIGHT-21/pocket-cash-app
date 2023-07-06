<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;

use Closure;
use Illuminate\Http\Request;

class UserAccess1
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if( Auth::check() && Auth::user()->type == 1){
            return $next($request);
        }
        
        elseif(!Auth::user()->id || Auth::user()->type == 1){
                abort(code:403);    
        } 


        elseif( !Auth::check() || !Auth::user()->id || !Auth::user()->type == 1){
                abort(code:403);    
        } 
 
        
        else{
            return redirect()->route('login');
        }
    }
}
