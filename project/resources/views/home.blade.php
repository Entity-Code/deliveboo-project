@extends('layouts.app')

@section('content')
<div class="dashboard">
    <div class="dashboard__box">
        
                <div class="dashboard__box--title">{{ __('Dashboard') }}</div>

                <div>
                    @if (session('status'))
                        <div role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                </div>
                

                <div class="dashboard__box--flex">
                    <div class="dashboard__box--flex--left">
                      <h4> I tuoi dati </h4>
                      <div class="dashboard__box--flex--left--data">
                          <div>Ristorante: {{$user -> name }}</div>
                          <hr>
                          <div>Partita IVA: {{$user -> IVA }}</div>
                          <hr>

                          <div>Email: {{$user -> email }}</div>
                          <hr>

                          <div>Indirizzo: {{$user -> address }}</div>
                          <hr>

                          <div>Città: {{$user -> city }}</div>
                          <hr>

                          <div>Chiusura: {{$user -> day_off }}</div>
                          <hr>

                          <div>Valutazione: {{$user -> rating }}</div>
                      </div>

                      <h4>Le tue tipologie</h4>
                      <div class="dashboard__box--flex--left--data">
  
                          @foreach (Auth::user()->typologies as $typology)
                          
                            <div>{{ $typology -> name }}</div>                       
                          
                          @endforeach
                          
                      </div>
                    </div>

                    <div class="dashboard__box--flex--right">
                        <h4>Vuoi cambiare il logo del tuo ristorante?</h4>
                            @if (Auth::user() -> logo != 'default-logo.png')
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
                                 class="choose"
                                
                             >
                             <br>       
                                     
                             <input type="submit" value="Upload" class="upload">   
                                               
                         </form>

                         <h4>Vuoi visualizzare il tuo menu?</h4>
                         <a class="menu" href="{{route('dish-index')}}">Il mio menu</a></a>

                         <h4>Vuoi visualizzare gli ordini ricevuti?</h4>
                         <a class="order" href="{{route('order-index')}}">I miei ordini ricevuti</a>
                         

                    </div>

                </div>

    </div>
</div>
@endsection
