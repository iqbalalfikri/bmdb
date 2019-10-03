@extends('layout')

@section('title', 'BMDb | Home')

@section('content')


<div class="container m-vh-80">
    <form class="form-inline mt-5">
        <input class="form-control mr-sm-2 my-2 bg-transparent col-4" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
    </form>


    <div class="card mb-3 bg-transparent">
        <div class=" row no-gutters">
            <div class="col-md-4">
                <img class="picture m-2" src="https://m.media-amazon.com/images/M/MV5BMTc5MDE2ODcwNV5BMl5BanBnXkFtZTgwMzI2NzQ2NzM@._V1_.jpg" class="card-img" alt="...">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <div class="card-title">
                        <a href="" class="font-weight-bold title text-primary">asd</a>
                        <button class="btn btn-warning float-right">Save</button>
                    </div>
                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                    <img src="https://m.media-amazon.com/images/G/01/imdb/images/plugins/imdb_star_22x21-2889147855._CB483525256_.png" alt="">
                    <span class="font-weight-bold rating">1.1</span>
                </div>
            </div>
        </div>
    </div>

</div>



@endsection