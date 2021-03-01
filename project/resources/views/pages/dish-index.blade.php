@extends('layouts.app')

@section('content') 
    
    <h1 class="btn btn-warning btn-lg">dishes list ({{Auth::user() -> name}}, id: {{Auth::user() -> id}})</h1>
    
    <a href="{{route('dish-create')}}" class="btn btn-primary">Crea un nuovo piatto</a>
    <ul>
            
        @foreach ($dishes as $dish)
                
                @if (Auth::user() -> id === $dish -> user_id)
                    <li class="card p-3 mr-5">
                        <h4>name: {{$dish -> name}}(user_id: {{Auth::user() -> id}})</h4>
                        <img src="{{$dish -> img_dish}}" width="200px">
                        <p>
                            Category: {{$dish -> category -> name}} <br>
                            price: {{$dish -> price/100}}€ <br>
                            description: {{$dish -> description}} <br>
                            id: {{$dish -> id}} <br>
                            status: 
                            @if ($dish -> status === 1)
                                available
                            @else
                                unavailable
                            @endif
                        </p>
                        
                        <div class="container-edit-delete">
                            <a href="{{route('dish-edit', $dish -> id)}}" class="btn btn-primary" style="width: 100px;">EDIT</a>
                            <a href="{{route('dish-delete', $dish -> id)}}" class="btn btn-warning" style="width: 100px;">DELETE</a>
                        </div>
                    </li>

                @endif        
        @endforeach
        
        
        
                  
    </ul>

@endsection 