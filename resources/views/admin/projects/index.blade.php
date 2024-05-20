@extends('layouts.admin')

@section('content')
    <div class="container">
        <h1>Projects</h1>

        <a class="btn btn-primary" href="{{ route('admin.projects.create') }}">New project</a>
        <div class="table-responsive">
            <table class="table table-light">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">COVER IMAGE</th>
                        <th scope="col">NAME</th>
                        <th scope="col">SLUG</th>
                        <th scope="col">ACTIONS</th>
                    </tr>
                </thead>
                <tbody>

                    {{-- @dd($projects) --}}

                    @forelse ($projects as $project)
                        <tr class="">
                            <td scope="row">{{ $project->id }}</td>
                            <td>
                                <img width="140" src="{{ $project->cover_image }}" alt="{{ $project->title }}">
                            </td>
                            <td>{{ $project->title }}</td>
                            <td>{{ $project->slug }}</td>
                            <td>
                                {{-- view/edit/delete --}}
                                <a class="btn btn-dark" href="{{ route('admin.projects.show', $project) }}">View</a>
                                <a class="btn btn-primary" href="{{ route('admin.projects.edit', $project) }}">Edit</a>
                                <form method="project" action="{{ route('admin.projects.destroy', $project) }}" class="d-inline">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
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

    </div>
@endsection
