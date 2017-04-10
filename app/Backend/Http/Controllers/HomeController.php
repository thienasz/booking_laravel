<?php

namespace App\Backend\Http\Controllers;

use Psy\Exception\RuntimeException;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('home');
    }
}
