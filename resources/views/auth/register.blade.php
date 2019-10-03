@extends('layout')

@section('title', 'BMDb | Register')

@section('content')


<div class="container w-50 m-vh-80">
    <form class="border rounded mt-5 p-4 bg-light" method="post" action="/">
        @csrf
        <h3 class="text-center font-weight-bold">Register</h3>

        <div class="form-group text-center">
            <input type="text" class="form-control" id="name" name="name" placeholder="Fullname">
        </div>

        @error('name')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror

        <div class="form-group text-center">
            <input type="text" class="form-control" id="email" name="email" placeholder="Email">
        </div>

        @error('email')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror

        <div class="form-group text-center">
            <input type="password" class="form-control" name="password" id="password" placeholder="Password">
        </div>

        @error('password')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror

        <div class="form-group text-center">
            <input type="password" class="form-control" name="confirm-password" id="confirm-password" placeholder="Confirm Password">
        </div>

        @error('confirm-password')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror

        <div class="form-group">
            <input type="radio" class="form-group" id="male" name="gender" value="male">
            <label for="male" class="mr-3"> Male </label>
            <input type="radio" class="form-group" id="female" name="gender" value="female">
            <label for="female"> Female </label>
        </div>

        @error('gender')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror

        <div class="form-group text-center">
            <textarea class="form-control" id="address" name="address" rows="2" placeholder="Address"></textarea>
        </div>

        @error('address')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror

        <div class="form-group text-center">
            <input type="date" class="form-control text-secondary" name="dob" id="dob">
        </div>
        <div class="form-group">
            <div class="custom-file">
                <input type="file" class="custom-file-input" id="upload" name="upload">
                <label class="custom-file-label text-secondary" for="upload">Choose file</label>
            </div>
        </div>

        @error('upload')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror

        <button type="submit" class="btn btn-primary col-sm-12 mt-2">Register</button>

    </form>
</div>
@endsection