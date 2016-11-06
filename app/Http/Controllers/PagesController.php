<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class PagesController extends Controller
{

    public function home()
    {
        $user = Auth::user();

        return view('welcome', compact('user'));
    }

    public function help()
    {
        $user = Auth::user();

        return view('help', compact('user'));
    }

    public function contact()
    {
        $user = Auth::user();

        return view('contact', compact('user'));
    }
}
