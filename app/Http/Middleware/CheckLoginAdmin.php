<?php

namespace App\Http\Middleware;
use Closure;
use Illuminate\Foundation\Auth\User as Authenticatable;


class CheckLoginAdmin
{
    public function handle($request, Closure $next)
    {
        if(!get_data_user('admin'))
        {
            return redirect('/admin/login');
        }
        return $next($request);
    }

}