<?php

namespace App\Http\Middleware;

use App\Models\Company;
use App\Models\Objective;
use Closure;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class OwnerShipCheck
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
        $user_id = null;

        if ($request->route()->parameter('company') !== null){
            $company = $request->route()->parameter('company');
            $user_id = $company->user_id;
        }
        elseif ($request->route()->parameter('objective') !== null){
            $objective = $request->route()->parameter('objective');
            $user_id = $objective->company->user_id;
        }
        elseif ($request->route()->parameter('keyResult') !== null){
            $keyResult = $request->route()->parameter('keyResult');
            $company = Company::find($keyResult->objective->company_id);
            $user_id = $company->user_id;
        }

        if ($user_id != \Auth::id() || $user_id == null)
        {
            abort(404);
        }
        return $next($request);
    }
}
