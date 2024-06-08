<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    public function handle($request, Closure $next, $role)
    {
        $user = Auth::user();

        if ($user && $user->role === $role) {
            return $next($request);
        }

        return response()->json(['message' => 'Unauthorized'], 403);
    }
}


