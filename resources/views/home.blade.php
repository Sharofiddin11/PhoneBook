@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    <a class="dropdown-item" href="{{ url('/deper') }}">
                        Department
                    </a>
                    <a class="dropdown-item" href="{{ url('/otdel') }}">
                        Otdels
                    </a>
                    <a class="dropdown-item" href="{{ url('/people') }}">
                        People
                    </a>
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}

                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
