@extends('layouts.app')
@section('title', 'To-Do List | Edit Task')
@section('page-title', 'Edit Task')

@section('content')
    <form action="{{ route('tasks.update', $task->id) }}" method="post">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label class="form-label">Title</label>
            <input type="text" class="form-control" placeholder="Title" name="title" value="{{ old('title', $task->title) }}">
        </div>
        @error('title')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <div class="mb-3">
            <label class="form-label">Description</label>
            <input type="text" class="form-control" placeholder="Description" name="description" value="{{ old('description', $task->description) }}">
        </div>
        @error('description')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <div class="mb-3">
            <label class="form-label">Priority</label>
            <select class="form-select" name="priority">
                <option value="low" {{ old('priority', $task->priority) == 'low' ? 'selected' : '' }}>Low</option>
                <option value="medium" {{ old('priority', $task->priority) == 'medium' ? 'selected' : '' }}>Medium</option>
                <option value="high" {{ old('priority', $task->priority) == 'high' ? 'selected' : '' }}>High</option>
            </select>
        </div>
        @error('priority')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <div class="mb-3">
            <label class="form-label">Due Date</label>
            <input type="date" class="form-control" name="due_date" value="{{ old('due_date', $task->due_date) }}">
        </div>
        @error('due_date')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <div class="mb-3">
            <label class="form-label">Completed</label>
            <select class="form-select" name="completed">
                <option value="pending" {{ old('completed', $task->completed) == 'pending' ? 'selected' : '' }}>Pending</option>
                <option value="completed" {{ old('completed', $task->completed) == 'completed' ? 'selected' : '' }}>Completed</option>
            </select>
        </div>
        @error('completed')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection
