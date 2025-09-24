@extends('layouts.app')
@section('title', 'To-Do List | Tasks')
@section('page-title', 'Tasks')
@section('page-actions')
    <a href="{{ route('tasks.create') }}" class="btn btn-primary">Create</a>
@endsection
@section('content')
    @session('success')
        <div class="alert alert-success">{{ $value }}</div>
    @endsession
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Description</th>
                <th scope="col">Tags</th>
                <th scope="col">Priority</th>
                <th scope="col">Due_date</th>
                <th scope="col">Completed</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tasks as $task)
                <tr>
                    <th scope="row">{{ $task->id }}</th>
                    <td>{{ $task->title }}</td>
                    <td>{{ $task->description }}</td>
                    <td>
                        @foreach ($task->tags as $tag)
                            <span class="badge" style="background-color: {{ $tag->color }}; color: #fff;">{{ $tag->name }}</span>
                        @endforeach
                    </td>
                    <td>{{ $task->priority }}</td>
                    <td class="@if($task->due_date < now() && $task->completed == 'pending') table-danger @endif">{{ \Carbon\Carbon::parse($task->due_date)->translatedFormat('d/m/Y') }}</td>
                    <td>{{ $task->completed }}</td>
                    <td>
                        <div class="d-flex gap-2">
                            <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-primary btn-sm">Editar</a>
                            <form action="{{ route('tasks.destroy', $task->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $tasks->links() }}
@endsection