@extends('layout')

@section('title', 'Profile')

@section('content')

<div class="container m-vh-80">
    <div class="media border rounded mt-5 p-4">
        <img src="{{ asset('storage/' . $user->picture) }}" class="mr-3 rounded profile-pic" alt="...">
        <div class="media-body">
            <div class="mt-3 font-weight-bold title">{{ $user->name }}
                <a href="{{ route('edit-user', auth()->user()->id) }}" class="btn btn-primary float-right">Update Profile</a>
            </div>
            <div class="font-weight-normal mt-2">{{ $user->email }}</div>
            <div class="font-weight-normal mt-2">{{ $user->address }}</div>
        </div>
    </div>

    @if(!$user->loggedInUser())
    <div class="border rounded bg-light">
        <form action="{{ route('send-message', $id) }}" method="post">
            <div class="m-4">
                @csrf
                @method('put')
                <input type="hidden" name="receiver" value="{{ $id }}">
                <textarea class="form-control" id="message" name="message" placeholder="Message..." rows="6"></textarea>
                <button type="submit" class="btn btn-primary mt-3">Send Message</button>
            </div>
        </form>
    </div>
    @endif
</div>

@endsection