<?php

use Illuminate\Support\Facades\Route;



Route::get('/', 'RootController@root')->name('root');


Auth::routes(['verify' => true]);









