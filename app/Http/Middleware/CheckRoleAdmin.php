<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckRoleAdmin
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
        if (Auth::check() && Auth::user()->role_id == 1) {
            // Cho phép thêm, xóa, chỉnh sửa
            $request->attributes->add(['allow_all' => true]);
            return $next($request);
        } else if (!Auth::check()) {
            return redirect(route('admin.login'));
        }

        return redirect('/')->with('error', 'Bạn không có quyền truy cập trang này');
    }


}
