@extends('layouts.app')

@section('content')

    <h1>restaurant-menu</h1>
    restaurant id: {{$user -> id}} <br>
    {{-- @foreach ($categories as $category) --}}
    
        @foreach ($user -> dishes as $dish )
        
        <h3>
            <small>category name:</small>  {{$dish -> category -> name}} { {{$dish -> category -> id}} }
        </h3>
            {{$dish -> name}} {{$dish -> id}}<br>
           
        @endforeach
        
@endsection
 