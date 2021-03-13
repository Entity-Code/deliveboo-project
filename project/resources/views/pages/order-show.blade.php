


@extends('layouts.app')
​
@section('content')
​
    <div class="containerOrder">
      <div class="dashboard__box--flex--menu--right--container">
        <div class="dish__box orderbox_">
            <h3><strong>Ordine n. {{$order -> id}}</strong> </h3>
            <h3>Pagante: {{$order-> firstname}} {{$order-> lastname}}</h3>
            <h3>Email: <a href="#">{{$order -> email}}</a> </h3>
            <h3>Indirizzo: {{$order -> address}}</h3>
            <h3>Totale: {{$order -> total_price}} €</h3>
            @if ($order -> note !== null)
              <h3>Note: {{$order -> note}}</h3>
            @endif
            <div class="dishesOrder_">
              <h3>Piatti: </h3>
              <ul>
                @foreach ($order -> dishes as $dish)
                    <li class="stylelistOrder_">{{$dish -> name}}</li>
                @endforeach
              </ul>
​
            </div>
        </div>
      </div>
​
  </div>
  <div class="dashboard__box--flex--menu--left">
      <a href="{{route('home')}}" class="go-back">Torna alla home</a>
  </div>
​
​
@endsection
