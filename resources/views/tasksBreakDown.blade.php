@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">

            <div class="col-md-8">
                here
                <ul class="list-group">
                    <li class="list-group-item active">{{ $project[0]->name }}</li>
                    {{--@if(isset($projects))--}}
                        {{--@foreach($projects as $project)--}}
                            {{--<li class="list-group-item"><a href="{{ route('newTasks',$project['id']) }}">{{ $project['name'] }}</a></li>--}}
                        {{--@endforeach--}}
                    {{--@else--}}
                        {{--<li class="list-group-item"><a href="#"><i>No project created</i></a></li>--}}
                    {{--@endif--}}

                </ul>
                <br>
                <div style="float: right">
                    <a href="{{ route('project') }}" type="submit" class="btn btn-success"><i class="glyphicon glyphicon-plus"></i>Save and Back</a>
                </div>

            </div>
        </div>
    </div>
@endsection
