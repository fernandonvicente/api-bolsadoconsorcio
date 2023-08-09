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
        return $next($request);

        $token = $request->headers->get('token') ? $request->headers->get('token') : $request->get('token');
        if ($token) {

            $user = User::where('token', $token)->first();
            if ($user) {
                $request['token'] =  $token;
                $request['user'] =  $user;
                return $next($request);
            }
        }
        return response()->json([
            'error' => '403',
            'message' => "Token inválido"
        ], 403);
    }
}
