@extends('layouts.app')

@section('title', $project->name)

@section('content')

<div class="container my-5">
    <div class="card">
        <div class="card-header">
            <span>Technologies:</span>
            @forelse($project->technologies as $tech)
            <span class=" badge" style="--bg-color: {{ $tech->color }}; background-color: var(--bg-color);">{{ $tech->name }}</span>
            @empty
            <span>-</span>
            @endforelse

        </div>
        <div class="card-body">
            @if($project->img)
            <div class="card-image">
                <img src="{{ asset('storage/' . $project->img) }}" alt="copertina del progetto {{ $project->name }}" class="img-fluid pb-3">
            </div>
            @endif
            <h4 class="card-title">Type: {{ $project->type->name }}</h4>
            <h5 class="card-subtitle my-4">Cliente: {{ $project->client }}</h5>
            <h6 class="card-subtitle mb-4 text-muted">Periodo: {{ $project->period }}</h6>
            <p class="card-text">{{ $project->description }}</p>
        </div>
        <a class="btn btn-primary" href="{{ route('projects.index') }}">Back to Projects</a>
    </div>
</div>


@endsection