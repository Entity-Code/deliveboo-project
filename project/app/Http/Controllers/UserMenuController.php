<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Dish;
use App\Category;
use Braintree\Gateway;


class UserMenuController extends Controller
{

function getMenu($id){

        $user = User::FindOrFail($id);
        $dishes = Dish::all();
        $categories = Category::all();
    
        
        foreach ($categories as $key => $cat) {

            $dishes_all = [];
            foreach($dishes as $dish){
                if($dish -> category_id == $cat -> id){
                    $dishes_all[] = $dish;
                }
            }
            
            $categories[$key]['dishes'] = $dishes_all;
        }

        return response() -> json(compact('user','dishes','categories'));
    }

    
    public function show($id) {
        $categories = Category::all();
        $user = User::FindOrFail($id);
        $category = Category::FindOrFail($id);
        $dish = Dish::FindOrFail($id); 

        return view('pages.user-menu-show', compact( 'category','categories', 'dish', 'user'));
    }

    public function braintreeForm($id) {

        $user = User::findOrFail($id);

        $gateway = new Gateway([
          'environment' => config('services.braintree.environment'),
          'merchantId' => config('services.braintree.merchantId'),
          'publicKey' => config('services.braintree.publicKey'),
          'privateKey' => config('services.braintree.privateKey')
        ]);
  
        $token = $gateway->ClientToken()->generate();
  
        return view('pages.user-menu-show', compact('token','user'));
    }
  
    public function braintreePayment(Request $request) {
        
        //dd($request -> all());

        $gateway = new Gateway([
          'environment' => config('services.braintree.environment'),
          'merchantId' => config('services.braintree.merchantId'),
          'publicKey' => config('services.braintree.publicKey'),
          'privateKey' => config('services.braintree.privateKey')
        ]);
  
        $amount = $request -> amount;
        $nonce = $request -> payment_method_nonce;
  
        $result = $gateway->transaction()->sale([
            'amount' => $amount,
            'paymentMethodNonce' => $nonce,
            'options' => [
                'submitForSettlement' => true
            ]
        ]);
  
        if ($result->success) {
            $transaction = $result->transaction;
  
            // return redirect() -> route('welcome') ->  with('success_message', 'Transazione avvenuta con successo ' . 'Id: ' . $transaction-> id);
            return back() -> with('success_message', 'Transazione avvenuta con successo ' . 'Id: ' . $transaction-> id);
        } else {
            $errorString = "";
  
            foreach($result->errors->deepAll() as $error) {
                $errorString .= 'Error: ' . $error->code . ": " . $error->message . "\n";
            }
  
            return back() -> withErrors('Transazione annullata' . $result-> message);
        }
  
    }



}
