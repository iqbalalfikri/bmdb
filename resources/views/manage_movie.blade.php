@extends('layout')

@section('title', 'Manage Movie')


@section('content')

<div class="container m-vh-80">
    <div class="mt-5"></div>
    <h2 class="font-weight-bold">Manage Movie</h2>
    @if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
    @endif
    <a href="{{ route('add-movie') }}" class="btn btn-primary mt-2 mb-2">Add Movie</a>
    <table class="table table-bordered">
        <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Posted By</th>
                <th scope="col">Genre</th>
                <th scope="col">Title</th>
                <th scope="col">Picture</th>
                <th scope="col">Description</th>
                <th scope="col">Rating</th>
                <th scope="col">Action</th>

            </tr>
        </thead>
        <tbody>

            {{-- Menampilkan data movie yang telah dikirim --}}
            @foreach($movies as $key => $movie)
            <tr>
                <th scope="row" style="text-align: center;">{{$movies->firstItem() + $key}}</th>
                <td>{{$movie->posted_by}}</td>
                <td>{{$movie->genres->name}}</td>
                <td style="width:100px">
                    <a href="" class="font-weight-bold text-primary">{{$movie->title}}</a>
                </td>
                <td>
                    <img src="{{ asset('storage/movies/' . $movie->picture) }}" alt="" class="manage-pic rounded">
                </td>
                <td style="width:400px">{{$movie->description}}</td>
                <td>{{$movie->rating}}</td>
                <td style="width:160px">

                    {{-- Form untuk menghapus movie --}}
                    <form action="{{ route('delete-movie', $movie->id) }}" method="post">
                        @method('delete')
                        @csrf
                        <a href="{{ route('edit-movie', $movie->id) }}" class="btn btn-warning">Edit</a>
                        <button type="submit" class="btn btn-danger">Remove</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{$movies->links()}}
</div>
@endsection