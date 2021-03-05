@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                </div>
                

                <div>

                    @if (Auth::user() -> logo)
                        <img src="{{asset('/storage/logo/' . Auth::user() -> logo)}}" width="300px">
                    @else
                        <img src="{{asset('/storage/logo/default-logo.png')}}" width="300px">
                    @endif


                     
                    <form action="{{route('update-logo')}}" method="POST" enctype="multipart/form-data">
                        
                        @csrf
                        @method('POST')
                                
                        {{-- Aggiunto dopo punto 4 (metodo controller)--}}
                        <input 
                            name="logo" 
                            type="file"
                            class="form-control border-0"
                        >       
                                
                        <input type="submit" value="Upload" class="btn btn-primary">   
                                          
                    </form>
                    
                    Name: {{$user -> name }} <br>
                    IVA: {{$user -> IVA }} <br>
                    email: {{$user -> email }} <br>
                    address: {{$user -> address }} <br>
                    city: {{$user -> city }} <br>
                    day_off: {{$user -> day_off }} <br>
                    rating: {{$user -> rating }} <br>

                    
                    
                    <h4>Typologies:</h4>
                    <ul>

                        @foreach (Auth::user()->typologies as $typology)
                        
                            <li>{{ $typology -> name }}</li>                       
                        
                        @endforeach
                        
                    </ul>

                </div>

                
  

                {{-- I MIEI PIATTI --}}
                <a class="btn btn-lg btn-success" href="{{route('dish-index')}}">MY MENU</a></a>

                {{-- ORDINI RICEVUTI --}}
                <a class="btn btn-danger btn-lg" href="{{route('order-index')}}"> ORDERS RECEIVED</a>
                





            </div>
        </div>
    </div>
</div>
@endsection
