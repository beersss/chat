@extends('layouts.app')

@section('title', $user->name . '的个人编辑页面')

@section('content')
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header ">
                    <h3 class="pt-2 text-center">
                        <i class="fa-solid fa-pen-to-square"></i>
                        编辑个人信息
                    </h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('users.update', $user->id) }}" method="POST" accept-charset="UTF-8"
                          enctype="multipart/form-data"
                    >
                        @csrf
                        {{ method_field('PUT') }}
                        @include('shard._errors')
                        <div class="mb-3">
                            <label for="name" class="form-label">用户名</label>
                            <input type="text"
                                   class="form-control"
                                   id="name"
                                   name="name"
                                   placeholder="请输入用户名"
                                   value="{{ old('name', $user->name) }}"
                            >
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">邮箱</label>
                            <input type="email"
                                   class="form-control"
                                   id="email"
                                   name="email"
                                   readonly
                                   value="{{ old('email', $user->email) }}"
                            >
                        </div>
                        <div class="mb-3">
                            <label for="introduction" class="form-label">个人简介</label>
                            <textarea class="form-control" name="introduction" id="introduction" rows="3">{{ old('introduction', $user->introduction ) }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="avatar" class="form-label">用户头像</label>
                            <input type="file"
                                   class="form-control"
                                   id="avatar"
                                   name="avatar"
                            >
                        </div>
                        @if($user->avatar)
                            <img width="200" class="img-thumbnail" src="{{ $user->avatar }}" alt="avatar">
                        @endif
                        <hr>
                        <div class="mb-3 text-center">
                            <button type="submit" class="btn btn-primary">提交</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
