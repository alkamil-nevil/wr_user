<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $userRoleId = Auth::user()->role_id;
        if($userRoleId == 1) {
            return redirect('/home');
        }
        $userRoles  = DB::table('user_module_access')->join('user_modules', 'user_modules.id', 
            '=', 'user_module_access.user_module_id')->where('user_module_access.user_role_id', $userRoleId)->select('*')->get();
        $current_route = \Request::route()->getName();
        $allmodules = array();
        $modules = $userRoles->toArray();
        foreach ($modules as $key => $value) {
            array_push($allmodules, $value->route);
        }


        if(!in_array($current_route, $allmodules)) {
            return redirect('/home');
        }

        foreach ($modules as $key => $value) {
            if($value->show == 0) {
                unset($modules[$key]);
            }
        }

        $request->attributes->add(['modules' => $modules]);
        return $next($request);
    }
}
