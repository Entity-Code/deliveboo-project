@extends('layouts.app')

@section('content') 
    
    <h1 class="ml-5">EDIT PIATTO</h1>

    <form class="ml-5 w-25 .mx-auto mt-5" action="{{route('dish-update', $dish -> id)}}" method="POST">
        @csrf
        @method('POST')
        
        {{-- categoria piatto --}}
        <label for="category_id mb-4">Category</label> <br>
        <select name="category_id" class="mb-4">

            @foreach ($categories as $category)

                <option value="{{$category -> id}}"
                    @if ($dish -> category -> id == $category -> id)
                        selected
                    @endif
                    >{{ $category -> name }}
                </option>

            @endforeach

        </select>

        {{-- nome piatto --}}
        <div class="form-group">
          <label for="name">Name</label>
          <input 
            name="name" 
            type="text" 
            class="form-control"
            value="{{$dish -> name}}"
          >
        </div>

        <br>

        {{-- descrizione piatto --}}
        <div class="form-group">
          <label for="description">Description</label>
          <input 
            name="description" 
            type="text" 
            class="form-control"
            value="{{$dish -> description}}"
          >
        </div>

        <br>

        {{-- prezzo piatto --}}
        <div class="form-group">
          <label for="price">Price</label> (€)
          <input 
            name="price" 
            type="text" 
            class="form-control"
            value="{{$dish -> price/100}}"
          >
        </div>

        <br>
        


        {{-- img piatto --}}
        <div class="form-group">
          <label for="img_dish">Image (url)</label>
          <input 
            name="img_dish" 
            type="text" 
            class="form-control"
            value="{{$dish -> img_dish}}"
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