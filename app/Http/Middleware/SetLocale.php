<?php

namespace App\Http\Middleware;

use Closure;

class SetLocale
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
        if(session()->get('language')==NULL){
            session()->put('language', 1);
            session()->put('locale_lang', 'tr');
            app()->setLocale("tr");
        }else{
            app()->setLocale(session()->get('locale_lang'));
        }

        return $next($request);
    }
}



