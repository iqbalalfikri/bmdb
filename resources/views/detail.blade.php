@extends('layout')

@section('title', 'Detail')



@section('content')

<div class="container">

    <div class="border rounded mt-5">
        <div class="card bg-transparent m-4">
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
                    </div>
                </div>
            </div>
        </div>
        <div class="card bg-transparent m-4">
            <div class="media m-4">
                <img src="http://s3.amazonaws.com/37assets/svn/765-default-avatar.png" class="mr-3 rounded-circle comment-picture" alt="...">
                <div class="media-body">
                    <a href="" class="font-weight-bold comment-name text-primary">asd</a>
                    <button class="btn btn-danger float-right">Delete</button>
                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                </div>
            </div>
            <p class="card-text mx-4 mb-3">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
        </div>
    </div>
    <div class="border rounded bg-light">
        <div class="m-4">
            <textarea class="form-control" id="comment" name="comment" placeholder="Comment..." rows="6"></textarea>

            <button type="submit" class="btn btn-primary mt-3">Comment</button>
        </div>
    </div>

</div>



@endsection