@extends('layouts.app')

@section('content')
    <div class="container">


                <div id="app">
                    <assign-task
                        @if(isset($invites)) :invites="{{ $invites }}" @endif
                        @if(isset($tasks)) :tasks="{{ $tasks }}" @endif
                    @if(isset($completedtasks)) :completedtasks="{{ $completedtasks }}" @endif
                    ></assign-task>
                </div>



    </div>
@endsection
@push('after_scripts')
    <script src="{{ asset('js/app.js') }}"></script>
@endpush
