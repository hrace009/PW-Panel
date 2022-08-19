<?php
/*
 * @author Harris Marfel <hrace009@gmail.com>
 * @link https://www.hrace009.com
 * @copyright Copyright (c) 2022.
 */

namespace App\Http\Middleware;

use App\Models\Service;
use Closure;
use Illuminate\Http\Request;

class ServiceEnabled
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
        $service = Service::find($request->segment(3));
        if (!$service->enabled) {
            $type = 'error';
            $message = __('service.disable');
            return redirect()->back()->with($type, $message);
        }
        return $next($request);
    }
}
