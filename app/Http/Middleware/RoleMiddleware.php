<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $user = Auth::user();

        // Check if user has any of the required roles
        if (in_array($user->role, $roles)) {
            return $next($request);
        }

        // If user doesn't have required role, redirect based on their role
        return $this->redirectToAuthorizedArea($user->role);
    }

    /**
     * Redirect user to their authorized area
     */
    private function redirectToAuthorizedArea($role)
    {
        switch ($role) {
            case 'admin':
                return redirect()->route('admin.dashboard');
            case 'guru':
                return redirect()->route('teacher.dashboard');
            case 'orang_tua':
                return redirect()->route('parent.dashboard');
            default:
                return redirect()->route('dashboard');
        }
    }
}
