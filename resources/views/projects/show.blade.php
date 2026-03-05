@extends('layouts.app')

@section('title', $project->name)

@section('content')

<div class="card">
    <div class="card-header">
        {{ $project->name }}
    </div>
    <div class="card-body">
        <h4 class="card-title">Type: {{ $project->type->name }}</h4>
        <h5 class="card-subtitle my-4">Cliente: {{ $project->client }}</h5>
        <h6 class="card-subtitle mb-4 text-muted">Periodo: {{ $project->period }}</h6>
        <p class="card-text">{{ $project->description }}</p>
    </div>
</div>

<a class="btn btn-primary" href="{{ route('projects.index') }}">Back to Projects</a>

@endsection