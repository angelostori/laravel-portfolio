@extends('layouts.app')

@section('title', 'My Projects')

@section('content')

<table>
    <thead>
        <tr>
            <th>Name</th>
            <th>Client</th>
            <th>Period</th>
            <th>Description</th>
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
            <td class="p-3">{{ $project->description }}</td>
            <td><a class="btn btn-primary" href="{{ route('projects.show', $project) }}">Visit</a></td>
            @auth
            <td><a class="btn btn-warning" href="{{ route('projects.edit', $project) }}">Update</a></td>
            @endauth
        </tr>
        @endforeach
</table>

@endsection