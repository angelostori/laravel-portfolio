@extends('layouts.app')

@section('title', 'My Projects')

@section('content')

<table class="m-auto">
    <thead>
        <tr>
            <th>Name</th>
            <th>Client</th>
            <th>Period</th>
            <th>Type</th>
            <th></th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($projects as $project)
        <tr>
            <td class="p-3">{{ $project->name }}</td>
            <td class="p-3">{{ $project->client }}</td>
            <td class="p-3">{{ $project->period }}</td>
            <td class="p-3">{{ $project->type }}</td>
            <td><a class="btn btn-outline-primary" href="{{ route('projects.show', $project) }}">Visit</a></td>
            @auth
            <td><a class="btn btn-outline-warning" href="{{ route('projects.edit', $project) }}">Update</a></td>
            <td>
                <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#deleteModal-{{ $project->id }}">
                    Delete
                </button>

                <div class="modal fade" id="deleteModal-{{ $project->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5">Delete project: {{ $project->name }}</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Are you sure you want to delete this project? This action cannot be undone.
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <form action="{{ route('projects.destroy', $project) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Confirm Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </td>
            @endauth
        </tr>
        @endforeach
    </tbody>
</table>
@endsection