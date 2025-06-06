<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckIfUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = Auth::user();
        if(!$user->role_id) {
            abort(redirect()->intended('/setup'));
        }
        if($user->role_id === 3 || $user->role_id === 4) {
            abort(redirect()->intended('/administrator'));
        }
        
        return $next($request);
    }
}