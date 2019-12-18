@extends('layout')

@section('title', 'Edit Genre')

@section('content')

<div class="container w-50 m-vh-80">
    {{-- form untuk edit genre dan menampilkan error jika ada error --}}
    <form class="border rounded mt-5 p-4 bg-light" method="post" action="{{ route('update-genre', $genre->id) }}">
        @method('patch')
        @csrf
        <h3 class="text-center font-weight-bold">Edit Genre</h3>

        <div class="form-group text-center">
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Genre Name" value="{{ $genre->name }}">
            @error('name')
            <span class="invalid-feedback text-left" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary col-sm-12 mt-2">Submit</button>

    </form>
</div>

@endsection