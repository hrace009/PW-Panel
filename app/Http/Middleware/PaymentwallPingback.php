<?php


namespace App\Http\Middleware;

use Closure;
use hrace009\PerfectWorldAPI\API;
use Illuminate\Http\Request;

class PaymentwallPingback
{
    /**
     * @var string[]
     */
    public array $ipsWhitelist = [
        '174.36.92.186',
        '174.36.96.66',
        '174.36.92.187',
        '174.36.92.192',
        '174.37.14.28'
    ];

    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return string
     */
    public function handle(Request $request, Closure $next)
    {
        $api = new API();
        if (!in_array($request->ip(), $this->ipsWhitelist, true)) {
            abort(403, __('general.restricted'));
        }
        if (!$api->online) {
            abort(403, __('general.serverOffline'));
        }
        return $next($request);
    }
}
