<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class HasCookie
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(Auth::check()){
            switch (Auth::user()->role) {
                case 'student':
                    return redirect()->route('student.schedule.index');
                    break;
                case 'teacher':
                    return redirect()->route('teacher.schedule.index');
                    break;
                case 'admin':
                    return redirect()->route('admin.dashboard.index');
                    break;
                default:
                    abort(404);
                    break;
            }
        }
        return $next($request);
    }
}
