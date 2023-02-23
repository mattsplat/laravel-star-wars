<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() : \Illuminate\Contracts\View\View
    {
        return view('home');
    }

    public function people() : \Illuminate\Contracts\View\View
    {
        return view('people');
    }

    public function species() : \Illuminate\Contracts\View\View
    {
        return view('species');
    }

    public function films() : \Illuminate\Contracts\View\View
    {
        return view('films');
    }

    public function planets() : \Illuminate\Contracts\View\View
    {
        return view('planets');
    }
}
