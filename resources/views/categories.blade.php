@extends('layouts.main')

@section('container')
        <h1 class="mb-5">{{ $title }}</h1>
        <div class="container">
            <div class="row">
                @foreach ($statuses as $status)
                    <div class="col-md-4">
                        <a href="/projects/?status={{ $status->slug }}">
                            <div class="card bg-dark text-white">
                                <img src="https://source.unsplash.com/500x500/?{{ $status->name }}"  class="card-img" alt="{{ $status->name }}">                            
                                <div class="card-img-overlay d-flex align-items-center p-0">
                                    <h5 class="card-title text-center flex-fill p-4 fs-5" style="background-color: rgba(0, 0,0, 0.6)">{{ $status->name }}</h5>                    
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
@endsection