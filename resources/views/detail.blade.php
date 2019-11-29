@extends('layout')

@section('title', 'Detail')



@section('content')

<div class="container m-vh-80">

    <div class="border rounded mt-5">
        <div class="card bg-transparent m-4">
            <div class=" row no-gutters">
                <div class="col-md-4">
                    <img class="picture m-2" src="{{ asset('storage/' . $movie->picture) }}" class="card-img" alt="...">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <div class="card-title">
                            <a class="font-weight-bold title text-primary">{{$movie->title}}</a>
                            @if(Auth::check())
                            <button class="btn btn-warning float-right">Save</button>
                            @endif
                        </div>
                        <p class="card-text text-muted">{{$movie->genres->name}}</p>
                        <p class="card-text">{{$movie->description}}</p>
                        <img src="{{ asset('img/star.png') }}" alt="">
                        <span class="font-weight-bold rating">{{$movie->rating}}</span>
                    </div>
                </div>
            </div>
        </div>

        @foreach($comments as $comment)
        <div class="card bg-transparent m-4">
            <div class="media m-4">
                <img src="{{ asset('storage/' . $comment->users->picture) }}" class="mr-3 rounded-circle comment-picture" alt="...">
                <div class="media-body">
                    <a href="{{ route('profile', $comment->users->id) }}" class="font-weight-bold comment-name text-primary">{{ $comment->users->name }}</a>

                    @if($comment->commentUser())
                    <button class="btn btn-danger float-right">Delete</button>
                    @endif
                    <p class="card-text"><small class="text-muted">Comment at {{ $comment->created_at }}</small></p>
                </div>
            </div>
            <p class="card-text mx-4 mb-3">{{ $comment->comment }}</p>
        </div>
        @endforeach
    </div>
    <div class="border rounded bg-light">
        <div class="m-4">
            <textarea class="form-control" id="comment" name="comment" placeholder="Comment..." rows="6"></textarea>

            <button type="submit" class="btn btn-primary mt-3">Comment</button>
        </div>
    </div>

</div>



@endsection