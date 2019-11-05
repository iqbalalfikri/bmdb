@extends('layout')

@section('title', 'Add Movie')

@section('content')

<div class="container w-50 m-vh-80">
    <form class="border rounded mt-5 p-4 bg-light" method="post" action=" {{ route('store-movie') }} " enctype="multipart/form-data">
        @csrf
        <h3 class="text-center font-weight-bold">Add Movie</h3>

        <div class="form-group text-center">
            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" placeholder="Title" value="{{ old('title') }}">
            @error('title')
            <span class="invalid-feedback text-left" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="form-group">
            <select class="form-control @error('genre') is-invalid @enderror" id="genre" name="genre">
                <option value="">--Choose Genre--</option>
                @foreach($genres as $genre)
                <option value="{{$genre->id}}" {{ old('genre') == $genre->id ? 'selected' : '' }}>{{$genre->name}}</option>
                @endforeach
            </select>
            @error('genre')
            <span class="invalid-feedback text-left" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="form-group text-center">
            <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="2" placeholder="Description">{{old('description')}}</textarea>
            @error('description')
            <span class="invalid-feedback text-left" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror

        </div>

        <div class="form-group text-center">
            <input type="text" class="form-control @error('rating') is-invalid @enderror" id="rating" name="rating" placeholder="Rating" value="{{old('rating')}}">
            @error('rating')
            <span class="invalid-feedback text-left" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="form-group">
            <div class="custom-file">
                <input type="file" class="custom-file-input @error('upload') is-invalid @enderror" id="upload" name="upload">
                <label class="custom-file-label text-secondary" for="upload">Choose file</label>
                @error('upload')
                <span class="invalid-feedback text-left" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

        </div>
        <button type="submit" class="btn btn-primary col-sm-12 mt-2">Submit</button>

    </form>
</div>

@endsection