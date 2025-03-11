@extends('layouts.app')
@section('title', 'To-Do List | Inicio')

@section('content')
    <h1>Usuarios</h1>
    <a href="{{ route('users.create') }}">Criar Usuario</a>
    @foreach ($users as $user)
        <div>
            <a href="{{ route('users.show', ['user' => $user->id]) }}">{{ $user->name }} ({{ $user->email }})</a>
            <a href="{{ route('users.edit', ['user' => $user->id]) }}">Editar</a>
        </div>
    @endforeach
    {{ $users->links() }}
    
@endsection