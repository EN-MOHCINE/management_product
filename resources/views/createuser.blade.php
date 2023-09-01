@extends('layouts.app') <!-- Assuming you have a layout template -->

@section('content')
    <div class="container">
        <h2>User Registration</h2>
        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="form-group">
                <label for="Username">Username</label>
                <input id="Username" type="text" class="form-control @error('Username') is-invalid @enderror" name="Username" value="{{ old('Username') }}" required >
                @error('Username')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            
            <div class="form-group">
                <label for="email">adresse</label>
                <input id="adresse" type="text" class="form-control @error('adresse') is-invalid @enderror" name="adresse" value="{{ old('adresse') }}" required >
                @error('adresse')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="tel">tel</label>
                <input id="tel" type="number" class="form-control @error('tel') is-invalid @enderror" name="tel" value="{{ old('tel') }}" required >
                @error('tel')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" >
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="password-confirm">Confirm Password</label>
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" >
            </div>

            <button type="submit" class="btn btn-primary">Register</button>
        </form>
    </div>
@endsection
