@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">

        <div class="col-md-8">
            @if(session()->has('success'))
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <h4 class="alert-heading">Success!</h4>
                    <hr>
                    {{ session()->get('success') }}
                </div>
            @endif

            <ul class="list-group">
                <li class="list-group-item active">Projects</li>
                @if(isset($projects))
                    @foreach($projects as $project)
                        <li class="list-group-item"><a href="{{ route('newTasks',$project['id']) }}">{{ $project['name'] }}</a></li>
                    @endforeach
                @else
                    <li class="list-group-item"><a href="#"><i>No project created</i></a></li>
                @endif

            </ul>
            <br>
            <div style="float: right">
                <a href="{{ route('project') }}" type="submit" class="btn btn-success"><i class="glyphicon glyphicon-plus"></i>Create New Project</a>
            </div>

        </div>
    </div>
</div>
@endsection
