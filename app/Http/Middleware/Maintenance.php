<?php

namespace App\Http\Middleware;

use App\Models\GeneralSetting;
use Closure;

class Maintenance
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
        $maintenance = GeneralSetting::where('id', 1)->get();
        $status = $maintenance[0]['site_publish'];

        if ($status == 0) {
            return $next($request);
        } else {
            return redirect('/maintenance');
        }
    }
}
