<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;

class CheckUserRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, ...$roles)
    {
        $user = User::find(session()->get('user_id'));
        foreach ($roles as $role){
            if ($user->roles()->where('name',$role)->first()){
                return $next($request);
            }
        }

        return redirect(url('/'));


    }
}
