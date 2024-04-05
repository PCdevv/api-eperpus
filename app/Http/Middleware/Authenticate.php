<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {
        // return $request->expectsJson() ? null : route('login');
        return $request->expectsJson();

        // if ($request->expectsJson()) {
        //     return null;
        // } else {
        //     // Return a JSON response with a 401 status code
        //     return new JsonResponse(['error' => 'Unauthorized'], 401);
        // }
    }
}
