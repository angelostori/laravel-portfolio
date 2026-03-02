@extends('layouts.app')

@section('title', 'Tutti i post')

@section('content')

<table>
    <thead>
        <tr>
            <th>Name</th>
            <th>Author</th>
            <th>Category</th>
            <th>Description</th>
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
            <td><a class="btn btn-primary" href="#">Visit</a></td>
        </tr>
        @endforeach
</table>

@endsection