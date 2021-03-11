<!doctype html>
<html lang="{{ str_replace('_', '-', app() -> getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('sass/app.scss') }}">
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous"/>
</head>
<body>
    
    
    {{-- braintree --}}
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

        <div class="content">
            <form method="post" id="payment-form" action="{{route('braintree-payment')}}" >
                @csrf
                @method('POST')

                <section>
                    <label for="amount">
                        <h2 class="input-label">Totale Carrello</h2>
                        <div class="input-wrapper amount-wrapper">

                            {{-- value --}}
                            <input value="0" id="amount" name="amount" type="tel" min="1" placeholder="Amount" style="display: none;" onlyread>
                            
                            {{-- show --}}
                            <input style="cursor: default; border-radius: 10px; margin: 15px; outline: none; text-align: center;" type="text" id="amountShow" readonly> 
                            <span style="position: relative; right: 50px;">€</span>
                            

                        </div>
                    </label>
                        
                    <div class="bt-drop-in-wrapper">
                        <div id="bt-dropin"></div>
                    </div>
                </section>
                
                <input id="nonce" name="payment_method_nonce" type="hidden">
                <button class="button btn btn-primary return" type="submit">Paga Ora</button> 
            </form>   
            <br>
            
            {{-- return --}}
            <a href="/" class="btn btn-primary return" id="home">Torna alla home</a>
            
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

            <script>
                

                var input = document.querySelector('#amount');
                var total = parseInt(localStorage.totPrice);
                var msg = 'Puoi tornare alla home, buon appetito!';
                var home = document.querySelector('#home');

                input.value = total/100;

                var amountShow = document.querySelector('#amountShow');

                if (!(isNaN(input.value))) {
                    amountShow.value = input.value;
                } else {
                    amountShow.value = 'Buon appetito!';  
                }

                

              
                
                
                
            </script>
            
        </div>

        











    
</body>
</html>
