<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IsAnggota
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if ($request->user()->tokenCan('role:anggota')) {
            return $next($request);
        }
        return response()->json([
            'success' => false,
            'code' => 401,
            'message' => 'Not Authorized'
        ], 401);
    }
}
