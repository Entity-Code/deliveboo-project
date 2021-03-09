@extends('layouts.app')

@section('content')

    {{-- <h1>restaurant-menu</h1>
    restaurant id: {{$user -> id}} <br>
    
    @foreach ($user -> dishes as $dish )
        
        <h3>
            <small>category name:</small>  {{$dish -> category -> name}} { {{$dish -> category -> id}} }
        </h3>
            {{$dish -> name}} {{$dish -> id}}<br>
           
    @endforeach --}}
        
        {{-- StoreDishes component --}}
        {{-- <store-dishes
            :id="{{$user -> id}}"
        ></store-dishes> --}}
        <div>
        

        <div>@{{totCart}} in cart</div>
        <button @click="navigateTo('dishes')">View Menu</button>
        <button @click="navigateTo('cart')">View Cart</button>

        <hr style="background: white;">

        


        <!-- dishes -->
        <div v-if="page === 'dishes'">    
        <h1>Restaurant menu</h1>

            <div v-for="(category, i) in categories">
                <div v-for="(dish, i) in dishes" v-if="dish.user_id == id && category.id == dish.category_id" :key="dish.name">
                    <p>
                        dish name: @{{dish.name}} <br>
                        dish price: @{{dish.price/100}}€ <br>
                        dish category: @{{category.name}}
                    </p>
                    <button @click="addItemToCart(dish)">Add to cart</button>     
                </div>
            </div>
        </div>

        <!-- cart -->
        <div v-if="page === 'cart'">    
        
            <h1>Your cart</h1>
            <div class="cart">
                <div v-for="(dish, i) in cart" :key="dish.name">
                    dish name: @{{dish.name}} <br>
                    dish price: @{{dish.price/100}}€
                    <br>
                    <button @click="removeItemFromCart(dish)">Remove item</button>
                    <div class="quantity">
                        @{{dish.quantity}}
                    </div>
                </div>
                <hr style="background: white;">
                <h2>Total price: @{{totPrice/100}} €</h2>

                <button @click="sendTotPrice()">Vai al checkout</button>
            </div>
        </div>

        

        <hr style="background: white;">


    </div>
    
        

@endsection 


