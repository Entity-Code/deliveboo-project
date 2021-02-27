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
                    
                    <img src="{{$user -> logo}}" width="200px"> <br> 
                    
                    Name: {{$user -> name }} <br>
                    IVA: {{$user -> IVA }} <br>
                    email: {{$user -> email }} <br>
                    address: {{$user -> address }} <br>
                    city: {{$user -> city }} <br>
                    day_off: {{$user -> day_off }} <br>
                    rating: {{$user -> rating }}



                </h1>
                    




                {{-- I MIEI PIATTI --}}
                <a class="btn btn-lg btn-success" href="{{route('dish-index')}}">MY MENU</a></a>

                {{-- ORDINI RICEVUTI --}}
                <a class="btn btn-danger btn-lg" href="{{route('order-index')}}"> ORDERS RECEIVED</a>
                





            </div>
        </div>
    </div>
</div>
@endsection
