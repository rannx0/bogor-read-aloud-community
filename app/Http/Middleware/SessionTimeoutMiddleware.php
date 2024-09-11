<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class SessionTimeoutMiddleware
{
    protected $timeout = 1800; // Set 30 minutes (1800 seconds)

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!session()->has('last_activity')) {
            session(['last_activity' => time()]);
        }

        if (time() - session('last_activity') > $this->timeout) {
            Auth::logout(); // Logout user
            session()->flush(); // Clear session data
            return redirect()->route('login')->withErrors('Sesi Anda telah berakhir, silakan login kembali.');
        }

        session(['last_activity' => time()]);

        return $next($request);
    }
}
