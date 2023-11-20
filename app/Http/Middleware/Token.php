<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
 
class Token
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $token = $request->header('Authorization');
        if (!preg_match("/Token/", $token)) {
            return response()->json(['message' => 'invalid token or your filed is empty |^_^|'], 401);
        }


        $authToken = str_replace('Token ', '', $token);
        $user = User::where('token', $authToken)->first();
        if (!$user) {
            return response()->json(['your token is wrong |^_^|'], 401);
        }

        if ($user->token_expires_at > time()) {
            return response()->json(['message' => 'token time expire is down pleas login again  |^_^|'], 401);
        }

        return $next($request);
    }
}
