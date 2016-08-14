<?php

namespace fooCart\Http\Middleware;

use Closure;
use fooCart\Core\User\TempUser;

class UserRequiredMiddleware
{
    /**
     * Ensure that current request has a corresponding user entity.
     * At minimum, the user entity will be temp user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!$request->user() && !session()->get('userId', false)) {
            session()->set(
                'userId',
                TempUser::getTempUser(session()->get('userId', false))->id
            );
        }
        return $next($request);
    }
}
