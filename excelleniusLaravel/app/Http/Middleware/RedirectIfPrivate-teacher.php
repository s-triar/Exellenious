<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfPrivateTeacher
{
	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @param  string|null  $guard
	 * @return mixed
	 */
	public function handle($request, Closure $next, $guard = 'private-teacher')
	{
	    if (Auth::guard($guard)->check()) {
	        return redirect('private-teacher/home');
	    }

	    return $next($request);
	}
}