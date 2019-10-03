@extends('layout')

@section('title', 'Inbox')

@section('content')

<div class="container m-vh-80">
    <div class="mt-5"></div>

    <div class="media border rounded mt-1 p-4 bg-light">
        <img src="http://s3.amazonaws.com/37assets/svn/765-default-avatar.png" class="mr-3 rounded profile-pic" alt="...">
        <div class="media-body">
            <a href="" class="mt-3 font-weight-bold title">Nama</a>
            <button class="btn btn-danger float-right">Remove</button>
            <div class="font-weight-bold">Posted at :
                <span class="font-weight-normal">asdas</span>
            </div>
            <div class="font-weight-bold mt-2">Message :
                <span class="font-weight-normal">asdas</span>
            </div>
        </div>
    </div>

    <div class="media border rounded mt-1 p-4 bg-light">
        <img src="http://s3.amazonaws.com/37assets/svn/765-default-avatar.png" class="mr-3 rounded profile-pic" alt="...">
        <div class="media-body">
            <a href="" class="mt-3 font-weight-bold title">Nama</a>
            <button class="btn btn-danger float-right">Remove</button>
            <div class="font-weight-bold">Posted at :
                <span class="font-weight-normal">asdas</span>
            </div>
            <div class="font-weight-bold mt-2">Message :
                <span class="font-weight-normal">asdas</span>
            </div>
        </div>
    </div>

</div>
</div>


@endsection