@extends('layouts.app')

@section('title', 'Edit')

@section('content')

    <H1 class="text-center my-4">Modifica il proggetto</H1>
    <div class="container">
        <form action="{{ route('admin.projects.update', $project) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-6">
                    <div class="mb-3">
                        <label for="title" class="form-label">Titolo</label>
                        <input type="text" class="form-control" id="title" name="title"
                            value="{{ $project->title }}">
                    </div>
                </div>
                <div class="col-6">
                    <div class="mb-3">
                        <label for="image" class="form-label">Immagine</label>
                        <input type="text" class="form-control" id="image" name="image"
                            value="{{ $project->image }}">
                    </div>
                </div>
                <div class="col-12">
                    <div class="mb-3">
                        <label for="url" class="form-label">Link Progetto</label>
                        <input type="url" class="form-control" id="url" name="url"
                            value="{{ $project->url }}">
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-floating">
                        <textarea class="form-control" placeholder="Descrizione" id="description" name="description"> {{ $project->description }}</textarea>
                        <label for="description">Descrizione</label>
                    </div>
                </div>
                <div class="col-12 d-flex justify-content-end mt-3">
                    <button type="reset" class="btn btn-primary me-2">Reset</button>
                    <button class="btn btn-success">Aggiungi</button>
                </div>
            </div>
        </form>
    </div>

@endsection
