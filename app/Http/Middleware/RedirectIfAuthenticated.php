<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  ...$guards
     * @return mixed
     */
    public function handle(Request $request, Closure $next, ...$guards)
    {
        $guards = empty($guards) ? [null] : $guards;
        // dd($guards);
        foreach ($guards as $guard) {
            switch ($guard) {
                case 'admin':
                    if (Auth::guard($guard)->check()) {
                        return redirect()->route('admin.dashboard');
                    }
                    break;
                case 'merchant':
                    if (Auth::guard($guard)->check()) {
                        return redirect()->route('merchant.dashboard');
                    }
                    break;
                case 'rider':
                    if (Auth::guard($guard)->check()) {
                        return redirect()->route('rider.dashboard');
                    }
                    break;

                default:
                    if (Auth::guard($guard)->check()) {
                        return redirect('/dashboard');
                    }
                    break;
            }
        }

        return $next($request);
    }
}
