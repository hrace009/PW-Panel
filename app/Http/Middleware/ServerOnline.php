<?php





namespace App\Http\Middleware;

use Closure;
use hrace009\PerfectWorldAPI\API;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ServerOnline
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return Response|RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $api = new API();
        if (!$api->online) {
            $status = __('general.serverOffline');
            return redirect()->back()->with('error', $status);
        }
        return $next($request);
    }
}
