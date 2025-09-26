<?php

namespace App\Http\Middleware;

use App\Mail\CheckDomainMail;
use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class CheckDomain
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
        if (substr($_SERVER['HTTP_HOST'], 0, 4) == "www.") {
            $www = "www.";
            $_domain = $_SERVER['HTTP_HOST'];
        } else {
            $www = "";
            $_domain = $_SERVER['HTTP_HOST'];
        }

        // $_licencesite = $www."istanbulkulis.com";

        // if($_domain!==$_licencesite){
        //     echo "Lisanssız Kullanım: ".$_domain." <br> Unlicensed Usage ".$_domain;
        //     $_ADMIN = 'cihanxdogan@gmail.com';
        //     $_ADMIN2 = 'burakkorkmaz58@gmail.com';

        //     Mail::to($_ADMIN)->cc($_ADMIN2)
        //         ->send(new CheckDomainMail());

        //     exit;
        // }else{
        //     return $next($request);
        // }
        return $next($request);
 

    }
}