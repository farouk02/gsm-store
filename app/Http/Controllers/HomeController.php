<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function locale($locale)
    {
        session(['locale' => $locale]);
        return redirect()->back();
    }

    public function index()
    {
        return view('home');
    }
}
