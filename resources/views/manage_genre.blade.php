@extends('layout')

@section('title', 'Manage Genre')


@section('content')

<div class="container">
    <div class="mt-5"></div>
    <h2 class="font-weight-bold">Manage Genre</h2>
    <a href="/add-genre" class="btn btn-primary mt-2 mb-2">Add Genre</a>
    <table class="table table-bordered">
        <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td style="width:50px; text-align: center">1</td>
                <td>Comedy</td>
                <td style="width:200px">
                    <a href="/edit-genre" class="btn btn-warning">Edit</a>
                    <a href="/delete-genre" class="btn btn-danger">Remove</a>
                </td>
            </tr>
        </tbody>
    </table>
</div>

@endsection