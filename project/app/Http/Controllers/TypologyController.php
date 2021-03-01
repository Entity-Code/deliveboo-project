<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Typology;
use App\User;

class TypologyController extends Controller
{
    public function index() {

        $typs = Typology::all();
        $users = User::all();
        return view('welcome', compact('typs', 'users'));
    } 

    public function show($id) {
        
        $typ = Typology::FindOrFail($id);
        $user = User::FindOrFail($id); 

        return view('pages.typology-show', compact('typ', 'user'));
    }
}
