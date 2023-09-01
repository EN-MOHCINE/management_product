@extends('layouts.app') <!-- Assuming you have a layout template -->

@section('content')
    
    <div class="my-4">
        <p class="text-secondary fs-3 text-center ">Fomulaire d'authentification</p>
            <p class='text-secondary fs-5 text-center '>Veuiller vous connecter au systeme en 
                utilisant votre adresse email et votre mot de passe </p>
            

                <div class="w-25 container shadow card p-3 ">
                    <form class="" action="{{route('authentification')}}" method="POST">
                        @csrf
                            <label class="from-label" for="email">Email</label>
                            <input class="form-control" placeholder="entre your email" value="{{old('email')}}" type="text" id="email" name="email"/>
                            @error('email')
                                <div class="form-error text-danger ">{{$message}}</div>
                            @enderror

                            <label class="from-label" for="password">Password</label>
                            <input class="form-control" placeholder="entre your password" value="{{old('password')}}" type="password" id="password" name="password"/>
                            @error('password')
                                <div class="form-error text-danger">{{$message}}</div>
                            @enderror
                            
                            <div class="d-flex flex-row">   
                                <button class="btn btn-success w-10 m-4"  > submit</button>
                                <a href="{{url('/page_login')}}" class="btn btn-secondary w-10 m-4"  > cancel</a>
                            </div>
                            @if (isset($email))
                                <div class="alert alert-danger">{{$email}}</div>
                            @endif
                            @if (isset($password))
                                <div class="alert alert-danger">{{$password}}</div>
                            @endif
                    </form>
                    <div class="text-center mt-3">
                        <h4><a href="{{route("create.user")}}" class="text-primary">Sign Up</a></h4>
                    </div>
                <div>
                
    </div>
@endsection
