<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Session;

class checkSession
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()) {

            if (Session::has('last_activity')) {
                $last_activity = Session::get('last_activity');
                $session_lifetime = config('session.lifetime') * 60;

                if ((time() - $last_activity) > $session_lifetime) {
                    Auth::logout();
                    session()->flush();
                    return redirect('index')->with('message', 'Your Session has Expired');
                }
            };

            // session(['last_activity' => time()]); // update the last activity time
        }
        return $next($request);
    }
}
