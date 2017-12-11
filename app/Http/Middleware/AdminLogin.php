<?php

namespace App\Http\Middleware;

use App\Models\AdminGroup;
use App\Models\AdminRule;
use Closure;
use Illuminate\Support\Facades\Request;
class AdminLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (empty(session('admin'))){
            return redirect('admin/index/login');
        }

        return $next($request);
    }
}
