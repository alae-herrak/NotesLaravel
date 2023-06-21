@extends('master')

@section('content')
    <div class="container d-flex flex-column justify-content-center align-items-center vh-100">
        <form class="w-25 d-flex flex-column gap-3 border border-1 rounded-3 p-3 bg-dark-subtle" action="/register"
            method="post">
            @csrf
            <div class="form-floating w-100">
                <input type="text" class="form-control" id="name" name="name" placeholder="Name"
                    value="{{ old('name') }}">
                <label for="name">Name</label>
            </div>
            @error('name')
                <small class="text-danger">{{ $message }}</small>
            @enderror
            <div class="form-floating w-100">
                <input type="text" class="form-control" id="username" name="username" placeholder="Username" value="{{ old('username') }}">
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
            <div class="form-floating w-100">
                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation"
                    placeholder="Password confirmation">
                <label for="password_confirmation">Password confirmation</label>
            </div>
            <button type="submit" class="btn btn-dark">Register</button>
        </form>
        <p class="pt-2">Already have an account? <a href="/login">Login</a></p>
    </div>
@endsection
