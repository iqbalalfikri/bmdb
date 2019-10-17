@extends('layout')

@section('title', 'BMDb | Home')

@section('content')


<div class="container m-vh-80">
    <form class="form-inline mt-5">
        <input class="form-control mr-sm-2 my-2 bg-transparent col-4" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
    </form>

    @foreach($movies as $movie)
    <div class="card mb-3 bg-transparent">
        <div class=" row no-gutters">
            <div class="col-md-4">
                <a href="{{$movie->id}}">
                    <img class="picture m-2" src="{{$movie->picture}}" class="card-img" alt="...">
                </a>
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <div class="card-title">
                        <a href="{{$movie->id}}" class="font-weight-bold title text-primary">{{$movie->title}}</a>
                        @if(Auth::check())
                        <button class="btn btn-outline-dark float-right">Save</button>
                        @endif
                    </div>
                    <p class="card-text text-muted">{{$movie->genres->name}}</p>
                    <p class="card-text">{{$movie->description}}</p>
                    <img src="https://m.media-amazon.com/images/G/01/imdb/images/plugins/imdb_star_22x21-2889147855._CB483525256_.png" alt="">
                    <span class="font-weight-bold rating">{{$movie->rating}}</span>
                </div>
            </div>
        </div>
    </div>
    @endforeach

</div>



@endsection