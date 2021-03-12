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
                                
                                
                                <a href="{{route('order-show', $order -> id)}}">
                                    - {{$order -> firstname}} {{$order -> lastname}} - {{$order -> total_price}}€   /   {{$order -> created_at}}
                                </a> 
                                
                            @break
                            @endif
                        </li>
                    @endif
                @endforeach
            </ul>                        
        @endforeach
    
@endsection 
 