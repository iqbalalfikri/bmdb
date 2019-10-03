@extends('layout')

@section('title', 'BMDb | Login')

@section('content')


<div class="container w-50 m-vh-80">
    <form class="border rounded mt-5 p-4 bg-light" method="post" action="{{route('login')}}">
        @csrf
        <h3 class="text-center font-weight-bold">Log In</h3>
        <div class="form-group text-center">
            <input type="text" class="form-control" id="email" placeholder="Enter email">
        </div>
        @error('email')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror

        <div class="form-group text-center">
            <input type="password" class="form-control" id="password" placeholder="Password">
        </div>
        @error('password')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror

        <div class="form-group form-check">
            <input type="checkbox" class="form-check-input" id="remember" name="remember" {{old('remember') ? 'checked' : ''}}>
            <label class="form-check-label" for="remember">Remember me</label>
        </div>
        <button type="submit" class="btn btn-primary col-sm-12">Log In</button>

    </form>
</div>
@endsection