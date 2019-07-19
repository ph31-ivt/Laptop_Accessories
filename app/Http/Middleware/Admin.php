<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use App\UserProfile;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $userprofile= UserProfile::where('user_id', Auth::id())->get()->toArray();
        if(!empty($userprofile[0]["role"])){
             if (Auth::check() && $userprofile[0]["role"]==2) {
            return $next($request);    
            }
        }
        return redirect('/');  
    }
}
