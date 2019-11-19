@extends('layout')

@section('title', 'Profile')

@section('content')

<div class="container m-vh-80">
    <div class="media border rounded mt-5 p-4">
        <img src="{{ asset('storage/' . $user->picture) }}" class="mr-3 rounded profile-pic" alt="...">
        <div class="media-body">
            <div class="mt-3 font-weight-bold title">{{ $user->name }}
                <button class="btn btn-primary float-right">Update Profile</button>
            </div>
            <div class="font-weight-normal mt-2">{{ $user->email }}</div>
            <div class="font-weight-normal mt-2">{{ $user->address }}</div>
        </div>
    </div>

    @if(!$user->isLoggedIn())
    <div class="border rounded bg-light">
        <div class="m-4">
            <textarea class="form-control" id="comment" name="comment" placeholder="Message..." rows="6"></textarea>
            <button type="submit" class="btn btn-primary mt-3">Send Message</button>
        </div>
    </div>
    @endif
</div>

@endsection