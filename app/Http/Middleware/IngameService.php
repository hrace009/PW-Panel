<?php


namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class IngameService
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (!config('pw-config.system.apps.inGameService')) {
            return redirect()->route('HOME');
        }
        return $next($request);
    }
}
