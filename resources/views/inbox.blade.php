@extends('layout')

@section('title', 'Inbox')

@section('content')

<div class="container m-vh-80">
    <div class="mt-5"></div>

    {{-- Menampilkan semua data inbox dari user yang sedang log in --}}

    @foreach($inboxes as $inbox)
    <div class="media border rounded mt-1 p-4 bg-light">
        <img src=" {{ asset('storage/' . $inbox->users->picture) }} " class="mr-3 rounded profile-pic" alt="...">
        <div class="media-body">

            {{-- Form untuk delete message --}}

            <form action="{{ route('delete-message', $inbox->id) }}" method="post">
                @csrf
                @method('delete')
                <a href="{{ route('profile', $inbox->sender_id) }}" class="mt-3 font-weight-bold title">{{ $inbox->users->name }}</a>
                <button class="btn btn-danger float-right">Remove</button>
            </form>
            <div class="font-weight-bold">Posted at :
                <span class="font-weight-normal">{{ $inbox->created_at }}</span>
            </div>
            <div class="font-weight-bold mt-2">Message :
                <span class="font-weight-normal">{{ $inbox->message }}</span>
            </div>
        </div>
    </div>

    @endforeach

    {{-- Menampilkan link untuk pagination --}}

    {{ $inboxes->links() }}

</div>
</div>


@endsection