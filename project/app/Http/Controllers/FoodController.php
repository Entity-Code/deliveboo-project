<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Food;

class FoodController extends Controller
{
    public function __construct() {

        $this->middleware('auth');
    }
    
    public function index() {

    }
}
