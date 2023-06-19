<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    public function handle(Request $request, Closure $next, ...$roles)
    {
        $user = $request->user();

        // Jika user memiliki role admin atau role yang diperlukan, lanjutkan ke route berikutnya
        if ($user && (in_array($user->role, $roles))) {
            return $next($request);
        }

        return abort(404);
    }
}
