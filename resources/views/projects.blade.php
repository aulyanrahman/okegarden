@extends('layouts.main')

@section('container')
    <h1 class="mb-3 text-center">{{ $title }}</h1>

    <div class="row justify-content-center mb-3">
        <div class="col-md-6">
            <form action="/projects">
                @if (request('status'))
                    <input type="hidden" name="status" value="{{ request('status') }}">
                @endif
                @if (request('author'))
                    <input type="hidden" name="author" value="{{ request('author') }}">
                @endif  
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Search..." name="search" value="{{ request('search') }}">
                    <button class="btn btn-danger" type="submit" >Search</button>
                </div>
            </form>
        </div>
    </div>

    @if ($projects->count())
        <div class="card mb-5">
            <img src="https://source.unsplash.com/1200x400/?{{ $projects[0]->status->name }}" class="card-img-top" alt="{{ $projects[0]->status->name }}">
            <div class="card-body text-center">
                <h3 class="card-title"><a href="/project/{{ $projects[0]->slug }}" class="text-decoration-none text-dark">{{ $projects[0]->title }}</a></h3>
                <p>
                    <small class="text-muted">
                        By. <a href="/projects/?author={{ $projects[0]->author->username }}" class="text-decoration-none">{{ $projects[0]->author->name }}</a> in <a href="/projects/?status={{ $projects[0]->status->slug }}" class="text-decoration-none">{{ $projects[0]->status->name }}</a> 
                        {{ $projects[0]->created_at->diffForHumans() }}
                    </small>
                </p>
                <p class="card-text">{{ $projects[0]->excerpt }}</p>
                <a href="/project/{{ $projects[0]->slug }}" class="text-decoration-none btn btn-primary">Details</a>
            </div>
        </div>
        <div class="container">
            <div class="row">
                @foreach ($projects->skip(1) as $project)            
                <div class="col-md-4 mb-5">
                    <div class="card">
                        <div class="position-absolute top-0 start-0 px-3 py-2 " style="background-color: rgba(0, 0, 0, 0.6)">
                            <a href="/projects/?status={{ $project->status->slug }}" class="text-white text-decoration-none">{{ $project->status->name }}</a>
                        </div>
                        <img src="https://source.unsplash.com/500x400/?{{ $project->status->name }}"  class="card-img-top" alt="{{ $project->status->name }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $project->title }}</h5>
                            <p>
                                <small class="text-muted">
                                    By. <a href="/projects/?author={{ $project->author->username }}" class="text-decoration-none">{{ $project->author->name }}</a> 
                                    {{ $project->created_at->diffForHumans() }}
                                </small>
                            </p>                        
                            <p class="card-text">{{ $project->excerpt }}</p>
                            <a href="/project/{{ $project->slug }}" class="btn btn-primary">Details</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    @else
        <p class="text-center fs-4">No Projects Found</p>
    @endif

    <div class="d-flex justify-content-center" >
        {{ $projects->links() }}
    </div>

@endsection