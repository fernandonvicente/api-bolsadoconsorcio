<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;

class ApiToken
{
    /**
     * Handle an incoming request.
     *
     * @param  Request  $request
     * @param Closure $next
     * @return mixed
     */

    public function handle($request, Closure $next)
    {
            $user = $request->user();
            if ($user) {
                return $next($request);
            }

        return response()->json([
            'error' => '403',
            'message' => "Token inválido"
        ], 403);
    }
}
