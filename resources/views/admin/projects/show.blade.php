@extends('layouts.admin')

@section('content')
    <header class="py-3 bg-dark text-white">
        <div class="container">
            <h1>Project</h1>
            <a class="btn btn-primary" href="{{ route('admin.projects.edit', $project) }}">Edit</a>
            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalId-{{ $project->id }}">
                <i class="fas fa-trash fa-sm fa-fw"></i>
            </button>

            <!-- Modal Body -->
            <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
            <div class="modal fade text-dark" id="modalId-{{ $project->id }}" tabindex="-1" data-bs-backdrop="static"
                data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId-{{ $project->id }}"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalTitleId-{{ $project->id }}">
                                Attention! Deleting: {{ $project->name }}
                            </h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            🤪 Attention!! You are about to delete this record. The operation is
                            DESCRUCTIVE!!
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                Close
                            </button>
                            <form action="{{ route('admin.projects.destroy', $project) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">
                                    Confirm
                                </button>

                            </form>
                        </div>
                    </div>
                </div> <button>type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
    </header>
    <section class="py-5">
        <div class="container">
            <a class="d-block mb-3" href="{{ route('admin.projects.index') }}">Go back</a>
            @if (Str::startsWith($project->image, 'https://'))
                <img width="140" loading="lazy" src="{{ $project->image }}" alt="{{ $project->name }}">
            @else
                <img width="140" loading="lazy" src="{{ asset('storage/' . $project->image) }}"
                    alt="{{ $project->name }}">
            @endif
            <h2>{{ $project->name }}</h2>
            <p>{{ $project->description }}</p>
    </section>
@endsection
