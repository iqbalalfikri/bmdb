@extends('layout')

@section('title', 'Add User')

@section('content')

<div class="container w-50 m-vh-80">
    <form class="border rounded mt-5 p-4 bg-light" method="post" action="/">
        @csrf
        <h3 class="text-center font-weight-bold">Create User</h3>

        <div class="form-group text-center">
            <input type="text" class="form-control" id="name" placeholder="Fullname">
        </div>
        <div class="form-group text-center">
            <input type="text" class="form-control" id="email" placeholder="Email">
        </div>

        <div class="form-group">
            <select class="form-control" id="role" name="role">
                <option>Admin</option>
                <option>Member</option>
            </select>
        </div>

        <div class="form-group text-center">
            <input type="password" class="form-control" id="password" placeholder="Password">
        </div>
        <div class="form-group text-center">
            <input type="password" class="form-control" id="password" placeholder="Confirm Password">
        </div>
        <div class="form-group">
            <input type="radio" class="form-group" id="male" name="gender" value="male">
            <label for="male" class="mr-3"> Male </label>
            <input type="radio" class="form-group" id="female" name="gender" value="female">
            <label for="female"> Female </label>
        </div>

        <div class="form-group text-center">
            <textarea class="form-control" id="address" rows="2" placeholder="Address"></textarea>
        </div>
        <div class="form-group text-center">
            <input type="date" class="form-control text-secondary" id="dob">
        </div>
        <div class="form-group">
            <div class="custom-file">
                <input type="file" class="custom-file-input" id="upload">
                <label class="custom-file-label text-secondary" for="upload">Choose file</label>
            </div>
        </div>
        <button type="submit" class="btn btn-primary col-sm-12 mt-2">Submit</button>

    </form>
</div>

@endsection