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
                    
                    Nome: {{$user -> name }} <br>
                    P.IVA: {{$user -> IVA }} <br>
                    Email: {{$user -> email }} <br>
                    Indizirro: {{$user -> address }} <br>
                    Città: {{$user -> city }} <br>
                    Chiusura settimanale: {{$user -> day_off }} <br>
                    Voto: {{$user -> rating }} <br>

                    
                    
                    <h4>Tipologie:</h4>
                    <ul>

                        @foreach (Auth::user()->typologies as $typology)
                        
                            <li>{{ $typology -> name }}</li>                       
                        
                        @endforeach
                        
                    </ul>

                </div>

                
  

                {{-- I MIEI PIATTI --}}
                <a class="btn btn-lg btn-success" href="{{route('dish-index')}}">Il mio menù</a></a>

                {{-- ORDINI RICEVUTI --}}
                <a class="btn btn-danger btn-lg" href="{{route('order-index')}}">I miei ordini</a>
                





            </div>
        </div>
    </div>
</div>
@endsection
