<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    protected function redirectTo($request) :?string
    {
        if (!$request->expectsJson()) {
            if (!$request->isMethodSafe()) {
                $referrer = $request->server('HTTP_REFERER');
                if ($referrer) {
                    \Session::put('url.intended', $referrer);
                }
            }
            return route('cc.login');
        }
    }
}
