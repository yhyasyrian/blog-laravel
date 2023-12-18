<?php

namespace App\Http\Middleware;

use App\Models\Visitor;
use Carbon\Carbon;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Symfony\Component\HttpFoundation\Response;

class VisitorCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!$request->hasCookie('visited_'.date('Y-m-d'))) {
            Visitor::updateOrCreate(
                ['date'=>date('Y-m-d')],
                ['count' => Visitor::where('date','=',date('Y-m-d'))->value('count') + 1]
            );
            $cookieExpiration = Carbon::tomorrow()->diffInMinutes();
            Cookie::queue(Cookie::make('visited_'.date('Y-m-d'),'',$cookieExpiration,'/',null,true,true));
        }
        return $next($request);
    }
}
