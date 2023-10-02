<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VerifyKYC
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
        $user = $request->user();
        if (!$user->hasSubmittedKYC()) {
            return redirect(RouteServiceProvider::KYC);
        } elseif (!$user->isKYCApproved()) {
            Auth::logout();
            return redirect()->route('login')->with('info', 'Your documents is Undergoing verification!');
        }
        return $next($request);
        
    }
}
