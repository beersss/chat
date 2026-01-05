<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class EnsureEmailIsVerified
{
    public function handle(Request $request, Closure $next)
    {
        // 用户已经登录并且登录用户还没有被认证
        if($request->user() && !$request->user()->hasVerifiedEmail() &&
            // email邮件认证相关的路由不拦截，退出页路由不拦截
            !$request->is('email/*', 'logout')
        ){
            return $request->expectsJson() ?
                abort(403, '您的邮箱还未激活认证') :
                redirect()->route('verification.notice');
        }
        return $next($request);
    }
}
