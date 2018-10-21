@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="row justify-content-center">
            <div class="col-md-8">
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

        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="accordion" id="accordionExample">
                    <div class="card">
                        <div class="card-header" id="headingOne">
                            <h5 class="mb-0">
                                <button class="btn " type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    Invitations
                                </button> <span class="badge-danger text-small" style="float: right">1 new</span>
                            </h5>

                        </div>

                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                            <ul class="list-group">
                                <li class="list-group-item">
                                    <p>
                                        <span class="text-danger"><b>Zizi Mkontwana</b> <span><a href="#">accept</a> | <a href="#">denny</a> </span></span>
                                    </p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
