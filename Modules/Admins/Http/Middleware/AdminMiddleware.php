<?php

namespace Modules\Admins\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class AdminMiddleware
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
        if (Auth::guard(\dataAuth::AUTH["GUARD"]['ADMIN'])->check()) {
            View::share('admin', Auth::guard(\dataAuth::AUTH["GUARD"]['ADMIN'])->user());
            return $next($request);
        }
        return redirect()->route('admin.login');
    }
}
