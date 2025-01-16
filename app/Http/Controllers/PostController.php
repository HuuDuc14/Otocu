<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function form_post() {
        return view('pages.post');
    }
}
