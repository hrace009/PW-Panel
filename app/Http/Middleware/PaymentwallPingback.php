<?php



/*
 * @author Harris Marfel <hrace009@gmail.com>
 * @link https://youtube.com/c/hrace009
 * @copyright Copyright (c) 2022.
 */

namespace App\Http\Middleware;

use Closure;
use hrace009\PerfectWorldAPI\API;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\IpUtils;

class PaymentwallPingback
{
    /**
     * @var string[]
     */
    public array $ipsWhitelist = [
        '216.127.71.0/24'
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
        if (!IpUtils::checkIp($request->ip(), $this->ipsWhitelist)) {
            abort(403, __('general.restricted'));
        }
        if (!$api->online) {
            abort(403, __('general.serverOffline'));
        }
        return $next($request);
    }
}
