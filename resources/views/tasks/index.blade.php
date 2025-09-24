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
    <form method="GET" class="mb-4 p-3 rounded shadow-sm bg-light">
        <div class="row g-2 align-items-center">
            <div class="col-md-4">
                <label class="form-label">Tags</label>
                <div class="border rounded p-2" style="min-height: 48px; background: #f8f9fa;">
                    @foreach($allTags ?? [] as $tag)
                        <label class="me-2 mb-1" style="cursor:pointer;">
                            <input type="checkbox" name="tags[]" value="{{ $tag->id }}" class="form-check-input" style="margin-right: 4px;"
                                {{ (request('tags') && in_array($tag->id, (array)request('tags'))) ? 'checked' : '' }}>
                            <span class="badge" style="background-color: {{ $tag->color }}; color: #fff;">{{ $tag->name }}</span>
                        </label>
                    @endforeach
                </div>
            </div>
            <div class="col-md-2">
                <label for="filter_priority" class="form-label">Prioridade</label>
                <select name="priority" id="filter_priority" class="form-select">
                    <option value="">Todas</option>
                    <option value="low" {{ request('priority') == 'low' ? 'selected' : '' }}>Baixa</option>
                    <option value="medium" {{ request('priority') == 'medium' ? 'selected' : '' }}>Média</option>
                    <option value="high" {{ request('priority') == 'high' ? 'selected' : '' }}>Alta</option>
                </select>
            </div>
            <div class="col-md-2">
                <label for="filter_status" class="form-label">Status</label>
                <select name="completed" id="filter_status" class="form-select">
                    <option value="">Todos</option>
                    <option value="pending" {{ request('completed') == 'pending' ? 'selected' : '' }}>Pendente</option>
                    <option value="completed" {{ request('completed') == 'completed' ? 'selected' : '' }}>Concluída</option>
                </select>
            </div>
            <div class="col-md-3">
                <label for="filter_search" class="form-label">Buscar</label>
                <input type="text" name="search" id="filter_search" class="form-control" placeholder="Título ou descrição" value="{{ request('search') }}">
            </div>
            <div class="col-md-1 d-flex align-items-end">
                <button type="submit" class="btn btn-primary w-100">Filtrar</button>
            </div>
        </div>
        <div class="mt-2">
            <a href="{{ route('tasks.index') }}" class="btn btn-link">Limpar filtros</a>
        </div>
    </form>
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