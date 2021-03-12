@extends('layouts.app')

@section('content') 
    
<div class="dashboard">
    <div class="dashboard__box">
        
                <div class="dashboard__box--title">{{ __('Il mio menu') }}</div>

                <div>
                    @if (session('status'))
                        <div role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                </div>
                

                <div class="dashboard__box--flex">
                    <div class="dashboard__box--flex--img">
                        <div class="dashboard__box--flex--menu">
                            <div class="dashboard__box--flex--menu--left">
                                <a href="{{route('dish-create')}}" class="new-plate">Crea un nuovo piatto</a>
                                <a href="{{route('home')}}" class="go-back">Torna alla home</a>

                                <a href="{{route('dish-create')}}" class="plus" ><i class="fas fa-plus"></i></a>
                                <a href="{{route('home')}}" class="arrow"><i class="fas fa-arrow-left"></i></a>
                                                    
                            </div>
                            <div class="dashboard__box--flex--menu--right">
                                <div class="dashboard__box--flex--menu--right--container">
                                    @foreach ($dishes as $dish)
                                            
                                            @if (Auth::user() -> id === $dish -> user_id)
                                                <div class="dish__box">
                                                    
                                                    <h3><strong>{{$dish -> name}}</strong> <br></h3>
                                                    <img src="{{asset('/storage/dishes/' . $dish -> img_dish)}}" width="150px">
                                                    <h3>{{$dish -> price/100}}€</h3>
                                                    <h3>{{$dish -> description}}</h3>

                                                    <div class="to-hide">
                                                        @if ($dish -> status == 1)
                                                            <h5>(Disponibile)</h5> 
                                                        @else
                                                            <h5>(Non disponibile)</h5> 
                                                        @endif
                                                    </div>
                                                    
                                                    <div class="dish__box--buttons">
                                                        <a href="{{route('dish-edit', $dish -> id)}}" class="edit" ><i class="fas fa-edit"></i></a>
                                                        <a href="{{route('dish-delete', $dish -> id)}}" class="cancel"><i class="fas fa-trash-alt"></i></a>
                                                    </div>
                                                    
                                                </div>
                                            @endif        
                                    @endforeach
                                </div>        

                            </div>

                        </div>
                        

                    </div>

                </div>

    </div>
</div>
    
    {{-- <h1 class="btn btn-warning btn-lg">dishes list ({{Auth::user() -> name}}, id: {{Auth::user() -> id}})</h1>
    
    <a href="{{route('dish-create')}}" class="btn btn-primary">Crea un nuovo piatto</a>

    <a href="{{route('home')}}" class="btn btn-primary">return home</a>
    <ul>
            
        @foreach ($dishes as $dish)
                
                @if (Auth::user() -> id === $dish -> user_id)
                    <li class="card p-3 mr-5">
                        <h4>name: {{$dish -> name}}(user_id: {{Auth::user() -> id}})</h4>

                        <img 
                            src="{{$dish -> img_dish}}"
                            width="200px"
                            style="display: {{$dish -> img_dish == '0' ? 'none' : 'block'}}"
                        >
                        <p>
                            Category: {{$dish -> category -> name}} <br>
                            price: {{$dish -> price/100}}€ <br>
                            description: {{$dish -> description}} <br>
                            id: {{$dish -> id}} <br>
                            status: 
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
        
        
        
                  
    </ul> --}}   

@endsection