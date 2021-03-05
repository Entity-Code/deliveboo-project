@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    
                    <form method="POST" action="{{ route('register') }}">
                        @method('POST')
                        @csrf

                        
                        <ul class="form-group row form-check-flex mb-4" style="width: 100%; justify-content: space-between;">
                            <label class="col-form-label col-md-2">Tipologie: </label>
                            @foreach ($typologies as $typology)
                                <li style="list-style-type: none;">
                                    <input class="form-check-input" name="typologies[]" class="form-check-input" type="checkbox"
                                        value={{ $typology -> id}}> 
                                            
                                    <label class="form-check-label">{{ $typology->name }}</label> 
                                </li>
                            @endforeach
                        </ul>


                        {{-- name --}}
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nome') }}</label>

                            <div class="col-md-6">
                                <input minlength="3" maxlength="20" id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- email --}}
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail') }}</label>

                            <div class="col-md-6">
                                <input maxlength="100" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- address --}}
                        <div class="form-group row">
                            <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Indirizzo') }}</label>

                            <div class="col-md-6">
                                <input minlength="2" maxlength="50" id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" required autocomplete="address" autofocus>

                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- city --}}
                        <div class="form-group row">
                            <label for="city" class="col-md-4 col-form-label text-md-right">{{ __('Città') }}</label>

                            <div class="col-md-6">
                                <input id="city" type="text" class="form-control @error('city') is-invalid @enderror" name="city" value="{{ old('city') }}" required autocomplete="city" autofocus>

                                @error('city')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- IVA --}}
                        <div class="form-group row">
                            <label for="IVA" class="col-md-4 col-form-label text-md-right">{{ __('P. IVA') }}</label>

                            <div class="col-md-6">
                                <input size="11" id="IVA" type="text" class="form-control @error('IVA') is-invalid @enderror" name="IVA" value="{{ old('IVA') }}" required autocomplete="IVA" autofocus>

                                @error('IVA')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- DAY_OFF --}}
                       <div class="form-group row">
                            <label for="day_off" class="col-md-4 col-form-label text-md-right">{{ __('Giorni di chiusura') }}</label>

                            <div class="col-md-6">
                                <select id="day_off" class="form-control @error('day_off') is-invalid @enderror" name="day_off" value="{{ old('day_off') }}" required autocomplete="day_off" autofocus>
                                    <option value="lunedi">Lunedì</option>
                                    <option value="martedi">Martedì</option>
                                    <option value="mercoledi">Mercoledì</option>
                                    <option value="giovedi">Giovedì</option>
                                    <option value="venerdi">Venerdì</option>
                                    <option value="sabato">Sabato</option>
                                    <option value="domenica">Domenica</option>
                                </select>

                                {{-- <input id="day_off" type="text" class="form-control @error('day_off') is-invalid @enderror" name="day_off" value="{{ old('day_off') }}" required autocomplete="day_off" autofocus> --}}

                                @error('day_off')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div> 

                        {{-- LOGO --}}
                       <div class="form-group row" style="display: none">
                            <label for="logo" class="col-md-4 col-form-label text-md-right">{{ __('Logo') }}</label>

                            <div class="col-md-6">
                                <input 
                                    id="logo" 
                                    type="text" 
                                    class="form-control"
                                    name="logo" 
                                    value="default-logo.png"
                                    readonly
                                >
                            </div>
                        </div>

                        {{-- password --}}
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input minlength="8" id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- confirm password --}}
                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input minlength="8" id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>


                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
