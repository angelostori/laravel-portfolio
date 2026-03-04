@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="fs-4 text-secondary my-4">
        {{ __('Dashboard') }}
    </h2>
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">
                <div class="card-header">{{ __('User Dashboard') }}</div>

                <div class="card-body">
                    <a href="{{ route('projects.index') }}" class="btn btn-primary">Projects</a>
                    <a href="{{ route('projects.create') }}" class="btn btn-success">Add Project</a>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection