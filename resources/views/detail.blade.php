@extends('layout')

@section('title', 'Detail')



@section('content')

<div class="container m-vh-80">

    @if (session('status'))
    <div class="alert alert-success mt-5">
        {{ session('status') }}
    </div>
    @endif
    <div class="border rounded mt-5">

        {{-- Menampilkan detail movie yang telah dipilih user berdasarkan user id --}}

        <div class="card bg-transparent m-4">
            <div class=" row no-gutters">
                <div class="col-md-4">

                    {{-- Menampilkan gambar dari movie --}}

                    <img class="picture m-2" src="{{ asset('storage/movies/' . $movie->picture) }}" class="card-img" alt="...">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <div class="card-title">

                            {{-- Mengecek apakah user sedang login dan role user adalah member dan movie tersebut sudah disimpan oleh user,
                                lalu untuk memunculkan tombol Unsave --}}

                            @if(Auth::check() && auth()->user()->role_id != 1)
                            @if($movie->isSaved())
                            <form action="{{ route('unsave', $movie->id) }}" method="post">
                                <a href=" {{ route('movie', $movie->id) }} " class="font-weight-bold title text-primary">{{$movie->title}}</a>
                                @csrf
                                @method('delete')
                                <input type="hidden" name="id" value="{{ $movie->id }}">
                                <button type="submit" class="btn btn-warning float-right">Unsave</button>
                            </form>

                            {{-- Mengecek apakah user sedang login dan role user adalah member dan movie tersebut tidak disimpan oleh user,
                                lalu untuk memunculkan tombol Save --}}

                            @else
                            <form action="{{ route('save') }}" method="post">
                                @csrf
                                <a href=" {{ route('movie', $movie->id) }} " class="font-weight-bold title text-primary">{{$movie->title}}</a>
                                <input type="hidden" name="id" value="{{ $movie->id }}">
                                <button type="submit" class="btn btn-outline-dark float-right">Save</button>
                            </form>
                            @endif

                            {{-- Mengecek jika user sedang tidak log in atau guest --}}

                            @else
                            <a href=" {{ route('movie', $movie->id) }} " class="font-weight-bold title text-primary">{{$movie->title}}</a>

                            @endif
                        </div>

                        {{-- Menampilkan name, description, rating, dan posted_at dari movie --}}

                        <p class="card-text text-muted">{{$movie->genres->name}}</p>
                        <p class="card-text">{{$movie->description}}</p>
                        <div><img src="{{ asset('img/star.png') }}" alt="">
                            <span class="font-weight-bold rating">{{$movie->rating}}</span>
                        </div> <br>
                        <div class="card-text">Posted at {{$movie->created_at}}</div>
                    </div>
                </div>
            </div>
        </div>


        {{-- Menampilkan semua comment untuk movie yang ditampilkan --}}

        @foreach($comments as $comment)
        <div class="card bg-transparent m-4">
            <div class="media m-4">
                <img src="{{ asset('storage/' . $comment->users->picture) }}" class="mr-3 rounded-circle comment-picture" alt="...">
                <div class="media-body">

                    {{-- form untuk delete comment --}}

                    <form action="{{ route('delete-comment', $comment->id) }}" method="post">
                        @csrf
                        @method('delete')
                        <a href="{{ route('profile', $comment->users->id) }}" class="font-weight-bold comment-name text-primary">{{ $comment->users->name }}</a>

                        {{-- Mengecek apakah comment tersebut dibuat oleh user yang sedang log in untuk memunculkan tombol Delete --}}

                        @if($comment->commentUser())
                        <button class="btn btn-danger float-right">Delete</button>
                        @endif
                    </form>

                    {{-- Menampilkan data dari comment --}}
                    <p class="card-text"><small class="text-muted">Comment at {{ $comment->created_at }}</small></p>
                </div>
            </div>
            <p class="card-text mx-4 mb-3">{{ $comment->comment }}</p>
        </div>
        @endforeach
    </div>

    {{-- Mengecek apakah user sedang log in atau tidak, jika iya maka munculkan form untuk comment --}}
    @if(Auth::check())
    <div class="border rounded bg-light">
        <div class="m-4">
            {{-- Form untuk menuliskan comment --}}
            <form action="{{ route('store-comment') }}" method="post">
                @csrf
                <input type="hidden" name="movie_id" value="{{ $movie->id }}">
                <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                <textarea class="form-control" id="comment" name="comment" placeholder="Comment..." rows="6"></textarea>

                <button type="submit" class="btn btn-primary mt-3">Comment</button>
            </form>
        </div>
    </div>
    @endif

</div>



@endsection