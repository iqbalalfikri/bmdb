@extends('layout')

@section('title', 'Add Genre')

@section('content')

<div class="container w-50 m-vh-80">
    {{-- form untuk menambahkan genre baru, diarahkan ke route('store-genre') dan memunculkan pesan error jika ada error --}}
    <form class="border rounded mt-5 p-4 bg-light" method="post" action="{{ route('store-genre') }}">
        @csrf
        <h3 class="text-center font-weight-bold">Add Genre</h3>

        <div class="form-group text-center">
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Genre Name" value="{{ old('name') }}">
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