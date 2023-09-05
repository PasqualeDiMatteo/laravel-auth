@if ($project->exists)
    <form action="{{ route('admin.projects.update', $project) }}" method="POST" enctype="multipart/form-data">
        @method('PUT')
    @else
        <form action="{{ route('admin.projects.store') }}" method="POST"enctype="multipart/form-data">
@endif
@csrf
<div class="row">
    <div class="col-6">
        <div class="mb-3">
            <label for="title" class="form-label">Titolo</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title"
                name="title" value="{{ old('title', $project->title) }}">
            <div class="invalid-feedback">
                {{ $errors->first('title') }}
            </div>
        </div>
    </div>
    <div class="col-6">
        <div class="mb-3">
            <label for="image" class="form-label">Immagine</label>
            <input type="file" class="form-control @error('image') is-invalid @enderror" id="image"
                name="image" value="{{ old('image', $project->image) }}">
            <div class="invalid-feedback">
                {{ $errors->first('image') }}
            </div>
        </div>
    </div>
    <div class="col-12">
        <div class="mb-3">
            <label for="url" class="form-label">Link Progetto</label>
            <input type="url" class="form-control @error('url') is-invalid @enderror" id="url" name="url"
                value="{{ old('url', $project->url) }}">
            <div class="invalid-feedback">
                {{ $errors->first('url') }}
            </div>
        </div>
    </div>
    <div class="col-12">
        <div class="form-floating">
            <textarea class="form-control @error('description') is-invalid @enderror" placeholder="Descrizione" id="description"
                name="description">{{ old('description', $project->description) }}</textarea>
            <label for="description">Descrizione</label>
            <div class="invalid-feedback">
                {{ $errors->first('description') }}
            </div>
        </div>
    </div>
    <div class="col-12 d-flex justify-content-end mt-3">
        <button type="reset" class="btn btn-primary me-2">Reset</button>
        <button class="btn btn-success">Aggiungi</button>
    </div>
</div>
</form>
