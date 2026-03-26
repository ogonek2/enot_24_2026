<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckUserRole
{
    public function handle(Request $request, Closure $next, string ...$roles)
    {
        $user = $request->user();

        if (! $user) {
            abort(403);
        }

        if (! $user->hasAnyRole($roles)) {
            abort(403);
        }

        return $next($request);
    }
}
