@extends('layouts.app')

@section('title', $user->name . '的个人空间')

@section('content')
    <div class="row">
        <div class="col-md-3">
            <div class="card">
                <img src="{{ $user->avatar }}"  class="img-thumbnail border-0 rounded" alt="avatar">
                <div class="card-body">
                    <hr>
                    <h5 class="text-center text-muted">
                        <i class="fa-solid fa-user"></i>
                        用户名
                    </h5>
                    <h4 class="text-center text-success" >{{ $user->name }}</h4>

                    <hr>
                    <h5 class="text-center text-muted">
                        <i class="fa-solid fa-clipboard"></i>
                        用户简介
                    </h5>
                    <h4 class="text-center text-success" >
                        {{ $user->introduction }}
                    </h4>

                    <hr>
                    <h5 class="text-center text-muted">
                        <i class="fa-solid fa-clock"></i>
                        注册时间
                    </h5>
                    <h4 class="text-center text-success" >
                        {{ $user->created_at->diffForHumans() }}
                    </h4>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="card">
                <div class="card-body">
                    <h1>{{$user->name}} -- <small>{{ $user->email }}</small></h1>
                </div>
            </div>
            <div class="card mt-2">
                <div class="card-body">
                    <h1>暂无信息</h1>
                </div>
            </div>
        </div>
    </div>
@endsection
