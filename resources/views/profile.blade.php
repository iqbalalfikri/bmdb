@extends('layout')

@section('title', 'Profile')

@section('content')

<div class="container m-vh-80">
    <div class="media border rounded mt-5 p-4">
        <img src="" class="mr-3 rounded profile-pic" alt="...">
        <div class="media-body">
            <div class="mt-3 font-weight-bold title">asdasd
                <button class="btn btn-primary float-right">Update Profile</button>
            </div>
            <div class="font-weight-normal mt-2">asdasd</div>
            <div class="font-weight-normal mt-2">asdasd</div>
        </div>
    </div>
    <div class="border rounded bg-light">
        <div class="m-4">
            <textarea class="form-control" id="comment" name="comment" placeholder="Message..." rows="6"></textarea>
            <button type="submit" class="btn btn-primary mt-3">Send Message</button>
        </div>
    </div>

</div>

@endsection