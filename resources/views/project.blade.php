@extends('layouts.main')

@section('container')

    <div class="container mb-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h1 class="mb-5">{{ $project->title }}</h1>
                <p>By. <a href="/projects/?author={{ $project->author->username }}" class="text-decoration-none">{{ $project->author->name }}</a> in <a href="/projects/?status={{ $project->status->slug }}" class="text-decoration-none">{{ $project->status->name }}</a></p>
                <img src="https://source.unsplash.com/1200x400/?{{ $project->status->name }}"  class="mb-4 img-fluid" alt="{{ $project->status->name }}">
                <article class="my-3">
                    {!! $project->body !!}  
                </article>                
                <a href="/projects" class="d-block mt-3">Back to Projects</a>
            </div>
        </div>
    </div>

@endsection

