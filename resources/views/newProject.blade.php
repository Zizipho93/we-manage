@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"> New Project</div>
                    <div class="card-body">

                        <form action="{{ route('newProject') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">Project Name</label>
                                <input type="text" class="form-control" name="name" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter project name">
                                {{--<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>--}}
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Description</label>
                                <input type="text"  name="description" class="form-control" id="exampleInputPassword1" placeholder="project description">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Email Address of people to invite</label>
                                <input type="textarea" name="email_invites" class="form-control" id="exampleInputPassword1" placeholder="email addresses">
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
