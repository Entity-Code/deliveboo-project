@extends('layouts.app')

@section('content') 
    
    <h1 class="ml-5">Creazione piatto</h1>

    <form class="ml-5 w-25 .mx-auto mt-5" action="{{route('dish-store')}}" method="POST">
        @csrf
        @method('POST')
        
        {{-- categoria piatto --}}
        <label for="category_id mb-4">Category</label> <br>
        <select name="category_id" class="mb-4">
            @foreach ($categories as $category)
                <option value="{{$category -> id}}">{{ $category -> name }}</option>
            @endforeach
        </select>

        {{-- nome piatto --}}
        <div class="form-group">
          <label for="name">Name</label>
          <input minlength="5" maxlength="30" name="name" type="text" class="form-control" autofocus>
        </div>

        <br>

        {{-- descrizione piatto --}}
        <div class="form-group">
          <label for="description">Description</label>
          <input minlength="5" maxlength="255" name="description" type="text" class="form-control" autofocus>
        </div> 

        <br>

        {{-- prezzo piatto --}}
        <div class="form-group">
          <label for="price">Price</label> (€)
          <input min="1" max="1000" name="price" type="number" class="form-control" autofocus>
        </div>

        <br>
        


        {{-- img piatto --}}
        <div class="form-group" style="display: none;">
          <label for="img_dish">Image (url)</label>
          <input 
            name="img_dish" 
            type="text" 
            class="form-control"
            value="0"
            readonly     
          >
        </div>
        
        <br>

        {{-- stato piatto (0,1) (default value, not visible) --}}
        <div class="form-group">
          <input 
            name="status"
            type="text"
            class="form-control"
            value="1"
            readonly
            style="display: none"
          >
        </div>

        {{-- user id (default value, not visible)--}}
        <div class="form-group">
          <input 
            name="user_id"
            type="text" 
            class="form-control"
            value="{{Auth::user() -> id}}"
            readonly
            style="display: none"
          >
        </div>

        
        <br>        

        
          
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>



@endsection 