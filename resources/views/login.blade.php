@extends('layout')

@section('title', 'BMDb | Login')

@section('content')


<div class="container w-50">
    <form class="border rounded mt-5 p-4 bg-light" method="post" action="/">
        @csrf
        <h3 class="text-center font-weight-bold">Log In</h3>
        <div class="form-group text-center">
            <input type="text" class="form-control" id="email" placeholder="Enter email">
        </div>
        <div class="form-group text-center">
            <input type="password" class="form-control" id="password" placeholder="Password">
        </div>
        <div class="form-group form-check">
            <input type="checkbox" class="form-check-input" id="rememberMe">
            <label class="form-check-label" for="rememberMe">Remember me</label>
        </div>
        <button type="submit" class="btn btn-primary col-sm-12">Log In</button>

    </form>
</div>
@endsection