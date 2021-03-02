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
    
    //index (senza show)
    public function index() {
        
        $dishes = Dish::all();

        return view('pages.dish-index', compact('dishes'));
    }

    //create-store
    public function create() {

        $users = User::all();
        $dishes = Dish::all();
        $categories = Category::all();
        
        return view('pages.dish-create', compact('dishes', 'users', 'categories'));
    }
    public function store(Request $request) {
        //dd($request -> all());

        $request = $this -> conversion($request);

        //validazione
        /*
        Validator::make($request -> all(), [
            'name' => 'required|min:5|max:15',
            'description' => 'required|min:5|max:20,
            ...
        ]) -> validate();
        */

        $newDish = Dish::make($request -> all());

        $user = User::findOrFail($request -> get('user_id'));
        $category = Category::findOrFail($request -> get('category_id'));

        $newDish -> user() -> associate($user);
        $newDish -> category() -> associate($category);

        $newDish -> save();

        

        return redirect() -> route('dish-index');   
    }

    //edit-update
    public function edit($id) {

        $users = User::all();
        $categories = Category::all();

        $dish = Dish::findOrFail($id);

        return view('pages.dish-edit', compact('users','categories','dish'));
    }
    public function update(Request $request, $id) {

        $request = $this -> conversion($request);
        $data = $request -> all();
        //dd($data);

        //validazione
        /*
        Validator::make($data, [
            'name' => 'required|min:5|max:15',
            'description' => 'required|min:5|max:20,
            ...
        ]) -> validate();
        */
        
        

        $user = User::findOrFail($data['user_id']);
        $category = Category::findOrFail($data['category_id']);

        $editDish = Dish::findOrFail($id);
        $editDish -> update($data);

        $editDish -> user() -> associate($user);
        $editDish -> category() -> associate($category);

        $editDish -> save();
        
        return redirect() -> route('dish-index');
        
    }

    //delete
    public function delete($id) {

        $dish = Dish::findOrFail($id);
        $dish -> delete();

        return redirect() -> route('dish-index');
    }

    //conversione euro -> cent (richiamata in store)
    private function conversion($request) {

        $price = $request -> get('price') * 100;
        $request -> merge([
            'price' => $price
        ]);
        
        return $request;
    }

    // //IMG UPLOAD DISHES
        // //upload img
        // public function updateLogo(Request $request) {
            
        //     //DA FARE PER VERIFICARE CHE FUNZIONI TUTTO
        //     //prendo l'icona inserita dall'utente
        //     $data = $request -> all();
        //     //usiamo la funzione file('colonna') per passare i dati 'complessi', in questo caso un immagine
        //     $image = $request -> file('img_dish');
        //     //dd($data, $image); 
        
        // 	//evita l'accumulamento delle img (PUNTO 7)
        //     // $this -> deleteLogo();
    
        // 	//ALGORITMO PER RISOLVERE IL CONFLITTO DEI NOMI DEI FILE
        // 		//ricaviamo l'estensione del file caricato    
        //     $ext = $image -> getClientOriginalExtension();
        //     //creiamo il nome del file updato, formato da un n. random da n. a m. + tempo in millisecondi
        //     $name = rand(100000, 999999) . '_' . time();
        // 		//nome file completo
        //     $destFile = $name . '.' . $ext;
            
        //     $file = $image -> storeAs('img_dish', $destFile, 'public');
    
        //     //SALVIAMO L'INFORMAZIONE NEL DB
        //     $dish = dish();
        //     //il valore della colonna icon sarà uguale al file
        //     $dish -> img_dish = $destFile;
        //     $dish -> save();
                    
            //dd($image, $ext, $name, $destFile);
        // }
    
        // public function clearLogo() {
                    
        //     //evita l'accumulamento delle img (PUNTO 7)
        //     $this -> deleteLogo();
    
        //     //recupero lo dish
        //     $dish = Auth::dish();
        //     //tolgo il valore icon e metto NULL
        //     $dish -> img_dish = null;
        //     //vado a salvare
        //     $dish -> save();
    
        //     return redirect() -> back();
        // }
    
        // private function deleteLogo() {
            
        //     //recupero lo dish e la sua icona
        //     $dish = Auth::dish();
     
        //     //prova ad eseguire queste cose
        //     try {
                 
        //         //nome del file da eliminare
        //         $fileName = $dish -> logo;
                         
        //         //percorso file da eliminare
        //         $file = storage_path('app/public/logo/'.$fileName);
         
        //         $res = File::delete($file);
        //         //se avviene qualunque errore, non fare nulla
        //     } catch (\Exception $e) { } //do nothing
        // }
      
}       

