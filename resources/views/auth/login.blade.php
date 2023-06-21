@extends('master')

@section('content')
    <div class="container d-flex flex-column justify-content-center align-items-center vh-100">
        <form class="w-25 d-flex flex-column gap-3 border border-1 rounded-3 p-3 bg-dark-subtle" action="/login" method="post">
            @csrf
            <div class="form-floating w-100">
                <input type="text" class="form-control" id="username" name="username" placeholder="Username">
                <label for="username">Username</label>
            </div>
            @error('username')
                <small class="text-danger">{{ $message }}</small>
            @enderror
            <div class="form-floating w-100">
                <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                <label for="password">Password</label>
            </div> 
            @error('password')
                <small class="text-danger">{{ $message }}</small>
            @enderror
            <button type="submit" class="btn btn-dark">Login</button>
        </form>
        <p class="pt-2">Don't have an account yet? <a href="/register">Regiser</a></p>
    </div>
@endsection
