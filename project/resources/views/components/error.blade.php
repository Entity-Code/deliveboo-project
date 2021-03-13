@if ($errors -> any())
    <div class="alert alert-danger">
        <ul id="error">
            @foreach ($errors -> all() as $error)
                <h1>!</h1>
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif