<?php

namespace App\Http\Controllers;

use App\Handlers\ImageUploadHandler;
use App\Http\Requests\UserUpdateRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('show');
    }

    // 路由中传过来的用户id，就可以获得这个用户的实例。 这叫做隐性路由模型绑定
    public function show(User $user)
    {
        // $user是用户实例
        // dd($user->toArray());
        return view('users.show', compact('user'));
    }

    // 显示用户编辑页面
    public function edit(User $user)
    {
        $this->authorize('update', $user);
        return view('users.edit', compact('user'));
    }

    // 更新用户数据
    public function update(UserUpdateRequest $request, User $user, ImageUploadHandler $uploader)
    {
        $this->authorize('update', $user);
        $data = $request->all();
        if($request->avatar) {
            $result = $uploader->save($request->avatar, 'avatars', Auth::id(), 300,true);
            if($result) {
                $data['avatar'] = $result['path'];
            }
        }
        $user->update($data);
        session()->flash('success', '恭喜您，修改成功');
        return redirect()->route('users.show', $user->id);

    }

}

