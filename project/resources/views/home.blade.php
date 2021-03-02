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

                <h1>
                    @switch(Auth::user() -> logo)
                        @case(Auth::user() -> logo)
                            <img src="{{asset('/storage/logo/' . Auth::user() -> logo)}}" width="300px">
                            @break
                        @default
                            <img src="{{asset('https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Futulsa.edu%2Fwp-content%2Fuploads%2F2018%2F08%2Fgeneric-avatar.jpg&f=1&nofb=1')}}" width="300px">                             
                            @break
                    @endswitch
                                        
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
                    rating: {{$user -> rating }}


                </h1>

                {{--                 
                <h1>Scegli la tipologia del tuo ristorante</h1>
                
                <form id="form"action="{{route('typ-store')}}" method="POST">

                  @csrf
                  @method('POST')

                  <label for="typs[]">Typologies</label> <br>
                  @foreach ($typs as $typ)
                    <input class="advancecheck" type="checkbox" name="typs[]" value="{{$typ -> id}}"
                    @if ($user -> typologies -> contains($typ -> id) )
                      checked
                    @endif> 
                    {{$typ -> name}} <br>
                  @endforeach
                  <input onclick="hideTyps()" type="submit" name="" value="Aggiungi">

                </form> --}}


                {{-- <script type="text/javascript">
                    function hideTyps() {

                        document.getElementById('form').style.display = 'none';

                        //console.log(document.querySelector('advancecheck').value);
                        
                    }
                </script> --}}
  
                {{-- 
                        $('input').click(remove)
                        function remove() {
                            $('form#form').addClass("none");    
                        }
                
                            --}}
                    

  




                {{-- I MIEI PIATTI --}}
                <a class="btn btn-lg btn-success" href="{{route('dish-index')}}">MY MENU</a></a>

                {{-- ORDINI RICEVUTI --}}
                <a class="btn btn-danger btn-lg" href="{{route('order-index')}}"> ORDERS RECEIVED</a>
                





            </div>
        </div>
    </div>
</div>
@endsection
