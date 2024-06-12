<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController;
use Symfony\Component\HttpFoundation\Response;

class GuestMiddleware extends BaseController
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
       
        $user = auth()->user();
        if($user){
            return $this->sendError('Unauthorised.', ['error'=>'You are already logged-in']);
        }

        return $next($request);
    }
}
