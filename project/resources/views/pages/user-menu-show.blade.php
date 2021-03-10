@extends('layouts.app')

@section('content')

        <div>@{{totCart}} in cart</div>
        <button @click="navigateTo('dishes')">Menù piatti</button>
        <button @click="navigateTo('cart')">Carrello</button>
        <button @click="navigateTo('checkout')">Vai al checkout</button>

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

                {{-- <a href="#">
                    <button>Vai al checkout</button>
                </a> --}}
                
            </div>
        </div>


        

        

        <hr style="background: white;">


    

        
    {{-- checkout --}}
    <div :class="page === 'checkout' ? 'visible' : 'hidden'">
        <div>
            @if (session('success_message'))
            <div class="alert alert-success">
                {{ session('success_message')}}
            </div>
            @endif
            @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
        </div>
    
        <form method="post" id="payment-form" action="{{route('braintree-payment')}}" >
            @csrf
            @method('POST')

            <section>
                <label for="amount">
                    <h2 class="input-label">Totale Carrello</h2>
                    <div class="input-wrapper amount-wrapper">
                        <input id="amount" name="amount" type="tel" min="1" placeholder="Amount" :value="totPrice/100">
                    </div>
                </label>
                    
                <div class="bt-drop-in-wrapper">
                    <div id="bt-dropin"></div>
                </div>
            </section>
            
            <input id="nonce" name="payment_method_nonce" type="hidden">
            <button  class="button btn btn-primary return" type="submit">Paga Ora</button> 
        </form>   
        <br>
        
        {{-- return --}}
        <a href="/" class="btn btn-primary return">Torna alla home</a>
        
        <script src="https://js.braintreegateway.com/web/dropin/1.26.1/js/dropin.min.js"></script>
        <script>
            var form = document.querySelector('#payment-form');
            var client_token = "{{$token}}";
            
            braintree.dropin.create({
                authorization: client_token,
                selector: '#bt-dropin'
            }, function (createErr, instance) {
                if (createErr) {
                    console.log('Create Error', createErr);
                    return;
                }
                form.addEventListener('submit', function (event) {
                    event.preventDefault();
                    
                    instance.requestPaymentMethod(function (err, payload) {
                        if (err) {
                            console.log('Request Payment Method Error', err);
                            return;
                        }
                        
                        // Add the nonce to the form and submit
                        document.querySelector('#nonce').value = payload.nonce;
                        form.submit();
                    });
                });
            });
            </script>
    </div> 
    
        

@endsection 


