<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Support\Facades\Auth;

class CheckActive
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
        if (Auth::check()) {
            if(Auth::user()->active!="1"){
                $user = User::find(auth::user()->getAuthIdentifier());
                $user->active = 1;
                $user->save();
                \App\Helpers\UserActivity::addToLog('Giriş Yaptı');
            }
            return $next($request);
        }else{
            return redirect('/login');
        }

    }
}
