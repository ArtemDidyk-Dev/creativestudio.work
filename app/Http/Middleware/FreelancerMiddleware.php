<?php

namespace App\Http\Middleware;

use App\Services\CommonService;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FreelancerMiddleware
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

        $user = CommonService::userRoleId(Auth::id());

        if($user == 3){
            return redirect()->route('frontend.dashboard.employer');
        }

        return $next($request);
    }
}
