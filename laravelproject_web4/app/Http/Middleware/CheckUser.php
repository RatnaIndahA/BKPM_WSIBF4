<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckUser
{
    public function handle(Request $request, Closure $next): Response
    {
        if (auth()->user() && auth()->user()->role !== 'admin') {
            return redirect('/home')->with('error', 'Anda tidak memiliki akses');
        }

        return $next($request);
    }
}