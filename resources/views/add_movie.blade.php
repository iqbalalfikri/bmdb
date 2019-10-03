@extends('layout')

@section('title', 'Add Movie')

@section('content')

<div class="container w-50 m-vh-80">
    <form class="border rounded mt-5 p-4 bg-light" method="post" action="/">
        @csrf
        <h3 class="text-center font-weight-bold">Add Movie</h3>

        <div class="form-group text-center">
            <input type="text" class="form-control" id="name" placeholder="Title">
        </div>

        <div class="form-group">
            <select class="form-control" id="role" name="role">
                <option>Comedy</option>
                <option>Action</option>
            </select>
        </div>

        <div class="form-group text-center">
            <textarea class="form-control" id="address" rows="2" placeholder="Address"></textarea>
        </div>

        <div class="form-group text-center">
            <input type="text" class="form-control" id="name" placeholder="Rating">
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