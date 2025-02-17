<?php

namespace App\Http\Middleware;

use Auth;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */

    public function handle(Request $request, Closure $next, ...$roles)
    {
        $user = Auth::user();

        // Kiểm tra nếu user đã đăng nhập và có role phù hợp
        if ($user && in_array($user->role, $roles)) {
            return $next($request);
        }

        // Nếu không có quyền, redirect hoặc trả về lỗi 403
        return redirect()->route('cars');

        // Kiểm tra nếu người dùng chưa đăng nhập hoặc role không khớp
        // if (!Auth::check() || Auth::user()->role !== $role) {
        //     return redirect()->route('cars');
        // }

        // // Tiến hành tiếp tục xử lý request nếu role hợp lệ
        // return $next($request);
    }
}
