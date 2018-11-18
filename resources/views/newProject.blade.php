@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"> New Project</div>
                    <div class="card-body">
                        <div id="app">
                            <new-project></new-project>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('after_scripts')
    <script src="{{ asset('js/app.js') }}"></script>
@endpush
