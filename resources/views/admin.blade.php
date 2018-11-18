@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">First name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Admin</th>
                        <th scope="col">User</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <th scope="row">{{$user->name}}</th>
                            <td>{{$user->email}}</td>
                            <td><input type="checkbox" {{$user->hasRole('Admin') ? 'checked' : ''}}></td>
                            <td><input type="checkbox" {{$user->hasRole('User') ? 'checked' : ''}}></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
@endsection
