@extends('layouts.app')

@section('content')
    <div class="p-3 mr-5">
      
      <div class="order-box">
          <div class="orderr">

            <h1>Dettagli ordini ricevuti</h1>
            <hr>
            <h3>Pagante: {{$order-> firstname}} {{$order-> lastname}}</h3>
            <h3>Email: {{$order -> email}}</h3>
            <h3>Indirizzo: {{$order -> address}}</h3>
            <h3>Totale: {{$order -> total_price}} €</h3>
            @if ($order -> note !== null)
              <h3>Note: {{$order -> note}}</h3>
            @endif
            
            <h3>Piatti: </h3>
            <ul>
              @foreach ($order -> dishes as $dish)
                <li class="stylelistOrder_">{{$dish -> name}}</li>
              @endforeach
            </ul>
          </div>

        </div>

        <div class="dashboard__box--flex--menu--left">
          <a href="{{route('home')}}" class="go-back">Torna alla home</a>
        </div>
    </div>
@endsection 

