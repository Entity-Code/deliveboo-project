@extends('layouts.app')

@section('content') 
    
    <h1 class="btn btn-warning btn-lg">dishes list ({{Auth::user() -> name}}, id: {{Auth::user() -> id}})</h1>
    
    <a href="{{route('dish-create')}}" class="btn btn-primary">Crea un nuovo piatto</a>

    <a href="{{route('home')}}" class="btn btn-primary">return home</a>
    <ul>
            
        @foreach ($dishes as $dish)
                
                @if (Auth::user() -> id === $dish -> user_id)
                    <li class="card p-3 mr-5">
                        <h4>Nome: {{$dish -> name}}(user_id: {{Auth::user() -> id}})</h4>

                        <img 
                            src="{{$dish -> img_dish}}"
                            width="200px"
                            style="display: {{$dish -> img_dish == '0' ? 'none' : 'block'}}"
                        >
                        <p>
                            Categoria: {{$dish -> category -> name}} <br>
                            prezzo: {{$dish -> price/100}}€ <br>
                            descrizione: {{$dish -> description}} <br>
                            id: {{$dish -> id}} <br>
                            stato: 
                            @if ($dish -> status == 1)
                                Disponibile
                            @else
                                Non disponibile
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