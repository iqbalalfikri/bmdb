@extends('layout')

@section('title', 'Manage User')


@section('content')


<div class="container m-vh-80">
    <div class="mt-5"></div>
    <h2 class="font-weight-bold">Manage User</h2>
    <a href="/add-user" class="btn btn-primary mt-2 mb-2">Add User</a>
    <table class="table table-bordered">
        <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Fullname</th>
                <th scope="col">Email</th>
                <th scope="col">Role</th>
                <th scope="col">Gender</th>
                <th scope="col">Address</th>
                <th scope="col">Profile Picture</th>
                <th scope="col">DOB</th>
                <th scope="col">Action</th>

            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <th scope="row">{{$loop->iteration}}</th>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>
                    {{$user->roles->name}}
                </td>
                <td>
                    {{$user->gender}}
                </td>
                <td>
                    {{$user->address}}
                </td>
                <td>
                    <img src="{{ asset('storage/' . $user->picture) }}" alt="" class="manage-pic rounded">
                </td>
                <td>
                    {{$user->dob}}
                </td>
                <td>
                    <a href="/edit-user" class="btn btn-warning">Edit</a>
                    <a href="/delete-user" class="btn btn-danger">Remove</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection