@extends('layouts.app')

@section('content') 
    
    <h1 class="btn btn-warning btn-lg">lista dishes (foods)</h1>
    
    <a href="{{route('dish-create')}}" class="btn btn-primary">Crea un nuovo piatto</a>
    <ul>
        @foreach ($dishes as $dish)
            <li>
               
                @if (Auth::user() -> id === $dish -> user_id)
                    
                    name: {{$dish -> name}} <br>
                    price: {{$dish -> price}} <br>
                    description: {{$dish -> description}} <br>
                @endif
                
            </li>
            <hr>
        @endforeach
    </ul>

@endsection 