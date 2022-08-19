<?php





namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class SetLanguage
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
        if ($request->has('language')) {
            if (Auth::user()) {
                Auth::user()->language = $request->language;
                Auth::user()->save();
            }
            App::setLocale($request->language);
        } elseif (Auth::user()) {
            App::setLocale(Auth::user()->language);
        }
        return $next($request);
    }
}
