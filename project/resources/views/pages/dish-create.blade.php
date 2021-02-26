@extends('layouts.app')

@section('content') 
    
    <h1>creazione pagina</h1>

    <form class="ml-5 w-25" action="{{route('dish-store')}}" method="POST">
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
    
        <label for="category_id">category_id</label>

        <select class="" name="category_id">

            @foreach ($categories as $category)
                <option value="{{$category -> id}}">
                    {{$category -> name}}
                </option>
            @endforeach

        </select>
        
      <button type="submit" class="btn btn-primary">Submit</button>
      </form>

@endsection 