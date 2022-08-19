<?php


namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class VoucherActive
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
        if (!config('pw-config.system.apps.voucher')) {
            return redirect()->route('HOME');
        }
        return $next($request);
    }
}
