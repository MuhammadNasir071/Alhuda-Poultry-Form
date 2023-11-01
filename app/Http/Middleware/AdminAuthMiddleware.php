<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminAuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
           // User role
           $role = Auth::user()->roles->first();
           if ($role->id == 1) {
               return $next($request);
           }
           // If not an admin, redirect or respond with an error message
           return redirect()->back()->with('error', 'Access denied. You are not an admin.');
    }
}
