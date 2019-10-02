@extends('layout')

@section('title', 'Manage Movie')


@section('content')

<div class="container">
    <div class="mt-5"></div>
    <h2 class="font-weight-bold">Manage Movie</h2>
    <a href="/add-movie" class="btn btn-primary mt-2 mb-2">Add Movie</a>
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
            <tr>
                <th scope="row" style="text-align: center;">1</th>
                <td>Admin</td>
                <td>Comedy</td>
                <td style="width:100px">
                    <a href="" class="font-weight-bold text-primary">Once Upon a Time ... in Hollywood</a>
                </td>
                <td>
                    <img src="https://images.roughtrade.com/product/images/files/000/176/734/original/Once_Upon_A_Time_In_Hollywood_packshot.jpg?1564144784" alt="" class="manage-pic rounded">
                </td>
                <td style="width:400px">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Adipisci cupiditate architecto dolorum quae beatae, animi officiis alias, aut natus itaque, nesciunt modi. Repellat voluptates dolore ratione! Placeat, consequatur recusandae. Ipsum.</td>
                <td>8.4</td>
                <td>
                    <a href="/edit-movie" class="btn btn-warning">Edit</a>
                    <a href="/delete-movie" class="btn btn-danger">Remove</a>
                </td>
            </tr>
        </tbody>
    </table>
</div>
@endsection