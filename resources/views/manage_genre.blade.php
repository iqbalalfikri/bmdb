@extends('layout')

@section('title', 'Manage Genre')


@section('content')

<div class="container m-vh-80">
    <div class="mt-5"></div>
    <h2 class="font-weight-bold">Manage Genre</h2>
    <a href="{{ route('add-genre') }}" class="btn btn-primary mt-2 mb-2">Add Genre</a>
    <table class="table table-bordered">
        <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($genres as $genre)
            <tr>
                <td style="width:50px; text-align: center">{{$loop->iteration}}</td>
                <td>{{$genre->name}}</td>
                <td style="width:200px">
                    <form action="{{ route('delete-genre', $genre->id) }}" method="post">
                        @method('delete')
                        @csrf
                        <a href="{{ route('edit-genre', $genre->id) }}" class="btn btn-warning">Edit</a>
                        <button type="submit" class="btn btn-danger">Remove</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection