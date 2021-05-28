<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class checkGuest
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {

        if($request->session()->get('login_status') == null) {
            return $next($request);
        }elseif($request->session()->get('login_status') == 'admin'){
            return redirect('admin');
        }
    }
}
