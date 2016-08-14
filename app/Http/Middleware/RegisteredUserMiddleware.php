<?php

namespace fooCart\Http\Middleware;

use Closure;

class RegisteredUserMiddleware
{
    /**
     * Check if user is registered or admin.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($request->user() && ($request->user()->isRegisteredUser() || $request->user()->isAdminUser())) {
            return $next($request);
        }
        return redirect()->route('public.login');
    }
}
