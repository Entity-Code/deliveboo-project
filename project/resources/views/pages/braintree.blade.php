@extends('layouts.app')

@section('content')

  
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
          
          <form method="post" id="payment-form" action="{{route('braintree-payment')}}">
            @csrf
            @method('POST')
            <section>
                <label for="amount">
                    <h2 class="input-label">Totale Carrello</h2>
                    <div class="input-wrapper amount-wrapper">
                        {{-- <input id="amount" name="amount" type="tel" min="1" placeholder="Amount" value="10"> --}}
                        <input-brain></input-brain>
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
          <a href="{{route('home')}}" class="btn btn-primary return">Torna alla home</a>
        
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



@endsection
