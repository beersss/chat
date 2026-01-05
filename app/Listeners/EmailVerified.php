<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Verified;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class EmailVerified
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    // 具体的方法和业务逻辑写在这里面
    public function handle(Verified $event)
    {
        session()->flash('success', '恭喜您， 邮箱账号激活成功!');
    }
}
