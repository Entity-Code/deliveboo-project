<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Dish;
use App\Category;
use App\User;


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

        $users = User::all();
        $dishes = Dish::all();
        $categories = Category::all();

        return view('pages.dish-create', compact('dishes', 'users', 'categories'));
    }

    public function store(Request $request) {
        //dd($request -> all());

        $newDish = Dish::make($request -> all());

        $user = User::findOrFail($request -> get('user_id'));
        $category = Category::findOrFail($request -> get('category_id'));

        $newDish -> user() -> associate($user);
        $newDish -> category() -> associate($category);

        $newDish -> save();
        
        return redirect() -> route('dish-index');
        
    }


    public function delete($id) {

        $dish = Dish::findOrFail($id);
        $dish -> delete();

        return redirect() -> route('dish-index');
    }


}
