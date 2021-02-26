<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function __construct() {

        $this->middleware('auth');
    }
 
    public function index() {
        
        $user = Auth::user();
        return view('home', compact('user'));
    }

    public function index2() {
        return view('home2');
    }
}
