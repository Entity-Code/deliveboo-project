@extends('layouts.app')

@section('content')

    <h1>
        lista degli ordini
        <a href="{{route('order-stats')}}" class="btn btn-primary btn-lg">statistiche</a>
        
    </h1>
    <ul>
        @foreach ($orders as $order)
            <li>
                {{$order -> firstname}}
                {{$order -> total_price}}
            </li>
        @endforeach
    </ul>


@endsection
