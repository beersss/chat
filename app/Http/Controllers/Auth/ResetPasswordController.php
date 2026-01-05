<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;

class ResetPasswordController extends Controller
{
    // 使用了这个Trait 实现充值密码
    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    // 因为继承了ResetsPasswords这个Trait  可以通过方法的重写
    protected function sendResetResponse(Request $request, $response)
    {
        session()->flash('success', '恭喜你，密码修改成功了');
        return redirect($this->redirectPath());
    }
}
