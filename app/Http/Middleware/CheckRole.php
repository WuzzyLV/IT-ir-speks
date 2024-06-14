<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
//    Roles in order, lower number means higher role
    private static array $roles= [
        'root' => 1,
        'admin' => 2,
        'moderator' => 3,
    ];
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */


    public function handle(Request $request, Closure $next, $role): Response
    {
        $userRole = $request->user()->role->name;

        if (self::$roles[$userRole] > self::$roles[$role]) {
            return redirect()->back()->withErrors(['error' => 'Tev nav atļaujas veikt šo darbību!']);
        }
        return $next($request);
    }
}
