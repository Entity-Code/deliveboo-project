@extends('layouts.app')

@section('content')
    <div class="card p-3 mr-5">
        <h1 class="card-header">show ordine (id: {{$order -> id}})</h1>

        <h3>Order details:</h3>
        <ul class="card-body pt-0">
            <li>
                name: {{$order -> firstname}} {{$order -> lastname}} <br>
                email: {{$order -> email}} <br>
                address: {{$order -> address}} <br>
                total price: {{$order -> total_price/100}}€ <br>

                status: 
                @if ($order -> status === 1)
                    accepted <br>
                @else
                    rejected <br>
                @endif

                @if ($order -> note !== '')
                    note: {{$order -> note}}
                @endif
            </li>

            {{-- dishes --}}
            <h3>Order dishes:</h3>
            <li>
                @foreach ($order -> dishes as $dish)    
                    {{$dish -> name}} (id: {{$dish -> id}}) <br>       
                @endforeach
            </li> 
        </ul>
    </div>
    

    {{-- return --}}
    <a href="{{route('home')}}" class="btn btn-primary return">return dashboard</a>

@endsection
 