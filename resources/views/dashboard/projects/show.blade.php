@extends('dashboard.layouts.main')

@section('container')
    <div class="container mb-5">
        <div class="row my-3">
            <div class="col-lg-8">
                <h1 class="mb-5">{{ $project->title }}</h1>
                <a href="/dashboard/projects" class="btn btn-success"><span data-feather="arrow-left"></span> Back to my projects</a>
                <a href="/dashboard/projects" class="btn btn-warning"><span data-feather="edit"></span> Edit this project</a>
                <a href="/dashboard/projects" class="btn btn-danger"><span data-feather="x-circle"></span> Delete this project</a>
                <img src="https://source.unsplash.com/1200x400/?{{ $project->status->name }}"  class="mt-3 img-fluid" alt="{{ $project->status->name }}">
                <article class="my-3">
                    {!! $project->body !!}  
                </article>                
                <a href="/projects" class="d-block mt-3">Back to Projects</a>
            </div>
        </div>
    </div>
@endsection