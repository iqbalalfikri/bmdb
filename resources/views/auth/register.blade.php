@extends('layout')

@section('title', 'BMDb | Register')

@section('content')


<div class="container w-50 m-vh-80">
    <form class="border rounded mt-5 p-4 bg-light" method="post" action="{{ route('register') }}" enctype="multipart/form-data">
        @csrf
        <h3 class="text-center font-weight-bold">Register</h3>

        <div class="form-group text-center">
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Fullname" value="{{ old('name') }}">
            @error('name')
            <span class="invalid-feedback text-left" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>


        <div class="form-group text-center">
            <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Email" value="{{ old('email') }}">
            @error('email')
            <span class="invalid-feedback text-left" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>


        <div class="form-group text-center">
            <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password" placeholder="Password">
            @error('password')
            <span class="invalid-feedback text-left" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>


        <div class="form-group text-center">
            <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" placeholder="Confirm Password">
        </div>


        <div class="form-group">
            <input type="radio" class="form-group" id="male" name="gender" value="Male" {{old('gender') == 'Male' ? 'checked' : ''}}>
            <label for="male" class="mr-3"> Male </label>
            <input type="radio" class="form-group" id="female" name="gender" value="Female">
            <label for="female"> Female </label>
            @error('gender')
            <div class="text-left">
                <span class="text-danger" role="alert">
                    <small><strong>{{ $message }}</strong></small>
                </span>
            </div>
            @enderror
        </div>


        <div class="form-group text-center">
            <textarea class="form-control @error('address') is-invalid @enderror" id="address" name="address" rows="2" placeholder="Address">{{ old('address') }}</textarea>
            @error('address')
            <span class="invalid-feedback text-left" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>


        <div class="form-group text-center">
            <input type="date" class="form-control text-secondary @error('dob') is-invalid @enderror" name="dob" id="dob" value="{{ old('dob') }}">
            @error('dob')
            <span class="invalid-feedback text-left" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="form-group">
            <div class="custom-file">
                <input type="file" class="custom-file-input  @error('upload') is-invalid @enderror" id="upload" name="upload">
                <label class="custom-file-label text-secondary" for="upload">Choose file</label>
                @error('upload')
                <span class="invalid-feedback text-left" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>


        <button type="submit" class="btn btn-primary col-sm-12 mt-2">Register</button>

    </form>
</div>

@endsection