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
        
        //dd($newDish);
        
        $user = User::findOrFail($request -> get('user_id'));
        $newDish = Dish::make($request -> all());
        $newDish -> user() -> associate($user);
        $newDish -> save();
        
        //dd($newDish);
        
        $categories = User::findOrFail($request -> get('categories'));
        $newDish -> categories() -> attach($categories);

        //return redirect() -> route('dish-index');
        

    }


}
