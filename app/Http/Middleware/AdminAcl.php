<?php

namespace App\Http\Middleware;

use App\Services\Admin\Acl\Acl;
use Closure;
use Illuminate\Http\Request;

class AdminAcl
{
    public function __construct(
        private Acl $acl
    ){}

    public function handle(Request $request, Closure $next)
    {
        if (!$this->acl->checkRoute($request->fullUrl(), $request->method()))
            \App::abort(403, 'User is not allowed for current route.');

        return $next($request);
    }
}
