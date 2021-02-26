<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Payment;

class OrderController extends Controller
{
    public function __construct() {

        $this->middleware('auth');
    }
    
    public function stats() {
        $orders = Payment::all();
        return view('pages.order-stats', compact('orders'));
    }

    public function index() {
        $orders = Payment::all();
        return view('pages.order-index', compact('orders'));
    } 
}
