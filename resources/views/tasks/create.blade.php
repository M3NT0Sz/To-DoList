@extends('layouts.app')
@section('title', 'To-Do List | Tasks')
@section('page-title', 'Create Task')

@section('content')
    <form action="{{ route('tasks.store') }}" method="post">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label class="form-label">Title</label>
            <input type="text" class="form-control" placeholder="Title" name="title" value="{{ old('title') }}">
        </div>
        @error('title')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <div class="mb-3">
            <label class="form-label">Description</label>
            <input type="text" class="form-control" placeholder="Description" name="description" value="{{ old('description') }}">
        </div>
        @error('description')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <div class="mb-3">
            <label class="form-label">Tags</label>
            <div class="border rounded p-2" style="min-height: 48px; background: #f8f9fa;">
                @foreach($tags as $tag)
                    <label class="me-2 mb-1" style="cursor:pointer;">
                        <input type="checkbox" name="tags[]" value="{{ $tag->id }}" class="form-check-input" style="margin-right: 4px;">
                        <span class="badge" style="background-color: {{ $tag->color }}; color: #fff;">{{ $tag->name }}</span>
                    </label>
                @endforeach
            </div>
        </div>
        <div class="mb-3">
            <label class="form-label">Priority</label>
            <select class="form-select" name="priority">
                <option value="low">Low</option>
                <option value="medium">Medium</option>
                <option value="high">High</option>
            </select>
        </div>
        @error('priority')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <div class="mb-3">
            <label class="form-label">Due Date</label>
            <input type="date" class="form-control" name="due_date" value="{{ old('due_date') }}">
        </div>
        @error('due_date')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <div class="mb-3">
            <label class="form-label">Completed</label>
            <select class="form-select" name="completed">
                <option value="pending">Pending</option>
                <option value="completed">Completed</option>
            </select>
        </div>
        @error('completed')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
@endsection