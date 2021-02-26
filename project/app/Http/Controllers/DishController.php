<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Dish;
use App\Category;


class DishController extends Controller
{
    public function index() {
        
        $dishes = Dish::all();
        
        return view('pages.dish-index', compact('dishes'));
    }

    public function create() {

        $dishes = Dish::all();
        //$categories = Category::all();

        return view('pages.dish-create', compact('dishes'));
    }

    public function store(Request $request) {

        $newDish = Dish::make($request -> all());
        $category = Category::findOrFail($request -> get('category_id'));
        $newDish = category() -> associate($category);
        $newDish -> save(); 

        return redirect() -> route('dish-index');

        /*
        $data = Request::all();
        $dish = Dish::findOrFail($data['category_id']);
        $category = Category::make($request -> all());
        $category -> dish() -> associate($dish);
        $category -> save(); 
        
        
        */
        

    }


}
