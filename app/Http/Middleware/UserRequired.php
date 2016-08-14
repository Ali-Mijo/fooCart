<?php

namespace fooCart\Http\Middleware;

use Closure;
use fooCart\Core\User\TempUser;
use Illuminate\Support\Facades\Auth;

class UserRequired
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
        if (is_null(Auth::user())) {
            if (!session()->get('userId', false)) {
                session()->set(
                    'userId',
                    TempUser::getTempUser(session()->get('userId', false))->id
                );
            }
        }
        return $next($request);
    }
}
