@extends('layouts.app')

@section('title', 'Add a project')

@section('content')

<div class="container">
    <form action="{{ route('projects.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3 row">
            <label for="name" class="fw-bold col-1 col-form-label">Name</label>
            <div class="col-8">
                <input
                    type="text"
                    class="form-control"
                    name="name"
                    id="name"
                    placeholder="Name" />
            </div>
        </div>
        <div class="mb-3 row">
            <label for="client" class="fw-bold col-1 col-form-label">Client</label>
            <div class="col-8">
                <input
                    type="text"
                    class="form-control"
                    name="client"
                    id="client"
                    placeholder="Client" />
            </div>
        </div>
        <div class="mb-3 row">
            <label for="period" class="fw-bold col-1 col-form-label">Period</label>
            <div class="col-8">
                <input
                    type="date"
                    class="form-control"
                    name="period"
                    id="period"
                    placeholder="Period" />
            </div>
        </div>
        <div class="mb-3 row">
            <label for="type_id" class="fw-bold col-1 col-form-label">Type</label>
            <div class="col-8">
                <select class="form-select" name="type_id" id="type_id">
                    @foreach ($types as $type)
                    <option value="{{ $type->id }}">{{ $type->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="mb-3 row">
            <label class="fw-bold col-1 col-form-label">Techs</label>
            <div class="col-8 d-flex flex-wrap align-items-center">
                @foreach($technologies as $technology)
                <div class="form-check me-2">
                    <input type="checkbox" name="technologies[]" value="{{ $technology->id }}" id="tech-{{ $technology->id }}">
                    <label for="tech-{{ $technology->id }}">{{ $technology->name }}</label>
                </div>
                @endforeach
            </div>
        </div>
        <div class="mb-3 row">
            <label for="img" class="fw-bold col-1 col-form-label">Image</label>
            <div class="col-8">
                <input id="img" name="img" class="form-control" type="file">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="description" class="fw-bold col-1 col-form-label">Description</label>
            <div class="col-8">
                <textarea
                    type="text"
                    class="form-control"
                    name="description"
                    id="description"
                    placeholder="Description"></textarea>
            </div>
        </div>

        <div class="mb-3 row">
            <div class="col-sm-8">
                <button type="submit" class="btn btn-primary">
                    Submit
                </button>
            </div>
        </div>
    </form>
</div>

@endsection