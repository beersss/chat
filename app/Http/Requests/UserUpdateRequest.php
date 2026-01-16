<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class UserUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // 权限开启
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        // 这里直接写验证规则
        return [
            'name'=>['required', 'between:2,100', 'regex:/^[\x{4e00}-\x{9fa5}A-Za-z0-9\-\_]+$/u', Rule::unique('users')->ignore(Auth::id())],
            'email'=>['required', 'email'],
            'introduction'=>['between:3, 200'],
            'avatar'=>['mimes:png,gif,jpg,jpeg', 'dimensions:min_width=300,min_height=300']
        ];
    }

    public function messages()
    {
        return [
            'avatar.dimensions'=>'图片宽高不能小于300像素'
        ];
    }

    public function attributes()
    {
        return [
                'name' => '用户名',
                'email' => '邮箱',
                'password' => '密码',
                'introduction' => '个人简介',
                'avatar'=> '用户头像'
        ];
    }
}
