@extends('layouts.admin')

@section('content')
    <div class="bg-dark text-white p-4">
        <div class="container">
            <h1>Projects</h1>
            <a class="btn btn-primary" href="{{ route('admin.projects.create') }}">New project</a>
        </div>
    </div>
    <div class="container">
        <div class="table-responsive">
            <table class="table table-light">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">COVER IMAGE</th>
                        <th scope="col">NAME</th>
                        <th scope="col">SLUG</th>
                        <th scope="col">DESCRIPTION</th>
                        <th scope="col">ACTIONS</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($projects as $project)
                        <tr class="">
                            <td scope="row">{{ $project->id }}</td>
                            <td>
                                <img width="140" src="{{ $project->image }}" alt="{{ $project->name }}">
                            </td>
                            <td>{{ $project->name }}</td>
                            <td>{{ $project->slug }}</td>
                            <td>{{ $project->description }}</td>
                            <td>
                                <a class="btn btn-dark" href="{{ route('admin.projects.show', $project) }}">View</a>
                                <a class="btn btn-primary" href="{{ route('admin.projects.edit', $project) }}">Edit</a>
                                <!-- Modal trigger button -->
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#modalId-{{ $project->id }}">
                                    <i class="fas fa-trash fa-sm fa-fw"></i>
                                </button>

                                <!-- Modal Body -->
                                <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
                                <div class="modal fade" id="modalId-{{ $project->id }}" tabindex="-1"
                                    data-bs-backdrop="static" data-bs-keyboard="false" role="dialog"
                                    aria-labelledby="modalTitleId-{{ $project->id }}" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm"
                                        role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="modalTitleId-{{ $project->id }}">
                                                    Attention! Deleting: {{ $project->name }}
                                                </h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                🤪 Attention!! You are about to delete this record. The operation is
                                                DESCRUCTIVE!!
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                                    Close
                                                </button>
                                                <form action="{{ route('admin.projects.destroy', $project) }}"
                                                    method="post">
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
                            </td>
                        </tr>
                    @empty
                        <tr class="">
                            <td scope="row" colspan="5">No projects</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{ $projects->links('pagination::bootstrap-5') }}
    </div>
@endsection
