<?php

namespace App\Http\Controllers;

use App\Handlers\ImageUploadHandler;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RootController extends Controller
{


    public function root(ImageUploadHandler $uploader)
    {
        return view('pages.root');
    }


}
