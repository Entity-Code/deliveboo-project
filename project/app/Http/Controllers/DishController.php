<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Dish;
use App\Category;


class DishController extends Controller
{
    
    public function __construct() {

        $this->middleware('auth');
    }
    
    public function index() {
        
        $dishes = Dish::all();
        
        return view('pages.dish-index', compact('dishes'));
    }

    public function create() {

        $dishes = Dish::all();
        $categories = Category::all();

        return view('pages.dish-create', compact('dishes', 'categories'));
    }

    public function store(Request $request) {
        //dd($request -> all());
        
        $newDish = Dish::make($request -> all());
        //dd($newDish);
        
        $category = Category::findOrFail($request -> get('category_id'));
        $newDish -> category() -> associate($category);
        $newDish -> save(); 
        //dd($newDish);
        
        //return redirect() -> route('dish-index');

        /*
        $data = Request::all();
        $dish = Dish::findOrFail($data['category_id']);
        $category = Category::make($request -> all());
        $category -> dish() -> associate($dish);
        $category -> save(); 
        
        
        */
        

    }


}
