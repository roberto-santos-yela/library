<?php

namespace App\Http\Middleware;

use Closure;
use App\User;
use \Firebase\JWT\JWT;
use App\Helpers\Token;

class ValidateUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $request_token = $request->header('Authorization');
        $token = new Token();
        $decoded_token = $token->decode($request_token);     
        $user = User::where('email', '=', $decoded_token->email)->first();
       
        if($user != null)
        {
            return $next($request);

        }
     
    }
}
