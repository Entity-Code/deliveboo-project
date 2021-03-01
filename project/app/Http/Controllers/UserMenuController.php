<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Dish;
use App\Category;


class UserMenuController extends Controller
{
    /*  public function index(){
        
        $categories = Category::all();
        $dishes = Dish::all();
        return view ('pages.user-menu-show' , compact('categories', 'dishes', 'users'));
    }
    */
    public function show($id) {
        $categories = Category::all();
        $user = User::FindOrFail($id);
        $category = Category::FindOrFail($id);
        $dish = Dish::FindOrFail($id); 

        return view('pages.user-menu-show', compact( 'category','categories', 'dish', 'user'));
    }
}
