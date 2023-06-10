<?php

namespace App\Http\Middleware;
use App\Models\Cart;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\Response;

class Session
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if($request->hasCookie('uuid')) {
            return $next($request);
        }

        $uuid = Str::uuid();

        return $next($request)->withCookie(cookie('uuid', $uuid, 525600));
    }
}
