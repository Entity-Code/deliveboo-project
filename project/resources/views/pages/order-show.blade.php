@extends('layouts.app')

@section('content')
    <div class=" p-3 mr-5">
        <h1 class="card-header">Dettagli dell'ordine: (id: {{$order -> id}})</h1>

        <ul class=" pt-0">
            <li>
                Pagante: {{$order -> firstname}} {{$order -> lastname}} <br>
                email: {{$order -> email}} <br>
                Indirizzo di consegna: {{$order -> address}} <br>
                Totale ordine: {{$order -> total_price}}€ <br>

                

                @if ($order -> note !== '')
                    note: {{$order -> note}}
                @endif
            </li>

            {{-- dishes --}}
            <h3>Piatti:</h3>
            <li>
                @foreach ($order -> dishes as $dish)    
                    {{$dish -> name}} (id: {{$dish -> id}}) <br>       
                @endforeach
            </li> 
        </ul>
    </div>
    

    {{-- return --}}
    <a href="{{route('home')}}" class="btn btn-primary return">Ritorna alla home</a>

@endsection 
