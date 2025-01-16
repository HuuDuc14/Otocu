<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function showPageHome() {
        return view('pages.home');
    }

    
}
