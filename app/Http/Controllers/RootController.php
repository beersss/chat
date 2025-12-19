<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RootController extends Controller
{
    public function root()
    {
        session()->flash('info', '欢迎来到Laravel实战项目');
        return view('pages.root');
    }
}
