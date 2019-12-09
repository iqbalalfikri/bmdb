@extends('layout')

@section('title', 'Saved Movie')

@section('content')

<div class="container m-vh-80">


    <div class="mt-5"></div>

    @foreach($movies as $movie)
    <div class="card mb-3 bg-transparent">
        <div class=" row no-gutters">
            <div class="col-md-4">
                <img class="picture m-2" src="{{ asset('storage/' . $movie->movies->picture ) }}" class="card-img" alt="...">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <div class="card-title">
                        <form action="{{ route('unsave', $movie->movies->id) }}" method="post">
                            <a href=" {{ route('movie', $movie->movies->id) }} " class="font-weight-bold title text-primary">{{$movie->movies->title}}</a>
                            @csrf
                            @method('delete')
                            <input type="hidden" name="id" value="{{ $movie->id }}">
                            <button type="submit" class="btn btn-warning float-right">Unsave</button>
                        </form>
                    </div>
                    <p class="card-text"><small class="text-muted">{{$movie->movies->genre}}</small></p>
                    <p class="card-text">{{ $movie->movies->description }}</p>
                    <img src="{{ asset('img/star.png') }}" alt="">
                    <span class="font-weight-bold rating"> {{ $movie->movies->rating }} </span>
                </div>
            </div>
        </div>
    </div>
    @endforeach

</div>

@endsection