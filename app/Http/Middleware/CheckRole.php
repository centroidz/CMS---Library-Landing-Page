<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        if (!Auth::check() || !in_array(Auth::user()->role, $roles)) {

            // AJAX / Fetch request → return JSON
            if ($request->expectsJson()) {
                return response()->json([
                    'message' => 'Unauthorized access.'
                ], 403);
            }

            // If user is not logged in OR doesn't have one of the required roles, abort.
            abort(403, 'Unauthorized access.');
        }

        return $next($request);
    }
}
