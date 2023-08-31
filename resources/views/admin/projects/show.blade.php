@extends('layouts.app')

@section('title', $project->title)

@section('content')

    <div class="container">
        <div class="row justify-content-center mt-5 ">
            <div class="col-8">
                <div class="card mb-3 py-2">
                    <div class="row g-0 justify-content-center">
                        <div class="col-3 text-center">
                            <img src="{{ $project->image }}" class="img-fluid rounded-start" alt="{{ $project->title }}">
                        </div>
                        <div class="col-8 text-end">
                            <div class="card-body">
                                <h5 class="card-title">{{ $project->title }}</h5>
                                <p class="card-text">{{ $project->description }}</p>
                                <p class="card-text">Creato il: <small
                                        class="text-body-secondary">{{ $project->created_at }}</small>
                                </p>
                                <p class="card-text">Ultima modifica: <small
                                        class="text-body-secondary">{{ $project->updated_at }}</small>
                                </p>
                                <div class="d-flex justify-content-end">
                                    <a href="{{ $project->url }}" class="btn btn-primary">Apri in GitHub</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
