<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckRoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {

        if (Auth::user()->role == 'Admin') {
            return redirect()->route('users')
                ->withErrors(trans('app.you_cannot_delete_admin'));
        }
        if ( User::id() == Auth::id() ) {
            return redirect()->route('users')
                ->withErrors(trans('app.you_cannot_delete_yourself'));
        }
        
        return $next($request);
    }
}
