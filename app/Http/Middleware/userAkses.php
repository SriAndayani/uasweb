<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class userAkses
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */

    //disini kita setting agar melakukan pengecekan role yang di miliki oleh setiap user
    // kalau misalnya role ini sesuai dengan hak aksesnya maka diperbolehkan untuk membukanya
    // kalau misalnya engga sesuai hak aksesnya maka dia di kasi pesan/redirect
    // public function handle(Request $request, Closure $next, $role): Response
    // {
    //     if(auth()->user()->role == '$role'){
    //         return $next($request);
    //     }
    //     return redirect('');
    // }
}
