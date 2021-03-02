@extends('layouts.app')

@section('content')

    <h1>
        lista degli ordini
        <a href="{{route('order-stats')}}" class="btn btn-primary btn-lg">statistiche</a> 
    </h1>

        @foreach ($orders as $order)  
            <ul>
                @foreach ($order -> dishes as $dish)
                    @if (Auth::user() -> id === $dish -> user_id)       
                        <li> 
                            @if ($loop -> parent -> count)
                                
                                <a href="{{route('order-show', $order -> id)}}">total price: {{$order -> total_price/100}} (id:{{$order -> id}})</a> 
                            @break
                            @endif 
                        </li>
                    @endif
                @endforeach
            </ul>                        
        @endforeach
    
@endsection
 