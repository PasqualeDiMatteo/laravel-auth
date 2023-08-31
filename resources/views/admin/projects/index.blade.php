@extends('layouts.app')

@section('title', 'Projects')

@section('content')
    <div class="container">
        <h2 class="fs-4 text-secondary mt-4">
            {{ __('Dashboard') }}
        </h2>
        <div class="d-flex justify-content-end mb-3"><a href="{{ route('admin.projects.create') }}"
                class="btn btn-success ">Aggiungi Progetto</a>
        </div>
        <table class="table table-dark table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Titolo</th>
                    <th scope="col">Link</th>
                    <th scope="col">Data Creazione</th>
                    <th scope="col">Data Ultima Modifica</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @forelse ($projects as $project)
                    <tr>
                        <th scope="row" class="align-middle">{{ $project->id }}</th>
                        <td class="align-middle">{{ $project->title }}</td>
                        <td class="align-middle">{{ $project->url }}</td>
                        <td class="align-middle">{{ $project->created_at }}</td>
                        <td class="align-middle">{{ $project->updated_at }}</td>
                        <td>
                            <div class="d-flex justify-content-end gap-2 ">
                                <a href="{{ route('admin.projects.edit', $project) }}"
                                    class="btn btn-warning btn-sm">Modifica</a>
                                <form action="{{ route('admin.projects.destroy', $project) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm">Elimina</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <h3>Non ci sono progetti</h3>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
