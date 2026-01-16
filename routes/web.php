<?php

use Illuminate\Support\Facades\Route;



Route::get('/', 'RootController@root')->name('root');


Auth::routes(['verify' => true]);

// 用户资源路由  only() 里面是只生成需要的路由
Route::resource('users', 'UsersController')->only('show', 'update', 'edit');










