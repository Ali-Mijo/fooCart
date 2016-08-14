<?php

namespace fooCart\Http\Middleware;

use Closure;

class AdminUserMiddleware
{
    /**
     * Check if user is admin.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!$request->user() || !$request->user()->isAdminUser()) {
            return redirect()->route('admin.login');
        }
        return $next($request);
    }
}
