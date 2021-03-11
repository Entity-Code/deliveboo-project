@extends('layouts.app')

@section('content')

        <div>@{{totCart}} in cart</div>
        <button @click="navigateTo('dishes')">Menù piatti</button>
        <button @click="navigateTo('cart')">Carrello</button>
        <a href="{{route('braintree-index')}}">
            <button>Vai al checkout</button>
        </a>
        

        <hr style="background: white;">

        


        <!-- dishes -->
        <div v-if="page === 'dishes'">    
            <h1>Menu</h1>

            <div v-for="(category, i) in categories">
                <div v-for="(dish, i) in dishes" v-if="dish.user_id == id && category.id == dish.category_id  && dish.status === 1" :key="dish.name">
                    <p>
                        Nome piatto: @{{dish.name}} <br>
                        Prezzo: @{{dish.price/100}}€ <br>
                        Categoria: @{{category.name}}
                    </p>
                    <button @@click="addItemToCart(dish)">Add to cart</button>     
                </div>
                <div v-for="(dish, i) in dishes" v-if="dish.user_id == id && category.id == dish.category_id && dish.status === 0" :key="dish.name">
                        Piatto non disponibile, scusateci!
                    <p>
                        nome: @{{dish.name}} <br>
                        prezzo: @{{dish.price/100}}€ <br>
                        categoria: @{{category.name}}
                    </p> 
                </div>
            </div>
        </div>

        <!-- cart -->
        <div v-if="page === 'cart'">    
        
            <h1>Il tuo carrello</h1>
            <div class="cart">
                <div v-for="(dish, i) in cart" :key="dish.name" v-if="dish.quantity > 0">
                    Nome piatto: @{{dish.name}} <br>
                    prezzo: @{{dish.price/100}}€
                    <br>
                    <button @@click="removeItemFromCart(dish)">Rimuovi piatto</button>
                    <div class="quantity">
                        @{{dish.quantity}}
                    </div>
                </div>
                <hr style="background: white;">
                <h2>Prezzo Totale @{{totPrice/100}} €</h2>

                {{-- <a href="#">
                    <button>Vai al checkout</button>
                </a> --}}
                
            </div>
        </div>


        

        

        <hr style="background: white;">


    

        
    {{-- checkout --}}
    <div :class="page === 'checkout' ? 'visible' : 'hidden'">
        ciao
    </div> 
    
        

@endsection 


