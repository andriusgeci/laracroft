<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');
    }

    public function dashboard()
    {
        return view('dashboard');
    }
}
