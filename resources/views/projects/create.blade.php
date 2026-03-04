@extends('layouts.app')

@section('title', 'Add a project')

@section('content')

<div class="container">
    <form>
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