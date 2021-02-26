@extends('layouts.app')

@section('content') 
    
    <h1>creazione pagina</h1>

    <form class="ml-5 w-25 .mx-auto" action="{{route('dish-store')}}" method="POST">
        @csrf
        @method('POST')
        
        <div class="form-group">
          <label for="name">name</label>
          <input name="name" type="text" class="form-control">
        </div>

        <br>

        <div class="form-group">
          <label for="description">descr</label>
          <input name="description" type="text" class="form-control">
        </div>

        <br>

        <div class="form-group">
          <label for="price">price</label>
          <input name="price" type="text" class="form-control">
        </div>

        <br>
        
        <div class="form-group">
            <label for="status">status</label></label>
            <input name="status" type="text" class="form-control">
        </div>

        <br>

        <div class="form-group">
            <label for="img_dish">img</label></label>
            <input name="img_dish" type="text" class="form-control">
        </div>

        <br>
    
        <label for="user_id">User:</label>
        {{-- user id --}}
        <select class="" name="user_id">
            @foreach ($users as $user)
                <option value="{{$user -> id}}">
                    {{$user -> name}} ({{$user -> id}})
                </option>
            @endforeach
        </select>

        <br>        
        
        <label for="categories[]">Categories:</label> <br>
        {{-- mi ritorno un array di typologies (quelle selezionate dall'utente), per poi lavorarmelo nel controller (vedere in store) --}}
            @foreach ($categories as $category)
                <input name="categories[]" 
                type="checkbox" 
                value="{{$category -> id}}"> 

                    {{ $category -> name}} 
                    
                <br>
            @endforeach
        
      <button type="submit" class="btn btn-primary">Submit</button>
      </form>

@endsection 