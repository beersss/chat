<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\VerifiesEmails;

class VerificationController extends Controller
{
    // 使用Trait  这个用来验证邮箱
    use VerifiesEmails;

    /**
     * Where to redirect users after verification.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // 如果要用没在web中注册的中间件要在构造函数里面调用
    public function __construct()
    {
        // VerifiesEmails中的所有方法必须登录才能操作
        $this->middleware('auth');
        // VerifiesEmails的verify受signed中间件的影响
        $this->middleware('signed')->only('verify');
        // 重新发送验证邮件 受throttle中间件的影响 1分钟6次  只有verify和resend受影响
        $this->middleware('throttle:6,1')->only('verify', 'resend');
    }
}
