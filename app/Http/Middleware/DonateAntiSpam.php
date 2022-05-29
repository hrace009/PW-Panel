<?php

namespace App\Http\Middleware;

use App\Models\BankLog;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DonateAntiSpam
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
        if (BankLog::whereLoginid(Auth::user()->name)->whereStatus('pending')->count('loginid') > 0) {
            $status = 'error';
            $message = __('donate.guide.bank.form.unfinish');
            return redirect()->back()->with($status, $message);
        }
        return $next($request);
    }
}
