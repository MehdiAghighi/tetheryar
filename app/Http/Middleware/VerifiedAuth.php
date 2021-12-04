<?php

namespace App\Http\Middleware;

use App\Models\Authentication;
use Closure;
use Illuminate\Http\Request;

class VerifiedAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // Only For API
        $checkUserAuth = Authentication::checkUserAuth();
        if ( ! in_array( $checkUserAuth, [ "not auth", "rejected", "not approved" ] ) )
            return $next($request);
        return response()->json([
            "message" => "احراز هویت انجام نشده است."
        ], 403);
    }
}
